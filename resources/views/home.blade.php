@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron bg-primary text-white p-5 rounded mb-4">
                <h1 class="display-4">Welcome to City Project</h1>
                <p class="lead">Discover amazing cities and explore their unique characteristics.</p>
                <hr class="my-4">
                <p>Your gateway to comprehensive city information and data.</p>
                <a class="btn btn-light btn-lg" href="/cities" role="button">Explore Cities</a>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">City Data</h5>
                            <p class="card-text">Access detailed information about various cities including population, area, and key statistics.</p>
                            <a href="/cities" class="btn btn-primary">View Cities</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">About Us</h5>
                            <p class="card-text">Learn more about our project and mission to provide comprehensive city information.</p>
                            <a href="/about" class="btn btn-secondary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Contact</h5>
                            <p class="card-text">Get in touch with us for any questions or feedback about our city data.</p>
                            <a href="/contact" class="btn btn-info">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 p-4 bg-light rounded">
                <h2 class="text-center mb-4">Why Choose City Project?</h2>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h4><i class="fas fa-check-circle text-success"></i> Comprehensive Data</h4>
                        <p>We provide detailed and up-to-date information about cities worldwide.</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h4><i class="fas fa-check-circle text-success"></i> Easy Navigation</h4>
                        <p>Our user-friendly interface makes it easy to find the information you need.</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h4><i class="fas fa-check-circle text-success"></i> Regular Updates</h4>
                        <p>Our database is regularly updated with the latest city information.</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h4><i class="fas fa-check-circle text-success"></i> Free Access</h4>
                        <p>All our city data is completely free to access and use.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
