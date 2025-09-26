<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get all states
            $states = DB::table('states')->orderBy('state')->get();
            
            // Get states with UT information
            $statesWithUT = DB::table('states_and_uts')->orderBy('state_ut')->get();
            
            // Get statistics
            $stats = [
                'total_states' => $states->count(),
                'total_states_uts' => $statesWithUT->count(),
                'total_districts' => DB::table('districts')->count(),
                'total_cities' => DB::table('city_masters')->count()
            ];
            
            // Get cities by state for chart
            $citiesByState = DB::table('city_masters')
                ->select('MSTR1 as state', DB::raw('COUNT(*) as count'))
                ->groupBy('MSTR1')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->get();
            
            // Get population by state (top 10)
            $populationByState = DB::table('city_masters')
                ->select('MSTR1 as state', DB::raw('SUM(CAST(MSTR9 as UNSIGNED)) as total_population'))
                ->groupBy('MSTR1')
                ->orderBy('total_population', 'desc')
                ->limit(10)
                ->get();

            return view('states.index', compact('states', 'statesWithUT', 'stats', 'citiesByState', 'populationByState'));
        } catch (\Exception $e) {
            return view('states.index')->with('error', 'Unable to load states data: ' . $e->getMessage());
        }
    }

    public function show($id, Request $request)
    {
        try {
            // Get state information
            $state = DB::table('states')->where('id', $id)->first();
            
            if (!$state) {
                abort(404, 'State not found');
            }

            // Get cities in this state
            $cities = DB::table('city_masters')
                ->where('MSTR1', $state->state)
                ->orderBy('CAST(MSTR9 as UNSIGNED)', 'desc')
                ->get();

            // Get districts in this state
            $districts = DB::table('districts')
                ->where('state_code', $id)
                ->orderBy('district_name')
                ->get();

            // Calculate state statistics
            $stats = [
                'total_cities' => $cities->count(),
                'total_districts' => $districts->count(),
                'total_population' => $cities->sum(function($city) {
                    return is_numeric($city->MSTR9) ? (int)$city->MSTR9 : 0;
                }),
                'largest_city' => $cities->first(),
                'average_population' => $cities->count() > 0 ? 
                    $cities->sum(function($city) {
                        return is_numeric($city->MSTR9) ? (int)$city->MSTR9 : 0;
                    }) / $cities->count() : 0
            ];

            // Get top cities by population
            $topCities = $cities->take(10);

            // Get languages spoken in this state
            $languages = DB::table('city_masters')
                ->where('MSTR1', $state->state)
                ->select('MSTR26 as language', DB::raw('COUNT(*) as count'))
                ->groupBy('MSTR26')
                ->orderBy('count', 'desc')
                ->get();

            return view('states.show', compact('state', 'cities', 'districts', 'stats', 'topCities', 'languages'));
        } catch (\Exception $e) {
            return redirect('/states')->with('error', 'Unable to load state details: ' . $e->getMessage());
        }
    }

    public function districts()
    {
        try {
            // Get all districts with state information
            $districts = DB::table('districts')
                ->join('states', 'districts.state_code', '=', 'states.id')
                ->select('districts.*', 'states.state as state_name')
                ->orderBy('states.state')
                ->orderBy('districts.district_name')
                ->get();

            // Get statistics
            $stats = [
                'total_districts' => $districts->count(),
                'total_population' => $districts->sum(function($district) {
                    return (int)str_replace(',', '', $district->Population ?? '0');
                }),
                'average_literacy' => $districts->where('literacy_rate', '>', 0)->avg('literacy_rate'),
                'highest_literacy' => $districts->max('literacy_rate')
            ];

            // Get top districts by population
            $topDistricts = $districts->sortByDesc(function($district) {
                return (int)str_replace(',', '', $district->Population ?? '0');
            })->take(15);

            // Get literacy rate distribution
            $literacyDistribution = $districts->where('literacy_rate', '>', 0)
                ->groupBy(function($district) {
                    $rate = $district->literacy_rate * 100;
                    if ($rate >= 80) return '80%+';
                    if ($rate >= 70) return '70-79%';
                    if ($rate >= 60) return '60-69%';
                    if ($rate >= 50) return '50-59%';
                    return 'Below 50%';
                })->map->count();

            return view('states.districts', compact('districts', 'stats', 'topDistricts', 'literacyDistribution'));
        } catch (\Exception $e) {
            return view('states.districts')->with('error', 'Unable to load districts data: ' . $e->getMessage());
        }
    }

    // API method for PWA functionality
    public function apiList(Request $request)
    {
        try {
            $states = DB::table('states')
                ->select('id', 'state')
                ->orderBy('state')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $states,
                'count' => $states->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}