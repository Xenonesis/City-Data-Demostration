@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="container-fluid p-0">
    <!-- Hero Section -->
    <div class="jumbotron bg-primary text-white p-5 mb-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">About City Project</h1>
                    <p class="lead mb-4">Empowering communities with comprehensive city data and insights for better decision-making and urban planning.</p>
                    <a class="btn btn-light btn-lg me-3" href="/cities">
                        <i class="fas fa-city me-2"></i>Explore Cities
                    </a>
                    <a class="btn btn-outline-light btn-lg" href="#mission">
                        <i class="fas fa-info-circle me-2"></i>Learn More
                    </a>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-building display-1 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div id="mission" class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary mb-3">Our Mission</h2>
                    <p class="lead text-muted">Bridging the gap between data and decision-makers to create smarter, more sustainable cities.</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="text-center mb-3">
                                    <i class="fas fa-bullseye text-primary display-4"></i>
                                </div>
                                <h4 class="card-title text-center mb-3">Data-Driven Insights</h4>
                                <p class="card-text text-muted">We provide accurate, up-to-date city data to help urban planners, researchers, and citizens make informed decisions about their communities.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="text-center mb-3">
                                    <i class="fas fa-users text-success display-4"></i>
                                </div>
                                <h4 class="card-title text-center mb-3">Community Focused</h4>
                                <p class="card-text text-muted">Our platform is designed to serve diverse stakeholders including government officials, businesses, and residents who care about urban development.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">What We Offer</h2>
                <p class="lead text-muted">Comprehensive city information at your fingertips</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="fas fa-chart-line text-info mb-3 display-4"></i>
                            <h5 class="card-title">Population Statistics</h5>
                            <p class="card-text text-muted">Detailed demographic data and population trends for informed planning.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="fas fa-map-marked-alt text-warning mb-3 display-4"></i>
                            <h5 class="card-title">Geographic Data</h5>
                            <p class="card-text text-muted">Area, coordinates, and spatial information for comprehensive analysis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="fas fa-search text-primary mb-3 display-4"></i>
                            <h5 class="card-title">Easy Search</h5>
                            <p class="card-text text-muted">Powerful search and filtering capabilities to find cities quickly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="fas fa-mobile-alt text-success mb-3 display-4"></i>
                            <h5 class="card-title">Mobile Friendly</h5>
                            <p class="card-text text-muted">Responsive design that works perfectly on all devices.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Our Team</h2>
            <p class="lead text-muted">Dedicated professionals passionate about urban data</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-user-circle text-secondary display-1"></i>
                        </div>
                        <h5 class="card-title">Data Analyst</h5>
                        <p class="text-muted">Ensuring data accuracy and quality</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-user-circle text-secondary display-1"></i>
                        </div>
                        <h5 class="card-title">Urban Planner</h5>
                        <p class="text-muted">Providing planning expertise and insights</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-user-circle text-secondary display-1"></i>
                        </div>
                        <h5 class="card-title">Developer</h5>
                        <p class="text-muted">Building and maintaining the platform</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="display-5 fw-bold mb-3">Ready to Explore Cities?</h2>
            <p class="lead mb-4">Join thousands of users discovering comprehensive city information</p>
            <a class="btn btn-light btn-lg me-3" href="/cities">
                <i class="fas fa-arrow-right me-2"></i>Get Started
            </a>
            <a class="btn btn-outline-light btn-lg" href="/contact">
                <i class="fas fa-envelope me-2"></i>Contact Us
            </a>
        </div>
    </div>
</div>
@endsection
