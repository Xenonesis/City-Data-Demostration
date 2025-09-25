@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Contact Us</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">Get in touch with our team. We're here to help with any questions about our city data platform.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <!-- Contact Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2 flex items-center">
                        <i class="fas fa-envelope text-blue-600 mr-3"></i>
                        Send us a Message
                    </h2>
                    <p class="text-gray-600">Fill out the form below and we'll get back to you as soon as possible.</p>
                </div>

                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user mr-2 text-gray-400"></i>Full Name
                            </label>
                            <input type="text" id="name" name="name"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                   placeholder="Your full name" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-envelope mr-2 text-gray-400"></i>Email Address
                            </label>
                            <input type="email" id="email" name="email"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                   placeholder="your@email.com" required>
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-tag mr-2 text-gray-400"></i>Subject
                        </label>
                        <input type="text" id="subject" name="subject"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                               placeholder="What's this about?" required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-comment mr-2 text-gray-400"></i>Message
                        </label>
                        <textarea id="message" name="message" rows="6"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-vertical"
                                  placeholder="Tell us how we can help you..." required></textarea>
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                </form>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="space-y-6">
            <!-- Contact Details -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-address-book text-blue-600 mr-3"></i>
                    Contact Information
                </h3>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-blue-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Email</p>
                            <a href="mailto:info@cityproject.com" class="text-blue-600 hover:text-blue-800 transition duration-200">
                                info@cityproject.com
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-phone text-green-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Phone</p>
                            <a href="tel:+919876543210" class="text-green-600 hover:text-green-800 transition duration-200">
                                +91 98765 43210
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-purple-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Address</p>
                            <address class="text-gray-600 not-italic">
                                City Data Center<br>
                                123 Data Street<br>
                                New Delhi, India - 110001
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Hours -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-clock text-orange-600 mr-3"></i>
                    Business Hours
                </h3>

                <div class="space-y-2 text-gray-600">
                    <div class="flex justify-between">
                        <span>Monday - Friday</span>
                        <span>9:00 AM - 6:00 PM</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Saturday</span>
                        <span>10:00 AM - 4:00 PM</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Sunday</span>
                        <span>Closed</span>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-share-alt text-indigo-600 mr-3"></i>
                    Follow Us
                </h3>

                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 rounded-lg flex items-center justify-center text-white transition duration-200">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-400 hover:bg-blue-500 rounded-lg flex items-center justify-center text-white transition duration-200">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-pink-600 hover:bg-pink-700 rounded-lg flex items-center justify-center text-white transition duration-200">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-red-600 hover:bg-red-700 rounded-lg flex items-center justify-center text-white transition duration-200">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Home -->
    <div class="text-center">
        <a href="/" class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Home
        </a>
    </div>
</div>
@endsection