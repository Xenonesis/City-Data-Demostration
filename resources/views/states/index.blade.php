@extends('layouts.app')

@section('title', 'States & Union Territories')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-emerald-600 via-teal-600 to-blue-700 py-16">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"states\" patternUnits=\"userSpaceOnUse\" width=\"25\" height=\"25\"><rect width=\"8\" height=\"8\" x=\"2\" y=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect width=\"8\" height=\"8\" x=\"15\" y=\"15\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect width=\"4\" height=\"4\" x=\"8\" y=\"8\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23states)\"/></svg>');"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in">
                <div class="mb-6">
                    <i class="fas fa-map text-5xl md:text-6xl text-white opacity-80 animate-bounce-gentle"></i>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                    States & <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Union Territories</span>
                </h1>
                <p class="text-lg sm:text-xl text-white opacity-90 max-w-3xl mx-auto leading-relaxed">
                    Comprehensive data about Indian states, union territories, and their administrative divisions
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        @if(isset($error))
            <div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-lg mb-8">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-red-800">Error Loading Data</h3>
                        <p class="text-red-700 mt-2">{{ $error }}</p>
                    </div>
                </div>
            </div>
        @else
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Total States</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_states'] ?? 0 }}</p>
                            <p class="text-xs text-gray-500 mt-1">Across India</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-map text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">States & UTs</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_states_uts'] ?? 0 }}</p>
                            <p class="text-xs text-gray-500 mt-1">Including UTs</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-flag text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Total Districts</p>
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_districts'] ?? 0) }}</p>
                            <p class="text-xs text-gray-500 mt-1">Administrative Units</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-building text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Total Cities</p>
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_cities'] ?? 0) }}</p>
                            <p class="text-xs text-gray-500 mt-1">Urban Centers</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-city text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Navigation -->
            <div class="bg-white rounded-2xl shadow-xl p-6 mb-8 border border-gray-100">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-compass mr-3 text-emerald-500"></i>
                    Quick Navigation
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="/districts" class="group bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 rounded-xl p-4 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-building text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-emerald-600 transition-colors duration-300">Districts</h3>
                                <p class="text-sm text-gray-600">Explore district data</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="/cities" class="group bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-4 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-city text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">Cities</h3>
                                <p class="text-sm text-gray-600">Browse all cities</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="/analytics" class="group bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-xl p-4 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors duration-300">Analytics</h3>
                                <p class="text-sm text-gray-600">View insights</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            @if(isset($citiesByState) && $citiesByState->count() > 0)
            <!-- Data Visualization Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-emerald-400 to-teal-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
                    <div class="relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-chart-bar text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Cities by State</h3>
                        </div>
                        <div class="h-80">
                            <canvas id="citiesByStateChart" class="w-full h-full"></canvas>
                        </div>
                    </div>
                </div>
                
                @if(isset($populationByState) && $populationByState->count() > 0)
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
                    <div class="relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-chart-pie text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Population by State</h3>
                        </div>
                        <div class="h-80">
                            <canvas id="populationByStateChart" class="w-full h-full"></canvas>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endif

            <!-- States List -->
            @if(isset($states) && $states->count() > 0)
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <i class="fas fa-flag mr-3 text-emerald-500"></i>
                            Indian States
                        </h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800">
                            {{ $states->count() }} states
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-6">
                    @foreach($states as $state)
                        <a href="/states/{{ $state->id }}" 
                           class="group bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl p-4 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:from-emerald-50 hover:to-teal-50 hover:border-emerald-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-map-marker-alt text-white text-sm"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 group-hover:text-emerald-600 transition-colors duration-300 text-sm">
                                        {{ $state->state }}
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">State #{{ $state->id }}</p>
                                </div>
                                <i class="fas fa-arrow-right text-gray-400 group-hover:text-emerald-500 transition-colors duration-300"></i>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
        @endif
        
        <div class="text-center pt-8">
            <a href="/" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Home
            </a>
        </div>
    </div>
</div>

@if(isset($citiesByState) && $citiesByState->count() > 0)
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Cities by State Chart
    const citiesCtx = document.getElementById('citiesByStateChart').getContext('2d');
    const citiesByStateChart = new Chart(citiesCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($citiesByState->pluck('state')) !!},
            datasets: [{
                label: 'Number of Cities',
                data: {!! json_encode($citiesByState->pluck('count')) !!},
                backgroundColor: 'rgba(16, 185, 129, 0.8)',
                borderColor: 'rgba(16, 185, 129, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
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
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    @if(isset($populationByState) && $populationByState->count() > 0)
    // Population by State Chart
    const populationCtx = document.getElementById('populationByStateChart').getContext('2d');
    const populationByStateChart = new Chart(populationCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($populationByState->pluck('state')) !!},
            datasets: [{
                data: {!! json_encode($populationByState->pluck('total_population')) !!},
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(249, 115, 22, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(236, 72, 153, 0.8)',
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(251, 191, 36, 0.8)',
                    'rgba(239, 68, 68, 0.8)',
                    'rgba(20, 184, 166, 0.8)',
                    'rgba(168, 85, 247, 0.8)'
                ],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        padding: 15
                    }
                }
            }
        }
    });
    @endif
</script>
@endif
@endsection