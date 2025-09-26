<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = DB::table('city_masters')
                ->select('id', 'city', 'state_ut as state', 'MSTR1 as state_name', 
                        'MSTR2 as population_k', 'MSTR3 as population_exact', 'MSTR4 as urban_population',
                        'MSTR5 as city_class', 'MSTR6 as district_name');
            
            // Search functionality
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('city', 'like', "%{$search}%")
                      ->orWhere('state_ut', 'like', "%{$search}%")
                      ->orWhere('MSTR1', 'like', "%{$search}%")
                      ->orWhere('MSTR6', 'like', "%{$search}%");
                });
            }
            
            // Filter by state
            if ($request->has('state') && $request->state) {
                $query->where('MSTR1', $request->state);
            }
            
            $cities = $query->orderBy('city')->get();
            
            // Use the correct population values from the database
            $cities = $cities->map(function($city) {
                // MSTR3 contains the actual population number (like 8787 for Paderu)
                $city->population = $city->population_exact; // Use MSTR3 (actual population)
                $city->population_display = number_format($city->population_exact); // Format for display
                $city->population_k_display = $city->population_k . 'K'; // MSTR2 in K format
                return $city;
            });
            
        } catch (\Exception $e) {
            // Log the error and return empty collection - NO FAKE DATA
            \Log::error('Database error in CityController: ' . $e->getMessage());
            $cities = collect([]);
        }
        
        // Get statistics for dashboard
        $stats = $this->getCityStatistics($cities);
        
        // Get unique states for filter dropdown
        $states = $cities->pluck('state_name')->unique()->filter()->sort()->values();
        
        return view('cities.index', compact('cities', 'stats', 'states'));
    }
    
    public function show($id)
    {
        try {
            // Get city details from city_masters table with all relevant data
            $city = DB::table('city_masters')
                ->select('id', 'city', 'state_ut', 'MSTR1 as state_name', 'MSTR2 as population_k', 
                        'MSTR3 as population_exact', 'MSTR4 as urban_population', 'MSTR5 as city_class', 
                        'MSTR6 as district_name', 'MSTR7 as growth_rate', 'MSTR8 as district_population',
                        'MSTR9 as district_pop_k', 'MSTR10 as projected_2025', 'MSTR11 as projected_2026',
                        'MSTR12 as projected_2027', 'MSTR24 as script_type', 'MSTR25 as primary_language')
                ->where('id', $id)
                ->first();
            
            if (!$city) {
                abort(404, 'City not found');
            }
            
            // Add computed fields for better display using real data
            $city->population = $city->population_exact; // Use MSTR3 (actual population)
            $city->population_display = number_format($city->population_exact); // Format actual population
            $city->population_k_display = $city->population_k . 'K'; // MSTR2 in K format
            
        } catch (\Exception $e) {
            \Log::error('Database error in show method: ' . $e->getMessage());
            abort(404, 'City not found');
        }
        
        return view('cities.show', compact('city'));
    }
    
    private function getCityStatistics($cities)
    {
        // Only calculate statistics if we have real data
        if ($cities->isEmpty()) {
            return [
                'total_cities' => 0,
                'total_population' => 0,
                'average_population' => 0,
                'top_cities' => collect([]),
                'cities_by_state' => collect([])
            ];
        }
        
        $totalCities = $cities->count();
        $totalPopulation = $cities->sum('population');
        $averagePopulation = $totalCities > 0 ? round($totalPopulation / $totalCities) : 0;
        
        // Top 10 cities by population - only real data
        $topCities = $cities->sortByDesc('population')->take(10);
        
        // Cities by state count - only real data
        $citiesByState = $cities->groupBy('state_name')->map(function($stateCities) {
            return [
                'count' => $stateCities->count(),
                'population' => $stateCities->sum('population')
            ];
        })->sortByDesc('count')->take(10);
        
        return [
            'total_cities' => $totalCities,
            'total_population' => $totalPopulation,
            'average_population' => $averagePopulation,
            'top_cities' => $topCities,
            'cities_by_state' => $citiesByState
        ];
    }

    // API method for PWA functionality
    public function apiSearch(Request $request)
    {
        try {
            $search = $request->get('q', '');
            $limit = $request->get('limit', 10);

            $cities = DB::table('city_masters')
                ->select('id', 'city', 'MSTR1 as state', 'MSTR3 as population')
                ->where('city', 'like', '%' . $search . '%')
                ->orWhere('MSTR1', 'like', '%' . $search . '%')
                ->limit($limit)
                ->get();

            return response()->json([
                'success' => true,
                'data' => $cities,
                'count' => $cities->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}