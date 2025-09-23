@extends('layouts.app')

@section('title', 'Cities')

@section('content')
<div class="container">
    <h1 class="mb-4">All Cities Dashboard</h1>
    
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Real Cities</h5>
                    <h2>{{ number_format($stats['total_cities']) }}</h2>
                    <small class="text-muted">From Database</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Population</h5>
                    <h2>{{ number_format($stats['total_population']) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Average Population</h5>
                    <h2>{{ number_format($stats['average_population']) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">States Covered</h5>
                    <h2>{{ $states->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Search and Filter Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">🔍 Search & Filter Cities</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ url('/cities') }}" class="row g-3">
                <div class="col-md-6">
                    <label for="search" class="form-label">Search Cities</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search by city name or state...">
                </div>
                <div class="col-md-4">
                    <label for="state" class="form-label">Filter by State</label>
                    <select class="form-select" id="state" name="state">
                        <option value="">All States</option>
                        @foreach($states as $state)
                            <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>
                                {{ $state }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>
            @if(request('search') || request('state'))
                <div class="mt-2">
                    <a href="{{ url('/cities') }}" class="btn btn-outline-secondary btn-sm">Clear Filters</a>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Data Visualization Charts - Only show with real data -->
    @if($cities->count() > 0)
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">📊 Top 10 Real Cities by Population</h5>
                </div>
                <div class="card-body">
                    @if($stats['top_cities']->count() > 0)
                        <canvas id="topCitiesChart" style="height: 300px;"></canvas>
                    @else
                        <div class="text-center text-muted">
                            <p>No population data available for charts</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">🗺️ Real Cities by State Distribution</h5>
                </div>
                <div class="card-body">
                    @if($stats['cities_by_state']->count() > 0)
                        <canvas id="stateDistributionChart" style="height: 300px;"></canvas>
                    @else
                        <div class="text-center text-muted">
                            <p>No state distribution data available</p>
                        </div>
                    @endif
                </div>
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
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">🗺️ Interactive Map - Real City Locations</h5>
        </div>
        <div class="card-body">
            @if($citiesWithCoords->count() > 0)
                <div id="map" style="height: 400px; width: 100%;"></div>
                <p class="text-muted mt-2">
                    <small>Click on markers to see real city details. Only shows cities with verified coordinates.</small>
                </p>
            @else
                <div class="alert alert-warning mb-0">
                    No location data available. The map is hidden until latitude/longitude are present in the database.
                </div>
            @endif
        </div>
    </div>
    @endif
    
    @if($cities->count() > 0)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Real Cities from Database ({{ $cities->count() }} cities found)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>City Name</th>
                                        <th>State</th>
                                        @if(isset($cities->first()->district))
                                            <th>District</th>
                                        @endif
                                        <th>Population</th>
                                        <th>District</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cities as $city)
                                        <tr>
                                            <td>{{ $city->id }}</td>
                                            <td>
                                                <strong>{{ $city->city }}</strong>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary">
                                                    {{ $city->state ?? ($city->state_name ?? 'N/A') }}
                                                </span>
                                            </td>
                                            <td>{{ $city->population_display ?? number_format($city->population_exact ?? 0) }}</td>
                                            <td>{{ $city->district_name ?? 'N/A' }}</td>
                                            <td>
                                                <a href="/cities/{{ $city->id }}" class="btn btn-sm btn-outline-primary">
                                                    View Details
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <h4>No Real Data Available</h4>
            <p>Unable to retrieve city data from the database. Please check your database connection and ensure the city_masters table contains data.</p>
            <small class="text-muted">This application only displays real data from your database - no fake or mock data will be shown.</small>
        </div>
    @endif
    
    <div class="mt-4">
        <a href="/" class="btn btn-secondary">← Back to Home</a>
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