<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get search and filter parameters
            $search = $request->get('search');
            $script = $request->get('script');

            // Build query for languages
            $query = DB::table('languages')->orderBy('language');

            if ($search) {
                $query->where('language', 'like', '%' . $search . '%');
            }

            if ($script) {
                $query->where('script', $script);
            }

            $languages = $query->get();

            // Get all unique scripts for filter
            $scripts = DB::table('languages')
                ->select('script')
                ->distinct()
                ->whereNotNull('script')
                ->where('script', '!=', '')
                ->orderBy('script')
                ->pluck('script');

            // Get statistics
            $stats = [
                'total_languages' => DB::table('languages')->count(),
                'total_scripts' => DB::table('languages')->distinct('script')->count(),
                'most_common_script' => DB::table('languages')
                    ->select('script', DB::raw('COUNT(*) as count'))
                    ->groupBy('script')
                    ->orderBy('count', 'desc')
                    ->first(),
                'languages_with_cities' => DB::table('city_masters')
                    ->distinct('MSTR26')
                    ->count()
            ];

            // Get script distribution
            $scriptDistribution = DB::table('languages')
                ->select('script', DB::raw('COUNT(*) as count'))
                ->groupBy('script')
                ->orderBy('count', 'desc')
                ->get();

            // Get languages used in cities
            $cityLanguages = DB::table('city_masters')
                ->select('MSTR26 as language', DB::raw('COUNT(*) as cities_count'))
                ->groupBy('MSTR26')
                ->orderBy('cities_count', 'desc')
                ->limit(15)
                ->get();

            // Get geo-linguistic data
            $geoLanguages = DB::table('geo_lang')
                ->orderBy('id')
                ->limit(20)
                ->get();

            return view('languages.index', compact(
                'languages', 
                'scripts', 
                'stats', 
                'scriptDistribution', 
                'cityLanguages',
                'geoLanguages',
                'search',
                'script'
            ));
        } catch (\Exception $e) {
            return view('languages.index')->with('error', 'Unable to load languages data: ' . $e->getMessage());
        }
    }

    public function show($id, Request $request)
    {
        try {
            // Get language information
            $language = DB::table('languages')->where('id', $id)->first();
            
            if (!$language) {
                abort(404, 'Language not found');
            }

            // Get cities that use this language
            $cities = DB::table('city_masters')
                ->where('MSTR26', $language->language)
                ->orderBy('CAST(MSTR9 as UNSIGNED)', 'desc')
                ->get();

            // Get states where this language is used
            $states = DB::table('city_masters')
                ->where('MSTR26', $language->language)
                ->select('MSTR1 as state', DB::raw('COUNT(*) as cities_count'), DB::raw('SUM(CAST(MSTR9 as UNSIGNED)) as total_population'))
                ->groupBy('MSTR1')
                ->orderBy('cities_count', 'desc')
                ->get();

            // Calculate statistics
            $stats = [
                'total_cities' => $cities->count(),
                'total_states' => $states->count(),
                'total_speakers' => $cities->sum(function($city) {
                    return is_numeric($city->MSTR9) ? (int)$city->MSTR9 : 0;
                }),
                'largest_city' => $cities->first(),
                'script_family' => $language->script ?? 'Unknown'
            ];

            // Get related languages (same script)
            $relatedLanguages = DB::table('languages')
                ->where('script', $language->script)
                ->where('id', '!=', $id)
                ->limit(10)
                ->get();

            return view('languages.show', compact('language', 'cities', 'states', 'stats', 'relatedLanguages'));
        } catch (\Exception $e) {
            return redirect('/languages')->with('error', 'Unable to load language details: ' . $e->getMessage());
        }
    }

    public function scripts()
    {
        try {
            // Get all scripts with language counts
            $scripts = DB::table('languages')
                ->select('script', DB::raw('COUNT(*) as languages_count'))
                ->groupBy('script')
                ->orderBy('languages_count', 'desc')
                ->get();

            // Get script systems data
            $scriptSystems = DB::table('language_systems')
                ->orderBy('id')
                ->get();

            // Get geo scripts data
            $geoScripts = DB::table('geo_scripts')
                ->orderBy('id')
                ->limit(20)
                ->get();

            // Calculate statistics
            $stats = [
                'total_scripts' => $scripts->count(),
                'total_language_systems' => $scriptSystems->count(),
                'most_used_script' => $scripts->first(),
                'scripts_in_use' => $scripts->where('languages_count', '>', 0)->count()
            ];

            return view('languages.scripts', compact('scripts', 'scriptSystems', 'geoScripts', 'stats'));
        } catch (\Exception $e) {
            return view('languages.scripts')->with('error', 'Unable to load scripts data: ' . $e->getMessage());
        }
    }

    // API method for PWA functionality
    public function apiSearch(Request $request)
    {
        try {
            $search = $request->get('q', '');
            $limit = $request->get('limit', 10);

            $languages = DB::table('languages')
                ->select('id', 'language', 'script')
                ->where('language', 'like', '%' . $search . '%')
                ->orWhere('script', 'like', '%' . $search . '%')
                ->limit($limit)
                ->get();

            return response()->json([
                'success' => true,
                'data' => $languages,
                'count' => $languages->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}