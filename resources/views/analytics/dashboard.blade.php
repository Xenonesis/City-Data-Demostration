@extends('layouts.app')

@section('title', 'Analytics Dashboard')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-orange-600 via-red-600 to-pink-700 py-16">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"analytics\" patternUnits=\"userSpaceOnUse\" width=\"30\" height=\"30\"><rect width=\"4\" height=\"20\" x=\"5\" y=\"5\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect width=\"4\" height=\"15\" x=\"12\" y=\"10\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect width=\"4\" height=\"25\" x=\"19\" y=\"0\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23analytics)\"/></svg>');"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in">
                <div class="mb-6">
                    <i class="fas fa-chart-line text-5xl md:text-6xl text-white opacity-80 animate-bounce-gentle"></i>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                    Analytics <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Dashboard</span>
                </h1>
                <p class="text-lg sm:text-xl text-white opacity-90 max-w-3xl mx-auto leading-relaxed">
                    Comprehensive insights and data analysis from the Indian urban development database
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
            <!-- Main Statistics Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Total Cities</p>
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_cities'] ?? 0) }}</p>
                            <p class="text-xs text-gray-500 mt-1">Urban Centers</p>
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
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_population'] ?? 0) }}</p>
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
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">States</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_states'] ?? 0 }}</p>
                            <p class="text-xs text-gray-500 mt-1">And UTs</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-map text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Data Tables</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['data_tables'] ?? 0 }}</p>
                            <p class="text-xs text-gray-500 mt-1">Available</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-database text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics Navigation -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <a href="/demographics" class="group bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-300 mb-2">Demographics</h3>
                        <p class="text-sm text-gray-600">Population & social data</p>
                    </div>
                </a>
                
                <a href="/research" class="group bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-flask text-white text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-green-600 transition-colors duration-300 mb-2">Research</h3>
                        <p class="text-sm text-gray-600">Development studies</p>
                    </div>
                </a>
                
                <a href="/explore" class="group bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-search text-white text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors duration-300 mb-2">Data Explorer</h3>
                        <p class="text-sm text-gray-600">Browse all datasets</p>
                    </div>
                </a>
                
                <a href="/cities" class="group bg-gradient-to-r from-orange-50 to-red-50 border border-orange-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-city text-white text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-orange-600 transition-colors duration-300 mb-2">Cities Dashboard</h3>
                        <p class="text-sm text-gray-600">Urban data center</p>
                    </div>
                </a>
            </div>

            <!-- Top Cities Performance -->
            @if(isset($topCities) && $topCities->count() > 0)
            <div class="bg-white rounded-2xl shadow-xl p-6 mb-8 border border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-trophy mr-3 text-orange-500"></i>
                    Top Cities by Population
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    @foreach($topCities->take(10) as $index => $city)
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl p-4 hover:shadow-lg transition-all duration-300">
                            <div class="text-center">
                                <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-2 text-white font-bold text-sm">
                                    {{ $index + 1 }}
                                </div>
                                <h4 class="font-semibold text-gray-900 text-sm mb-1">{{ $city->city ?? 'N/A' }}</h4>
                                <p class="text-xs text-gray-500 mb-1">{{ $city->MSTR1 ?? 'N/A' }}</p>
                                <p class="text-xs font-medium text-orange-600">{{ number_format($city->MSTR9 ?? 0) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Key Insights -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- State Distribution -->
                @if(isset($stateDistribution) && $stateDistribution->count() > 0)
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <i class="fas fa-chart-pie mr-3 text-blue-500"></i>
                        Top States by Population
                    </h3>
                    <div class="space-y-4">
                        @foreach($stateDistribution->take(8) as $state)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-900">{{ $state->state ?? 'N/A' }}</h4>
                                    <p class="text-sm text-gray-500">{{ $state->cities ?? 0 }} cities</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-blue-600">{{ number_format($state->population ?? 0) }}</p>
                                    <p class="text-xs text-gray-500">population</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- City Classification -->
                @if(isset($cityClasses) && $cityClasses->count() > 0)
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <i class="fas fa-layer-group mr-3 text-green-500"></i>
                        City Classifications
                    </h3>
                    <div class="space-y-4">
                        @foreach($cityClasses->take(8) as $class)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-900">Class {{ $class->class ?? 'Unknown' }}</h4>
                                    <p class="text-sm text-gray-500">City category</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-green-600">{{ number_format($class->count ?? 0) }}</p>
                                    <p class="text-xs text-gray-500">cities</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
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
@endsection