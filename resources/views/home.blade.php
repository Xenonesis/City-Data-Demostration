@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-800 text-white py-20 mb-16 rounded-3xl shadow-2xl">
    <div class="text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">
            Welcome to <span class="text-yellow-300">City Project</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Discover amazing cities and explore their unique characteristics with our comprehensive database.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/cities" class="bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Explore Cities
            </a>
            <a href="/about" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300">
                Learn More
            </a>
        </div>
    </div>
</section>

<!-- Feature Cards -->
<section class="mb-16">
    <div class="grid md:grid-cols-3 gap-8">
        <!-- City Data Card -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 border border-gray-100">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                <i class="fas fa-city text-2xl text-blue-600"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">City Data</h3>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Access detailed information about various cities including population, area, and key statistics.
            </p>
            <a href="/cities" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-colors duration-300">
                View Cities <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <!-- About Us Card -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 border border-gray-100">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                <i class="fas fa-info-circle text-2xl text-green-600"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">About Us</h3>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Learn more about our project and mission to provide comprehensive city information.
            </p>
            <a href="/about" class="inline-flex items-center text-green-600 font-semibold hover:text-green-800 transition-colors duration-300">
                Learn More <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <!-- Contact Card -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 border border-gray-100">
            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                <i class="fas fa-envelope text-2xl text-purple-600"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Contact</h3>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Get in touch with us for any questions or feedback about our city data.
            </p>
            <a href="/contact" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-800 transition-colors duration-300">
                Contact Us <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Section -->
<section class="bg-gray-50 py-16 rounded-3xl px-8">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose City Project?</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Discover what makes our platform the perfect choice for city exploration and data analysis.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="flex items-start space-x-4">
            <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                <i class="fas fa-check-circle text-green-600"></i>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Comprehensive Data</h3>
                <p class="text-gray-600">We provide detailed and up-to-date information about cities worldwide with accurate statistics and insights.</p>
            </div>
        </div>

        <div class="flex items-start space-x-4">
            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-compass text-blue-600"></i>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Easy Navigation</h3>
                <p class="text-gray-600">Our intuitive interface makes it simple to find and explore the information you need quickly.</p>
            </div>
        </div>

        <div class="flex items-start space-x-4">
            <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                <i class="fas fa-sync-alt text-purple-600"></i>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Regular Updates</h3>
                <p class="text-gray-600">Our database is continuously updated with the latest city information and demographic data.</p>
            </div>
        </div>

        <div class="flex items-start space-x-4">
            <div class="flex-shrink-0 w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                <i class="fas fa-lock-open text-yellow-600"></i>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Free Access</h3>
                <p class="text-gray-600">All our city data is completely free to access, explore, and use for your projects.</p>
            </div>
        </div>
    </div>
</section>
@endsection
