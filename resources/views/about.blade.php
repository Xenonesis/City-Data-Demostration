@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-800">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"buildings\" patternUnits=\"userSpaceOnUse\" width=\"40\" height=\"40\"><rect width=\"8\" height=\"25\" x=\"2\" y=\"15\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect width=\"8\" height=\"30\" x=\"12\" y=\"10\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect width=\"8\" height=\"20\" x=\"22\" y=\"20\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect width=\"8\" height=\"35\" x=\"32\" y=\"5\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23buildings)\"/></svg>');"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-white animate-fade-in">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        About <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">City Project</span>
                    </h1>
                    <p class="text-lg sm:text-xl md:text-2xl mb-8 opacity-90 leading-relaxed">
                        Empowering communities with comprehensive city data and insights for better decision-making and urban planning.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/cities" class="group bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl text-center">
                            <i class="fas fa-city mr-2 group-hover:animate-pulse"></i>
                            Explore Cities
                        </a>
                        <a href="#mission" class="group border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-indigo-600 transition-all duration-300 text-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="text-center lg:text-right animate-fade-in">
                    <div class="relative">
                        <i class="fas fa-building text-8xl md:text-9xl text-white opacity-20 animate-bounce-gentle"></i>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="bg-white/10 backdrop-blur-sm rounded-full p-8">
                                <i class="fas fa-chart-line text-4xl text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <i class="fas fa-chevron-down text-2xl text-white opacity-70"></i>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section id="mission" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Mission</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Bridging the gap between data and decision-makers to create smarter, more sustainable cities
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-bullseye text-3xl text-white"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 text-center mb-4 group-hover:text-blue-600 transition-colors duration-300">Data-Driven Insights</h3>
                    <p class="text-gray-600 leading-relaxed text-center">
                        We provide accurate, up-to-date city data to help urban planners, researchers, and citizens make informed decisions about their communities and drive positive change.
                    </p>
                </div>
                
                <div class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-users text-3xl text-white"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 text-center mb-4 group-hover:text-green-600 transition-colors duration-300">Community Focused</h3>
                    <p class="text-gray-600 leading-relaxed text-center">
                        Our platform is designed to serve diverse stakeholders including government officials, businesses, and residents who care about sustainable urban development.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What We Offer</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Comprehensive city information and tools at your fingertips
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-chart-line text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 group-hover:text-blue-600 transition-colors duration-300">Population Statistics</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Detailed demographic data and population trends for informed planning and analysis.
                    </p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-map-marked-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 group-hover:text-orange-600 transition-colors duration-300">Geographic Data</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Area, coordinates, and spatial information for comprehensive geographic analysis.
                    </p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-search text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 group-hover:text-purple-600 transition-colors duration-300">Easy Search</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Powerful search and filtering capabilities to find cities and data quickly.
                    </p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-mobile-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 group-hover:text-green-600 transition-colors duration-300">Mobile Friendly</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Responsive design that works perfectly on all devices and screen sizes.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Team</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Dedicated professionals passionate about urban data and smart city development
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 text-center hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-chart-bar text-3xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 group-hover:text-blue-600 transition-colors duration-300">Data Analyst</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Ensuring data accuracy, quality, and meaningful insights for better urban decision-making.
                    </p>
                </div>
                
                <div class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 text-center hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-city text-3xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 group-hover:text-green-600 transition-colors duration-300">Urban Planner</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Providing planning expertise and insights for sustainable urban development strategies.
                    </p>
                </div>
                
                <div class="group bg-gradient-to-br from-purple-50 to-violet-50 rounded-2xl p-8 text-center hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-violet-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-code text-3xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 group-hover:text-purple-600 transition-colors duration-300">Developer</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Building and maintaining the platform with cutting-edge technology and user experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Ready to Explore Cities?
                </h2>
                <p class="text-xl text-blue-100 mb-10 leading-relaxed">
                    Join thousands of users discovering comprehensive city information and making data-driven decisions for better urban planning
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="/cities" class="group bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl min-w-[200px]">
                        <i class="fas fa-rocket mr-2 group-hover:animate-pulse"></i>
                        Get Started
                    </a>
                    <a href="/contact" class="group border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-indigo-600 transition-all duration-300 min-w-[200px]">
                        <i class="fas fa-envelope mr-2"></i>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
