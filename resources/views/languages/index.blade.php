@extends('layouts.app')

@section('title', 'Languages & Scripts')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-700 py-16">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"languages\" patternUnits=\"userSpaceOnUse\" width=\"20\" height=\"20\"><text x=\"5\" y=\"15\" font-size=\"8\" fill=\"%23ffffff\" opacity=\"0.1\">अ</text><text x=\"15\" y=\"15\" font-size=\"8\" fill=\"%23ffffff\" opacity=\"0.1\">A</text></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23languages)\"/></svg>');"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in">
                <div class="mb-6">
                    <i class="fas fa-language text-5xl md:text-6xl text-white opacity-80 animate-bounce-gentle"></i>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                    Languages & <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Scripts</span>
                </h1>
                <p class="text-lg sm:text-xl text-white opacity-90 max-w-3xl mx-auto leading-relaxed">
                    Explore the rich linguistic diversity of India with comprehensive language and script data
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
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Total Languages</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_languages'] ?? 0 }}</p>
                            <p class="text-xs text-gray-500 mt-1">Documented</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-language text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Script Systems</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_scripts'] ?? 0 }}</p>
                            <p class="text-xs text-gray-500 mt-1">Writing Systems</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-font text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Most Common</p>
                            <p class="text-lg font-bold text-gray-900">{{ $stats['most_common_script']->script ?? 'N/A' }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $stats['most_common_script']->count ?? 0 }} languages</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-star text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">City Languages</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['languages_with_cities'] ?? 0 }}</p>
                            <p class="text-xs text-gray-500 mt-1">In Cities</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-city text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter -->
            <div class="bg-white rounded-2xl shadow-xl p-6 mb-8 border border-gray-100">
                <form method="GET" action="{{ url('/languages') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="md:col-span-6">
                            <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-search mr-2 text-purple-500"></i>Search Languages
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300" 
                                   id="search" 
                                   name="search" 
                                   value="{{ $search ?? '' }}" 
                                   placeholder="Search by language name...">
                        </div>
                        <div class="md:col-span-4">
                            <label for="script" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-font mr-2 text-purple-500"></i>Filter by Script
                            </label>
                            <select class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300" 
                                    id="script" 
                                    name="script">
                                <option value="">All Scripts</option>
                                @if(isset($scripts))
                                    @foreach($scripts as $scriptOption)
                                        <option value="{{ $scriptOption }}" {{ ($script ?? '') == $scriptOption ? 'selected' : '' }}>
                                            {{ $scriptOption }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="md:col-span-2 flex items-end">
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-search mr-2"></i>
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Languages List -->
            @if(isset($languages) && $languages->count() > 0)
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <i class="fas fa-language mr-3 text-purple-500"></i>
                            Indian Languages
                        </h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                            {{ $languages->count() }} languages found
                        </span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Language</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Script</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Script ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($languages as $language)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-language text-white text-xs"></i>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-900">{{ $language->language ?? 'N/A' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $language->script ?? 'Unknown' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $language->script_id ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/languages/{{ $language->id }}" 
                                           class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white text-sm font-medium rounded-lg transition-all duration-200 transform hover:scale-105">
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
            @endif

            <!-- Quick Links -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="/scripts" class="group bg-gradient-to-r from-purple-50 to-indigo-50 border border-purple-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-font text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors duration-300">Script Systems</h3>
                            <p class="text-sm text-gray-600">Explore writing systems</p>
                        </div>
                    </div>
                </a>
                
                <a href="/cities" class="group bg-gradient-to-r from-blue-50 to-cyan-50 border border-blue-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-city text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">Cities</h3>
                            <p class="text-sm text-gray-600">Languages in cities</p>
                        </div>
                    </div>
                </a>
                
                <a href="/analytics" class="group bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-chart-bar text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-green-600 transition-colors duration-300">Analytics</h3>
                            <p class="text-sm text-gray-600">Language statistics</p>
                        </div>
                    </div>
                </a>
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