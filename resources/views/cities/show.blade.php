@extends('layouts.app')

@section('title', $city->city ?? 'City Details')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $city->city ?? 'City Details' }}</h1>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">City Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="30%">City Name:</th>
                            <td><strong>{{ $city->city ?? 'N/A' }}</strong></td>
                        </tr>
                        <tr>
                            <th>State:</th>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $city->state ?? ($city->state_ut ?? ($city->MSTR1 ?? 'N/A')) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>District:</th>
                            <td>{{ $city->district_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Population:</th>
                            <td>{{ $city->population_display ?? number_format($city->population_exact ?? 0) }}</td>
                        </tr>
                        <tr>
                            <th>Population (K):</th>
                            <td>{{ $city->population_k_display ?? ($city->population_k . 'K') }}</td>
                        </tr>
                        <tr>
                            <th>Urban Population:</th>
                            <td>{{ number_format($city->urban_population) }}</td>
                        </tr>
                        <tr>
                            <th>City Classification:</th>
                            <td>{{ $city->city_class }}</td>
                        </tr>
                        @if(isset($city->growth_rate))
                        <tr>
                            <th>Growth Rate:</th>
                            <td>{{ $city->growth_rate }}%</td>
                        </tr>
                        @endif
                        @if(isset($city->primary_language))
                        <tr>
                            <th>Primary Language:</th>
                            <td>{{ $city->primary_language }}</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Quick Stats</h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h2 class="text-primary">{{ $city->city ?? 'City' }}</h2>
                        <p class="text-muted">
                            {{ $city->state ?? ($city->state_ut ?? ($city->MSTR1 ?? 'State')) }}
                        </p>
                        @if(isset($city->population_exact))
                            <div class="border-top pt-3 mt-3">
                                <h4 class="text-success">{{ $city->population_display ?? number_format($city->population_exact) }}</h4>
                                <small class="text-muted">Population</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- City Location Map -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="mb-0">📍 Location</h5>
                </div>
                <div class="card-body p-0">
                    @if(isset($city->latitude) && isset($city->longitude) && !empty($city->latitude) && !empty($city->longitude))
                        <div id="cityMap" style="height: 250px; width: 100%;"></div>
                    @else
                        <div class="p-3">
                            <div class="alert alert-warning mb-0">No location data available for this city.</div>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="card mt-3">
                <div class="card-body">
                    <h6>Navigation</h6>
                    <div class="d-grid gap-2">
                        <a href="/cities" class="btn btn-outline-primary btn-sm">← All Cities</a>
                        <a href="/" class="btn btn-outline-secondary btn-sm">🏠 Home</a>
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