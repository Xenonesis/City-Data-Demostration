<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - City Project</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- PWA Meta Tags -->
    <meta name="application-name" content="City Project">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="City Project">
    <meta name="description" content="Comprehensive city data platform providing insights and information for urban planning and development across India">
    <meta name="format-detection" content="telephone=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="msapplication-config" content="/browserconfig.xml">
    <meta name="msapplication-TileColor" content="#3b82f6">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="theme-color" content="#3b82f6">
    
    <!-- PWA Icons -->
    <link rel="apple-touch-icon" href="/icons/icon-152x152.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/icon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#3b82f6">
    <link rel="shortcut icon" href="/favicon.ico">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-in': 'slideIn 0.3s ease-out',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(0)' },
                        },
                        bounceGentle: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Enhanced Navigation -->
    <nav class="bg-white/95 backdrop-blur-sm shadow-lg sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2 text-2xl font-bold text-blue-600 hover:text-blue-700 transition-colors duration-200">
                        <i class="fas fa-city text-blue-500"></i>
                        <span>City Project</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-6">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i>About
                    </a>
                    <a href="/cities" class="nav-link {{ request()->is('cities*') ? 'active' : '' }}">
                        <i class="fas fa-city mr-2"></i>Cities
                    </a>
                    <a href="/states" class="nav-link {{ request()->is('states*') || request()->is('districts*') ? 'active' : '' }}">
                        <i class="fas fa-map mr-2"></i>States
                    </a>
                    <a href="/languages" class="nav-link {{ request()->is('languages*') || request()->is('scripts*') ? 'active' : '' }}">
                        <i class="fas fa-language mr-2"></i>Languages
                    </a>
                    <a href="/analytics" class="nav-link {{ request()->is('analytics*') || request()->is('demographics*') || request()->is('research*') || request()->is('explore*') ? 'active' : '' }}">
                        <i class="fas fa-chart-line mr-2"></i>Analytics
                    </a>
                    <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                        <i class="fas fa-envelope mr-2"></i>Contact
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="lg:hidden flex items-center">
                    <button class="mobile-menu-btn" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="lg:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-100 animate-slide-in">
                    <a href="/" class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="fas fa-home mr-3"></i>Home
                    </a>
                    <a href="/about" class="mobile-nav-link {{ request()->is('about') ? 'active' : '' }}">
                        <i class="fas fa-info-circle mr-3"></i>About
                    </a>
                    <a href="/cities" class="mobile-nav-link {{ request()->is('cities*') ? 'active' : '' }}">
                        <i class="fas fa-city mr-3"></i>Cities
                    </a>
                    <a href="/states" class="mobile-nav-link {{ request()->is('states*') || request()->is('districts*') ? 'active' : '' }}">
                        <i class="fas fa-map mr-3"></i>States & Districts
                    </a>
                    <a href="/languages" class="mobile-nav-link {{ request()->is('languages*') || request()->is('scripts*') ? 'active' : '' }}">
                        <i class="fas fa-language mr-3"></i>Languages
                    </a>
                    <a href="/analytics" class="mobile-nav-link {{ request()->is('analytics*') || request()->is('demographics*') || request()->is('research*') || request()->is('explore*') ? 'active' : '' }}">
                        <i class="fas fa-chart-line mr-3"></i>Analytics
                    </a>
                    <a href="/contact" class="mobile-nav-link {{ request()->is('contact') ? 'active' : '' }}">
                        <i class="fas fa-envelope mr-3"></i>Contact
                    </a>
                </div>
            </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-btn" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-100 animate-slide-in">
                    <a href="/" class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="fas fa-home mr-3"></i>Home
                    </a>
                    <a href="/about" class="mobile-nav-link {{ request()->is('about') ? 'active' : '' }}">
                        <i class="fas fa-info-circle mr-3"></i>About
                    </a>
                    <a href="/cities" class="mobile-nav-link {{ request()->is('cities*') ? 'active' : '' }}">
                        <i class="fas fa-map-marked-alt mr-3"></i>Cities
                    </a>
                    <a href="/contact" class="mobile-nav-link {{ request()->is('contact') ? 'active' : '' }}">
                        <i class="fas fa-envelope mr-3"></i>Contact
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Enhanced Footer -->
    <footer class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-city text-blue-400 text-2xl"></i>
                        <span class="text-2xl font-bold">City Project</span>
                    </div>
                    <p class="text-gray-300 mb-4 max-w-md">
                        Comprehensive city data platform providing insights and information for urban planning and development.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="footer-link">Home</a></li>
                        <li><a href="/about" class="footer-link">About Us</a></li>
                        <li><a href="/cities" class="footer-link">Explore Cities</a></li>
                        <li><a href="/contact" class="footer-link">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-blue-400"></i>
                            info@cityproject.com
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2 text-blue-400"></i>
                            +91 98765 43210
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-blue-400"></i>
                            New Delhi, India
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; 2025 City Project. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <style>
        .nav-link {
            @apply text-gray-700 hover:text-blue-600 font-medium px-3 py-2 rounded-lg transition-all duration-200 flex items-center;
        }
        .nav-link.active {
            @apply text-blue-600 bg-blue-50;
        }
        .mobile-nav-link {
            @apply block text-gray-700 hover:text-blue-600 font-medium px-3 py-2 rounded-lg transition-all duration-200 flex items-center;
        }
        .mobile-nav-link.active {
            @apply text-blue-600 bg-blue-50;
        }
        .mobile-menu-btn {
            @apply text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600 p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200;
        }
        .social-link {
            @apply w-10 h-10 bg-gray-700 hover:bg-blue-600 rounded-full flex items-center justify-center text-white transition-colors duration-200;
        }
        .footer-link {
            @apply text-gray-300 hover:text-white transition-colors duration-200;
        }
    </style>

    <script>
        // Enhanced Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = document.getElementById('mobile-menu-button');
            
            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // PWA Installation and Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', async () => {
                try {
                    const registration = await navigator.serviceWorker.register('/sw.js');
                    console.log('SW registered: ', registration);
                    
                    // Check for service worker updates
                    registration.addEventListener('updatefound', () => {
                        const newWorker = registration.installing;
                        newWorker.addEventListener('statechange', () => {
                            if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                showUpdateAvailableNotification();
                            }
                        });
                    });
                } catch (error) {
                    console.log('SW registration failed: ', error);
                }
            });
        }

        // PWA Install Prompt
        let deferredPrompt;
        let installButton = null;

        window.addEventListener('beforeinstallprompt', (e) => {
            console.log('beforeinstallprompt event fired');
            e.preventDefault();
            deferredPrompt = e;
            showInstallPromotion();
        });

        window.addEventListener('appinstalled', (evt) => {
            console.log('App installed');
            hideInstallPromotion();
        });

        function showInstallPromotion() {
            // Create install button if it doesn't exist
            if (!installButton) {
                installButton = document.createElement('div');
                installButton.id = 'pwa-install-prompt';
                installButton.className = 'fixed bottom-4 right-4 bg-blue-600 text-white p-4 rounded-lg shadow-lg cursor-pointer transform transition-transform hover:scale-105 z-50';
                installButton.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-download"></i>
                        <div>
                            <div class="font-semibold">Install App</div>
                            <div class="text-xs opacity-90">Add to home screen</div>
                        </div>
                        <button onclick="hideInstallPromotion()" class="ml-2 opacity-70 hover:opacity-100">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                installButton.addEventListener('click', installApp);
                document.body.appendChild(installButton);
            }
        }

        function hideInstallPromotion() {
            if (installButton) {
                installButton.remove();
                installButton = null;
            }
        }

        async function installApp() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                const { outcome } = await deferredPrompt.userChoice;
                console.log(`User response to the install prompt: ${outcome}`);
                deferredPrompt = null;
                hideInstallPromotion();
            }
        }

        function showUpdateAvailableNotification() {
            // Show update available notification
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-green-600 text-white p-4 rounded-lg shadow-lg z-50';
            notification.innerHTML = `
                <div class="flex items-center space-x-3">
                    <i class="fas fa-sync-alt"></i>
                    <div>
                        <div class="font-semibold">Update Available</div>
                        <div class="text-xs opacity-90">Refresh to get the latest version</div>
                    </div>
                    <button onclick="window.location.reload()" class="bg-green-700 px-3 py-1 rounded text-xs">
                        Refresh
                    </button>
                </div>
            `;
            document.body.appendChild(notification);
            
            // Auto remove after 10 seconds
            setTimeout(() => {
                notification.remove();
            }, 10000);
        }

        // Network status monitoring
        window.addEventListener('online', () => {
            console.log('Back online');
            showNetworkStatus('online');
        });

        window.addEventListener('offline', () => {
            console.log('Gone offline');
            showNetworkStatus('offline');
        });

        function showNetworkStatus(status) {
            const isOnline = status === 'online';
            const notification = document.createElement('div');
            notification.className = `fixed top-4 left-1/2 transform -translate-x-1/2 ${isOnline ? 'bg-green-600' : 'bg-red-600'} text-white px-4 py-2 rounded-lg shadow-lg z-50`;
            notification.innerHTML = `
                <i class="fas fa-${isOnline ? 'wifi' : 'wifi-slash'} mr-2"></i>
                ${isOnline ? 'Back online' : 'You are offline'}
            `;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
</body>
</html>
