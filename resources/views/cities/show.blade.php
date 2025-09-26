@extends('layouts.app')

@section('title', $city->city ?? 'City Details')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-cyan-600 via-blue-600 to-purple-700 py-16">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"citydetails\" patternUnits=\"userSpaceOnUse\" width=\"20\" height=\"20\"><rect width=\"4\" height=\"12\" x=\"2\" y=\"8\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect width=\"4\" height=\"16\" x=\"8\" y=\"4\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect width=\"4\" height=\"10\" x=\"14\" y=\"10\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23citydetails)\"/></svg>');"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in">
                <div class="mb-6">
                    <i class="fas fa-map-pin text-5xl md:text-6xl text-white opacity-80 animate-bounce-gentle"></i>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                    {{ $city->city ?? 'City Details' }}
                </h1>
                <p class="text-lg sm:text-xl text-white opacity-90 max-w-3xl mx-auto leading-relaxed">
                    Detailed information about {{ $city->city ?? 'this city' }} in {{ $city->state ?? ($city->state_ut ?? ($city->MSTR1 ?? 'India')) }}
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main City Information -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-full transform translate-x-16 -translate-y-16 opacity-10"></div>
                    <div class="relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-info-circle text-white text-xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">City Information</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">City Name</label>
                                    <p class="text-lg font-bold text-gray-900 mt-1">{{ $city->city ?? 'N/A' }}</p>
                                </div>
                                
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">State</label>
                                    <div class="mt-2">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-map-marker-alt mr-2"></i>
                                            {{ $city->state ?? ($city->state_ut ?? ($city->MSTR1 ?? 'N/A')) }}
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">District</label>
                                    <p class="text-lg font-medium text-gray-900 mt-1">{{ $city->district_name ?? 'N/A' }}</p>
                                </div>
                                
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">City Classification</label>
                                    <p class="text-lg font-medium text-gray-900 mt-1">{{ $city->city_class ?? 'N/A' }}</p>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200">
                                    <label class="text-sm font-semibold text-green-700 uppercase tracking-wide">Population</label>
                                    <p class="text-2xl font-bold text-green-800 mt-1">{{ $city->population_display ?? number_format($city->population_exact ?? 0) }}</p>
                                </div>
                                
                                <div class="p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl border border-blue-200">
                                    <label class="text-sm font-semibold text-blue-700 uppercase tracking-wide">Population (K)</label>
                                    <p class="text-lg font-bold text-blue-800 mt-1">{{ $city->population_k_display ?? ($city->population_k . 'K') }}</p>
                                </div>
                                
                                <div class="p-4 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl border border-purple-200">
                                    <label class="text-sm font-semibold text-purple-700 uppercase tracking-wide">Urban Population</label>
                                    <p class="text-lg font-bold text-purple-800 mt-1">{{ number_format($city->urban_population ?? 0) }}</p>
                                </div>
                                
                                @if(isset($city->growth_rate))
                                <div class="p-4 bg-gradient-to-r from-orange-50 to-red-50 rounded-xl border border-orange-200">
                                    <label class="text-sm font-semibold text-orange-700 uppercase tracking-wide">Growth Rate</label>
                                    <p class="text-lg font-bold text-orange-800 mt-1">{{ $city->growth_rate }}%</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        @if(isset($city->primary_language))
                        <div class="mt-6 p-4 bg-yellow-50 rounded-xl border border-yellow-200">
                            <label class="text-sm font-semibold text-yellow-700 uppercase tracking-wide">Primary Language</label>
                            <p class="text-lg font-medium text-yellow-800 mt-1">{{ $city->primary_language }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        
            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Stats Card -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
                    <div class="relative z-10 text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-pie text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $city->city ?? 'City' }}</h3>
                        <p class="text-gray-600 mb-4">
                            {{ $city->state ?? ($city->state_ut ?? ($city->MSTR1 ?? 'State')) }}
                        </p>
                        @if(isset($city->population_exact))
                            <div class="border-t border-gray-200 pt-4 mt-4">
                                <p class="text-3xl font-bold text-green-600 mb-1">{{ $city->population_display ?? number_format($city->population_exact) }}</p>
                                <p class="text-sm text-gray-500 uppercase tracking-wide">Total Population</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- City Location Map -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900 flex items-center">
                            <i class="fas fa-map-marker-alt mr-3 text-red-500"></i>
                            Location
                        </h3>
                    </div>
                    <div class="p-0">
                        @if(isset($city->latitude) && isset($city->longitude) && !empty($city->latitude) && !empty($city->longitude))
                            <div id="cityMap" class="h-64 w-full"></div>
                        @else
                            <div class="p-6 text-center">
                                <i class="fas fa-map-marked-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-gray-500">No location data available for this city.</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Navigation Card -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-400 to-blue-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-compass mr-3 text-indigo-500"></i>
                            Navigation
                        </h3>
                        <div class="space-y-3">
                            <a href="/cities" 
                               class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white font-semibold rounded-lg transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-arrow-left mr-2"></i>
                                All Cities
                            </a>
                            <a href="/" 
                               class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-semibold rounded-lg transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-home mr-2"></i>
                                Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Leaflet for maps -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
(function(){
  const __lat = {{ json_encode($city->latitude ?? null) }};
  const __lng = {{ json_encode($city->longitude ?? null) }};
  const mapEl = document.getElementById('cityMap');
  
  // Only proceed if we have the map element, Leaflet library, and real coordinates
  if (!mapEl || typeof L === 'undefined' || !__lat || !__lng) { 
    return; 
  }

  // Initialize map with the real coordinates
  const cityMap = L.map('cityMap').setView([__lat, __lng], 12);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
  }).addTo(cityMap);

  // Add marker for the city
  const marker = L.marker([__lat, __lng]);

  // Use green marker for exact location
  marker.setIcon(L.icon({
      iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [25, 41],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
  }));

  marker.addTo(cityMap)
      .bindPopup(`
          <div class="text-center" style="min-width: 200px;">
              <h6 style="color: #2563eb; margin-bottom: 8px;">{{ $city->city ?? 'City' }}</h6>
              <p style="margin: 4px 0;"><strong>State:</strong> {{ $city->state_name ?? ($city->state_ut ?? ($city->MSTR1 ?? 'State')) }}</p>
              <p style="margin: 4px 0;"><strong>District:</strong> {{ $city->district_name ?? 'N/A' }}</p>
              @if(isset($city->population_exact))
                  <p style="margin: 4px 0;"><strong>Population:</strong> {{ $city->population_display ?? number_format($city->population_exact) }}</p>
              @endif
              @if(isset($city->city_class))
                  <p style="margin: 4px 0;"><strong>Classification:</strong> {{ $city->city_class }}</p>
              @endif
              <div style="margin-top: 8px; padding: 4px; border-radius: 4px; font-size: 11px; background: #22c55e; color: white;">
                  📍 Exact Location
              </div>
          </div>
      `).openPopup();
})();
</script>
@endsection