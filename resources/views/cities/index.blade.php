@extends('layouts.app')

@section('title', 'Cities')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-teal-600 via-blue-600 to-indigo-700 py-16">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"cities\" patternUnits=\"userSpaceOnUse\" width=\"30\" height=\"30\"><circle cx=\"15\" cy=\"15\" r=\"3\" fill=\"%23ffffff\" opacity=\"0.1\"/><circle cx=\"5\" cy=\"5\" r=\"1\" fill=\"%23ffffff\" opacity=\"0.1\"/><circle cx=\"25\" cy=\"25\" r=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23cities)\"/></svg>');"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in">
                <div class="mb-6">
                    <i class="fas fa-city text-5xl md:text-6xl text-white opacity-80 animate-bounce-gentle"></i>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                    Cities <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Dashboard</span>
                </h1>
                <p class="text-lg sm:text-xl text-white opacity-90 max-w-3xl mx-auto leading-relaxed">
                    Explore comprehensive data from cities across India with powerful search and visualization tools
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Real Cities</p>
                        <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_cities']) }}</p>
                        <p class="text-xs text-gray-500 mt-1">From Database</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-city text-2xl text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Total Population</p>
                        <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_population']) }}</p>
                        <p class="text-xs text-gray-500 mt-1">Combined</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-2xl text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Average Population</p>
                        <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['average_population']) }}</p>
                        <p class="text-xs text-gray-500 mt-1">Per City</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-chart-bar text-2xl text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">States Covered</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $states->count() }}</p>
                        <p class="text-xs text-gray-500 mt-1">Across India</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Search and Filter Section -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-teal-400 to-blue-600 rounded-full transform translate-x-16 -translate-y-16 opacity-10"></div>
            <div class="relative z-10">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-teal-500 to-blue-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-search text-white text-xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Search & Filter Cities</h2>
                </div>
                
                <form method="GET" action="{{ url('/cities') }}" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                        <div class="md:col-span-6">
                            <label for="search" class="block text-sm font-semibold text-gray-700 mb-3">
                                <i class="fas fa-city mr-2 text-teal-500"></i>Search Cities
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 placeholder-gray-400" 
                                   id="search" 
                                   name="search" 
                                   value="{{ request('search') }}" 
                                   placeholder="Search by city name, state, or district...">
                        </div>
                        <div class="md:col-span-4">
                            <label for="state" class="block text-sm font-semibold text-gray-700 mb-3">
                                <i class="fas fa-map-marker-alt mr-2 text-teal-500"></i>Filter by State
                            </label>
                            <select class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300" 
                                    id="state" 
                                    name="state">
                                <option value="">All States</option>
                                @foreach($states as $state)
                                    <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>
                                        {{ $state }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:col-span-2 flex items-end">
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-teal-600 to-blue-600 hover:from-teal-700 hover:to-blue-700 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-search mr-2"></i>
                                <span class="hidden sm:inline">Search</span>
                            </button>
                        </div>
                    </div>
                    
                    @if(request('search') || request('state'))
                        <div class="flex flex-wrap gap-3 items-center pt-4 border-t border-gray-200">
                            <span class="text-sm font-medium text-gray-600">Active Filters:</span>
                            @if(request('search'))
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-teal-100 text-teal-800">
                                    <i class="fas fa-search mr-1"></i>
                                    "{{ request('search') }}"
                                </span>
                            @endif
                            @if(request('state'))
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    {{ request('state') }}
                                </span>
                            @endif
                            <a href="{{ url('/cities') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-times mr-2"></i>
                                Clear All
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    
        <!-- Data Visualization Charts - Only show with real data -->
        @if($cities->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mr-3">
                            <i class="fas fa-chart-bar text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Top 10 Cities by Population</h3>
                    </div>
                    @if($stats['top_cities']->count() > 0)
                        <div class="h-80">
                            <canvas id="topCitiesChart" class="w-full h-full"></canvas>
                        </div>
                    @else
                        <div class="text-center text-gray-500 py-12">
                            <i class="fas fa-chart-bar text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No population data available for charts</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-green-400 to-teal-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-600 rounded-xl flex items-center justify-center mr-3">
                            <i class="fas fa-chart-pie text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Cities by State Distribution</h3>
                    </div>
                    @if($stats['cities_by_state']->count() > 0)
                        <div class="h-80">
                            <canvas id="stateDistributionChart" class="w-full h-full"></canvas>
                        </div>
                    @else
                        <div class="text-center text-gray-500 py-12">
                            <i class="fas fa-chart-pie text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No state distribution data available</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
    
        <!-- Interactive Map - Only show with real data -->
        @if($cities->count() > 0)
        @php
            $citiesWithCoords = $cities->filter(function($c){
                return isset($c->latitude) && isset($c->longitude);
            });
        @endphp
        <div class="bg-white rounded-2xl shadow-xl p-6 mb-8 border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-400 to-blue-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
            <div class="relative z-10">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-xl flex items-center justify-center mr-3">
                        <i class="fas fa-map-marked-alt text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Interactive Map - City Locations</h3>
                </div>
                @if($citiesWithCoords->count() > 0)
                    <div id="map" class="h-96 w-full rounded-xl overflow-hidden shadow-inner"></div>
                    <p class="text-gray-600 text-sm mt-4 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-indigo-500"></i>
                        Click on markers to see city details. Showing cities with verified coordinates.
                    </p>
                @else
                    <div class="text-center text-gray-500 py-12">
                        <i class="fas fa-map-marked-alt text-4xl mb-4 opacity-50"></i>
                        <p class="text-lg">No location data available</p>
                        <p class="text-sm">The map will appear when latitude/longitude data is present in the database.</p>
                    </div>
                @endif
            </div>
        </div>
        @endif
    
        @if($cities->count() > 0)
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <i class="fas fa-database mr-3 text-indigo-500"></i>
                            Cities Database
                        </h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                            {{ $cities->count() }} cities found
                        </span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">City Name</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">State</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Population</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">District</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($cities as $city)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $city->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-city text-white text-xs"></i>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-900">{{ $city->city }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $city->state ?? ($city->state_name ?? 'N/A') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $city->population_display ?? number_format($city->population_exact ?? 0) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $city->district_name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/cities/{{ $city->id }}" 
                                           class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white text-sm font-medium rounded-lg transition-all duration-200 transform hover:scale-105">
                                            <i class="fas fa-eye mr-2"></i>
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-lg">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-red-800">No Real Data Available</h3>
                        <p class="text-red-700 mt-2">Unable to retrieve city data from the database. Please check your database connection and ensure the city_masters table contains data.</p>
                        <p class="text-red-600 text-sm mt-1">This application only displays real data from your database - no fake or mock data will be shown.</p>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="text-center pt-8">
            <a href="/" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Home
            </a>
        </div>
    </div>
</div>

<!-- Include Chart.js for data visualization -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Include Leaflet for maps -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
// Only render charts if we have real data
@if($cities->count() > 0 && $stats['top_cities']->count() > 0)
// Top Cities Chart - Real Data Only
document.addEventListener('DOMContentLoaded', function() {
  const topCitiesCanvas = document.getElementById('topCitiesChart');
  console.log('Top Cities Canvas found:', topCitiesCanvas);
  console.log('Chart.js available:', typeof Chart !== 'undefined');
  
  if (typeof Chart !== 'undefined' && topCitiesCanvas) {
    const topCitiesCtx = topCitiesCanvas.getContext('2d');
    const topCitiesChart = new Chart(topCitiesCtx, {
    type: 'bar',
    data: {
        labels: [
            @foreach($stats['top_cities'] as $city)
                '{{ $city->city }}',
            @endforeach
        ],
        datasets: [{
            label: 'Population',
            data: [
                @foreach($stats['top_cities'] as $city)
                    {{ $city->population ?? 0 }},
                @endforeach
            ],
            backgroundColor: [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                '#FF9F40', '#FF6384', '#C9CBCF', '#4BC0C0', '#FF6384'
            ],
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return value.toLocaleString();
                    }
                }
            }
        }
    }
  });
  console.log('Top Cities Chart created successfully');
  } else {
    console.error('Failed to create Top Cities Chart - Chart.js:', typeof Chart, 'Canvas:', topCitiesCanvas);
  }
});
@endif

@if($cities->count() > 0 && $stats['cities_by_state']->count() > 0)
// Cities by State Chart - Real Data Only
document.addEventListener('DOMContentLoaded', function() {
  const stateCanvas = document.getElementById('stateDistributionChart');
  console.log('State Distribution Canvas found:', stateCanvas);
  
  if (typeof Chart !== 'undefined' && stateCanvas) {
    const stateCtx = stateCanvas.getContext('2d');
    const stateChart = new Chart(stateCtx, {
    type: 'doughnut',
    data: {
        labels: [
            @foreach($stats['cities_by_state'] as $state => $data)
                '{{ $state }}',
            @endforeach
        ],
        datasets: [{
            data: [
                @foreach($stats['cities_by_state'] as $state => $data)
                    {{ $data['count'] }},
                @endforeach
            ],
            backgroundColor: [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                '#FF9F40', '#FF6384', '#C9CBCF', '#4BC0C0', '#36A2EB'
            ],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right'
            }
        }
    }
  });
  console.log('State Distribution Chart created successfully');
  } else {
    console.error('Failed to create State Distribution Chart - Chart.js:', typeof Chart, 'Canvas:', stateCanvas);
  }
});
@endif

@if($cities->count() > 0 && isset($citiesWithCoords) && $citiesWithCoords->count() > 0)
// Interactive Map - Real Data Only
(function(){
  const mapEl = document.getElementById('map');
  if (!mapEl || typeof L === 'undefined') return;
  // Initialize map centered on first city and later fit bounds
  const map = L.map('map');
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);
  const bounds = [];
  // Add markers from real coordinates only
  @foreach($citiesWithCoords->take(200) as $city)
    @php
      $lat = $city->latitude ?? null;
      $lng = $city->longitude ?? null;
    @endphp
    @if(isset($lat, $lng))
      (function(){
        const coords = [{{ $lat }}, {{ $lng }}];
        bounds.push(coords);
        const marker = L.marker(coords).addTo(map);
        marker.bindPopup(`
          <div style="min-width: 200px;">
            <h6 style="margin-bottom: 8px; color: #2563eb;">{{ $city->city }}</h6>
            <p style="margin: 4px 0;"><strong>State:</strong> {{ $city->state_name ?? $city->state }}</p>
            <p style="margin: 4px 0;"><strong>District:</strong> {{ $city->district_name ?? 'N/A' }}</p>
            <p style="margin: 4px 0;"><strong>Population:</strong> {{ $city->population_display ?? number_format($city->population_exact ?? 0) }}</p>
            <div style="margin-top: 8px;"><a href="/cities/{{ $city->id }}" class="btn btn-sm btn-primary">View Details</a></div>
          </div>
        `);
      })();
    @endif
  @endforeach
  if (bounds.length > 0) {
    map.fitBounds(bounds, { padding: [20, 20] });
  } else {
    // Fallback safe center if somehow no bounds
    map.setView([20.5937, 78.9629], 5);
  }
})();

// Markers are added above from $citiesWithCoords only. Old static-based logic removed.
@endif
</script>
@endsection