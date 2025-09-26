@extends('layouts.app')

@section('title', 'Offline')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 bg-gray-50">
    <div class="max-w-md w-full text-center">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="mb-6">
                <i class="fas fa-wifi-slash text-6xl text-gray-400 mb-4"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-4">You're Offline</h1>
            <p class="text-gray-600 mb-6">
                It looks like you're not connected to the internet. Some features may not be available, but you can still browse cached content.
            </p>
            
            <div class="space-y-3">
                <button onclick="window.location.reload()" 
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200">
                    <i class="fas fa-redo mr-2"></i>
                    Try Again
                </button>
                
                <button onclick="goHome()" 
                        class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition-all duration-200">
                    <i class="fas fa-home mr-2"></i>
                    Go to Home
                </button>
            </div>
            
            <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                <h3 class="text-sm font-semibold text-blue-800 mb-2">Available Offline:</h3>
                <ul class="text-sm text-blue-700 space-y-1 text-left">
                    <li>• Previously visited pages</li>
                    <li>• Cached city data</li>
                    <li>• Basic navigation</li>
                    <li>• PWA functionality</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function goHome() {
        window.location.href = '/';
    }

    // Check for network connectivity
    function checkConnection() {
        if (navigator.onLine) {
            window.location.reload();
        }
    }

    // Listen for network changes
    window.addEventListener('online', checkConnection);
    
    // Check connection every 30 seconds
    setInterval(checkConnection, 30000);
</script>
@endsection