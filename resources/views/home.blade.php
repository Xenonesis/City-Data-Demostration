@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-800">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"city\" patternUnits=\"userSpaceOnUse\" width=\"20\" height=\"20\"><path d=\"M0 20V0h5v10h5V0h5v15h5V0h5v20\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23city)\"/></svg>');"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <div class="animate-fade-in">
                <div class="mb-8">
                    <i class="fas fa-city text-6xl md:text-8xl text-blue-300 animate-bounce-gentle"></i>
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    Welcome to <br class="sm:hidden">
                    <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                        City Project
                    </span>
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl mb-10 max-w-4xl mx-auto opacity-90 leading-relaxed">
                    Discover amazing cities and explore their unique characteristics with our comprehensive database. 
                    Empowering communities through data-driven insights.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
                    <a href="/cities" class="group bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl min-w-[200px]">
                        <i class="fas fa-map-marked-alt mr-2 group-hover:animate-pulse"></i>
                        Explore Cities
                    </a>
                    <a href="/about" class="group border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 min-w-[200px]">
                        <i class="fas fa-info-circle mr-2"></i>
                        Learn More
                    </a>
                </div>
                
                <!-- Scroll Indicator -->
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                    <i class="fas fa-chevron-down text-2xl text-white opacity-70"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors duration-300">
                        <i class="fas fa-city text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800">500+</h3>
                    <p class="text-gray-600 font-medium">Cities</p>
                </div>
                <div class="text-center group">
                    <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 transition-colors duration-300">
                        <i class="fas fa-users text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800">10M+</h3>
                    <p class="text-gray-600 font-medium">Population</p>
                </div>
                <div class="text-center group">
                    <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-200 transition-colors duration-300">
                        <i class="fas fa-map text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800">28</h3>
                    <p class="text-gray-600 font-medium">States</p>
                </div>
                <div class="text-center group">
                    <div class="bg-orange-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-200 transition-colors duration-300">
                        <i class="fas fa-chart-line text-2xl text-orange-600"></i>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800">Real-time</h3>
                    <p class="text-gray-600 font-medium">Data</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Cards -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Explore Our Features
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Comprehensive tools and data to help you understand cities better
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- City Data Card -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 p-8 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full transform translate-x-16 -translate-y-16 opacity-10 group-hover:opacity-20 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-city text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-blue-600 transition-colors duration-300">City Data</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Access detailed information about various cities including population, demographics, and key statistics with real-time updates.
                        </p>
                        <a href="/cities" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-colors duration-300 group-hover:translate-x-2 transform">
                            View Cities <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- About Us Card -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 p-8 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-400 to-green-600 rounded-full transform translate-x-16 -translate-y-16 opacity-10 group-hover:opacity-20 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-info-circle text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-green-600 transition-colors duration-300">About Us</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Learn more about our project and mission to provide comprehensive city information for better urban planning.
                        </p>
                        <a href="/about" class="inline-flex items-center text-green-600 font-semibold hover:text-green-800 transition-colors duration-300 group-hover:translate-x-2 transform">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Contact Card -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 p-8 border border-gray-100 relative overflow-hidden md:col-span-2 lg:col-span-1">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full transform translate-x-16 -translate-y-16 opacity-10 group-hover:opacity-20 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-envelope text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-purple-600 transition-colors duration-300">Contact</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Get in touch with us for any questions, feedback, or collaboration opportunities regarding our city data platform.
                        </p>
                        <a href="/contact" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-800 transition-colors duration-300 group-hover:translate-x-2 transform">
                            Contact Us <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose City Project?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Discover what makes our platform the perfect choice for city exploration and data analysis
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                <div class="group flex items-start space-x-4 p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3 group-hover:text-green-600 transition-colors duration-300">Comprehensive Data</h3>
                        <p class="text-gray-600 leading-relaxed">We provide detailed and up-to-date information about cities worldwide with accurate statistics and insights for informed decision-making.</p>
                    </div>
                </div>

                <div class="group flex items-start space-x-4 p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-compass text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors duration-300">Easy Navigation</h3>
                        <p class="text-gray-600 leading-relaxed">Our intuitive interface makes it simple to find and explore the information you need quickly with powerful search and filtering capabilities.</p>
                    </div>
                </div>

                <div class="group flex items-start space-x-4 p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-sync-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3 group-hover:text-purple-600 transition-colors duration-300">Regular Updates</h3>
                        <p class="text-gray-600 leading-relaxed">Our database is continuously updated with the latest city information and demographic data to ensure accuracy and relevance.</p>
                    </div>
                </div>

                <div class="group flex items-start space-x-4 p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-globe text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3 group-hover:text-orange-600 transition-colors duration-300">Open Access</h3>
                        <p class="text-gray-600 leading-relaxed">All our city data is completely free to access, explore, and use for your research, planning, or development projects.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Ready to Explore Cities?
                </h2>
                <p class="text-xl text-blue-100 mb-10 leading-relaxed">
                    Join thousands of users discovering comprehensive city information and making data-driven decisions
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="/cities" class="group bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl min-w-[200px]">
                        <i class="fas fa-rocket mr-2 group-hover:animate-pulse"></i>
                        Get Started
                    </a>
                    <a href="/contact" class="group border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 min-w-[200px]">
                        <i class="fas fa-comments mr-2"></i>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
