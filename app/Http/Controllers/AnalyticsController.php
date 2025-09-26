<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function dashboard()
    {
        try {
            // Overall statistics
            $stats = [
                'total_cities' => DB::table('city_masters')->count(),
                'total_states' => DB::table('states')->count(),
                'total_districts' => DB::table('districts')->count(),
                'total_languages' => DB::table('languages')->count(),
                'total_population' => DB::table('city_masters')->sum(DB::raw('CAST(MSTR9 as UNSIGNED)')),
                'total_verticals' => DB::table('verticals')->count(),
                'data_tables' => DB::select("SHOW TABLES")->count ?? 0
            ];

            // Top performing cities by population
            $topCities = DB::table('city_masters')
                ->orderBy(DB::raw('CAST(MSTR9 as UNSIGNED)'), 'desc')
                ->limit(10)
                ->get();

            // State-wise distribution
            $stateDistribution = DB::table('city_masters')
                ->select('MSTR1 as state', DB::raw('COUNT(*) as cities'), DB::raw('SUM(CAST(MSTR9 as UNSIGNED)) as population'))
                ->groupBy('MSTR1')
                ->orderBy('population', 'desc')
                ->limit(15)
                ->get();

            // City classification distribution
            $cityClasses = DB::table('city_masters')
                ->select('MSTR6 as class', DB::raw('COUNT(*) as count'))
                ->groupBy('MSTR6')
                ->orderBy('count', 'desc')
                ->get();

            // Language distribution
            $languageStats = DB::table('city_masters')
                ->select('MSTR26 as language', DB::raw('COUNT(*) as cities'), DB::raw('SUM(CAST(MSTR9 as UNSIGNED)) as speakers'))
                ->groupBy('MSTR26')
                ->orderBy('speakers', 'desc')
                ->limit(10)
                ->get();

            // Growth rate analysis
            $growthRates = DB::table('city_masters')
                ->select('MSTR8 as growth_rate', DB::raw('COUNT(*) as cities'))
                ->groupBy('MSTR8')
                ->orderBy('growth_rate', 'desc')
                ->get();

            // Regional analysis
            $regionalData = DB::table('city_masters')
                ->join('states', 'city_masters.MSTR1', '=', 'states.state')
                ->select('states.state', DB::raw('AVG(CAST(city_masters.MSTR9 as UNSIGNED)) as avg_population'))
                ->groupBy('states.state')
                ->orderBy('avg_population', 'desc')
                ->get();

            return view('analytics.dashboard', compact(
                'stats', 
                'topCities', 
                'stateDistribution', 
                'cityClasses', 
                'languageStats', 
                'growthRates',
                'regionalData'
            ));
        } catch (\Exception $e) {
            return view('analytics.dashboard')->with('error', 'Unable to load analytics data: ' . $e->getMessage());
        }
    }

    public function demographics()
    {
        try {
            // Get demographic data from e_demos table
            $demographics = DB::table('e_demos')->limit(50)->get();
            
            // Get education data
            $education = DB::table('e_edus')->limit(30)->get();
            
            // Get health data
            $health = DB::table('e_healths')->limit(30)->get();
            
            // Get wealth data
            $wealth = DB::table('e_wealths')->limit(30)->get();
            
            // Calculate demographic statistics
            $stats = [
                'demo_records' => DB::table('e_demos')->count(),
                'education_records' => DB::table('e_edus')->count(),
                'health_records' => DB::table('e_healths')->count(),
                'wealth_records' => DB::table('e_wealths')->count(),
                'work_records' => DB::table('e_works')->count(),
                'media_records' => DB::table('e_medias')->count()
            ];

            return view('analytics.demographics', compact('demographics', 'education', 'health', 'wealth', 'stats'));
        } catch (\Exception $e) {
            return view('analytics.demographics')->with('error', 'Unable to load demographic data: ' . $e->getMessage());
        }
    }

    public function research()
    {
        try {
            // Get development data
            $development = DB::table('development_results')->limit(20)->get();
            
            // Get marketing data
            $marketing = DB::table('marketing_results')->limit(20)->get();
            
            // Get advertising data
            $advertising = DB::table('advertising_results')->limit(20)->get();
            
            // Get AI verticals mapping
            $aiVerticals = DB::table('ai_verticals_map')->limit(20)->get();
            
            // Get world planning data
            $worldPlanners = DB::table('world_planners')->limit(15)->get();
            
            // Statistics
            $stats = [
                'development_studies' => DB::table('development_results')->count(),
                'marketing_studies' => DB::table('marketing_results')->count(),
                'advertising_studies' => DB::table('advertising_results')->count(),
                'ai_mappings' => DB::table('ai_verticals_map')->count(),
                'world_planners' => DB::table('world_planners')->count(),
                'research_verticals' => DB::table('verticals')->count()
            ];

            return view('analytics.research', compact(
                'development', 
                'marketing', 
                'advertising', 
                'aiVerticals', 
                'worldPlanners', 
                'stats'
            ));
        } catch (\Exception $e) {
            return view('analytics.research')->with('error', 'Unable to load research data: ' . $e->getMessage());
        }
    }

    public function explore()
    {
        try {
            // List all available tables for exploration
            $tables = collect(DB::select("SHOW TABLES"))->map(function($table) {
                $tableName = array_values((array)$table)[0];
                $count = DB::table($tableName)->count();
                return [
                    'name' => $tableName,
                    'count' => $count,
                    'description' => $this->getTableDescription($tableName)
                ];
            });

            // Get sample data from various interesting tables
            $sampleData = [];
            $interestingTables = ['world_masters', 'country_verticals', 'india_zone', 'cze_masters', 'lg_w_continants'];
            
            foreach ($interestingTables as $table) {
                try {
                    $sampleData[$table] = DB::table($table)->limit(5)->get();
                } catch (\Exception $e) {
                    $sampleData[$table] = collect();
                }
            }

            return view('analytics.explore', compact('tables', 'sampleData'));
        } catch (\Exception $e) {
            return view('analytics.explore')->with('error', 'Unable to load exploration data: ' . $e->getMessage());
        }
    }

    private function getTableDescription($tableName)
    {
        $descriptions = [
            'city_masters' => 'Main cities database with comprehensive urban data',
            'states' => 'Indian states and union territories',
            'districts' => 'District-wise demographic and literacy data',
            'languages' => 'Languages and their script systems',
            'e_demos' => 'Demographic analysis data',
            'e_edus' => 'Education sector data',
            'e_healths' => 'Healthcare sector information',
            'e_wealths' => 'Economic and wealth indicators',
            'world_masters' => 'Global cities and urban centers',
            'world_planners' => 'International urban planning data',
            'verticals' => 'Industry and sector classifications',
            'ai_verticals_map' => 'AI-driven sector mappings',
            'development_results' => 'Urban development research outcomes',
            'marketing_results' => 'Marketing analysis results',
            'advertising_results' => 'Advertising effectiveness studies'
        ];

        return $descriptions[$tableName] ?? 'Data table containing ' . str_replace('_', ' ', $tableName) . ' information';
    }
}