@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-emerald-600 via-blue-600 to-purple-700 py-20">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"contact\" patternUnits=\"userSpaceOnUse\" width=\"20\" height=\"20\"><circle cx=\"10\" cy=\"10\" r=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/><circle cx=\"5\" cy=\"5\" r=\"1\" fill=\"%23ffffff\" opacity=\"0.1\"/><circle cx=\"15\" cy=\"15\" r=\"1\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23contact)\"/></svg>');"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in">
                <div class="mb-8">
                    <i class="fas fa-envelope text-6xl md:text-8xl text-white opacity-80 animate-bounce-gentle"></i>
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Contact <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Us</span>
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl text-white opacity-90 max-w-3xl mx-auto leading-relaxed mb-8">
                    Get in touch with our team. We're here to help with any questions about our city data platform.
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-2xl p-8 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full transform translate-x-16 -translate-y-16 opacity-10"></div>
                    <div class="relative z-10">
                        <div class="mb-8">
                            <h2 class="text-3xl font-bold text-gray-900 mb-3 flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-envelope text-white text-xl"></i>
                                </div>
                                Send us a Message
                            </h2>
                            <p class="text-gray-600 text-lg">Fill out the form below and we'll get back to you as soon as possible.</p>
                        </div>

                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-3">
                                        <i class="fas fa-user mr-2 text-blue-500"></i>Full Name
                                    </label>
                                    <input type="text" id="name" name="name"
                                           class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 group-hover:border-gray-300"
                                           placeholder="Your full name" required>
                                </div>
                                <div class="group">
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-3">
                                        <i class="fas fa-envelope mr-2 text-blue-500"></i>Email Address
                                    </label>
                                    <input type="email" id="email" name="email"
                                           class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 group-hover:border-gray-300"
                                           placeholder="your@email.com" required>
                                </div>
                            </div>

                            <div class="group">
                                <label for="subject" class="block text-sm font-semibold text-gray-700 mb-3">
                                    <i class="fas fa-tag mr-2 text-blue-500"></i>Subject
                                </label>
                                <select id="subject" name="subject"
                                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 group-hover:border-gray-300" required>
                                    <option value="">Select a topic</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="data">Data Questions</option>
                                    <option value="technical">Technical Support</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="feedback">Feedback</option>
                                </select>
                            </div>

                            <div class="group">
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-3">
                                    <i class="fas fa-comment mr-2 text-blue-500"></i>Message
                                </label>
                                <textarea id="message" name="message" rows="6"
                                          class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 group-hover:border-gray-300 resize-none"
                                          placeholder="Tell us how we can help you..." required></textarea>
                            </div>

                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg hover:shadow-xl">
                                <i class="fas fa-paper-plane mr-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="space-y-6">
                <!-- Contact Details -->
                <div class="bg-white rounded-2xl shadow-2xl p-6 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-green-400 to-blue-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-green-500 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-address-book text-white"></i>
                            </div>
                            Contact Information
                        </h3>

                        <div class="space-y-6">
                            <div class="group flex items-start hover:bg-gray-50 p-3 rounded-xl transition-colors duration-300">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 mb-1">Email</p>
                                    <a href="mailto:info@cityproject.com" class="text-blue-600 hover:text-blue-800 transition duration-200 font-medium">
                                        info@cityproject.com
                                    </a>
                                </div>
                            </div>

                            <div class="group flex items-start hover:bg-gray-50 p-3 rounded-xl transition-colors duration-300">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 mb-1">Phone</p>
                                    <a href="tel:+919876543210" class="text-green-600 hover:text-green-800 transition duration-200 font-medium">
                                        +91 98765 43210
                                    </a>
                                </div>
                            </div>

                            <div class="group flex items-start hover:bg-gray-50 p-3 rounded-xl transition-colors duration-300">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 mb-1">Address</p>
                                    <address class="text-gray-600 not-italic leading-relaxed">
                                        City Data Center<br>
                                        123 Data Street<br>
                                        New Delhi, India - 110001
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-white rounded-2xl shadow-2xl p-6 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-orange-400 to-red-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            Business Hours
                        </h3>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                <span class="font-medium text-gray-800">Monday - Friday</span>
                                <span class="text-gray-600 font-semibold">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                <span class="font-medium text-gray-800">Saturday</span>
                                <span class="text-gray-600 font-semibold">10:00 AM - 4:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                <span class="font-medium text-gray-800">Sunday</span>
                                <span class="text-red-500 font-semibold">Closed</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-2xl shadow-2xl p-6 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-full transform translate-x-12 -translate-y-12 opacity-10"></div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-share-alt text-white"></i>
                            </div>
                            Follow Us
                        </h3>

                        <div class="grid grid-cols-2 gap-3">
                            <a href="#" class="flex items-center justify-center w-full h-12 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl text-white transition-all duration-300 transform hover:scale-105">
                                <i class="fab fa-facebook-f mr-2"></i>
                                <span class="font-medium">Facebook</span>
                            </a>
                            <a href="#" class="flex items-center justify-center w-full h-12 bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-500 hover:to-blue-600 rounded-xl text-white transition-all duration-300 transform hover:scale-105">
                                <i class="fab fa-twitter mr-2"></i>
                                <span class="font-medium">Twitter</span>
                            </a>
                            <a href="#" class="flex items-center justify-center w-full h-12 bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-700 hover:to-pink-800 rounded-xl text-white transition-all duration-300 transform hover:scale-105">
                                <i class="fab fa-instagram mr-2"></i>
                                <span class="font-medium">Instagram</span>
                            </a>
                            <a href="#" class="flex items-center justify-center w-full h-12 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 rounded-xl text-white transition-all duration-300 transform hover:scale-105">
                                <i class="fab fa-youtube mr-2"></i>
                                <span class="font-medium">YouTube</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center pt-8">
            <a href="/" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Home
            </a>
        </div>
    </div>
</div>
@endsection