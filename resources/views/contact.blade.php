@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container">
    <h1 class="mb-4">Contact Us</h1>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Get in Touch</h5>
                </div>
                <div class="card-body">
                    <p>If you have any questions about our city data or need more information, please feel free to contact us.</p>
                    
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Contact Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> info@cityproject.com</p>
                    <p><strong>Phone:</strong> +91 9876543210</p>
                    <p><strong>Address:</strong> City Data Center<br>
                    123 Data Street<br>
                    New Delhi, India</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-4">
        <a href="/" class="btn btn-secondary">← Back to Home</a>
    </div>
</div>
@endsection