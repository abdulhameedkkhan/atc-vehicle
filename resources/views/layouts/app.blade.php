<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ATC Japan - Quality Auto Parts & Vehicles')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-car.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .gradient-text {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
    @livewireStyles
</head>
<body class="bg-white text-gray-900">
    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-black via-blue-900 to-black text-white py-1.5 border-b border-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center text-xs">
                <div class="flex items-center space-x-4">
                    <a href="tel:+819048043444" class="hover:text-blue-400 transition flex items-center gap-1.5">
                        <i class="fas fa-phone text-xs"></i> <span class="text-xs">+81 90-4804-3444</span>
                    </a>
                    <span class="hidden md:flex items-center gap-1.5 text-xs">
                        <i class="fas fa-map-marker-alt text-xs"></i> <span class="text-xs">Ibaraki-ken, Japan</span>
                    </span>
                </div>
                <div class="flex items-center space-x-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="hover:text-blue-400 transition text-xs">
                            <i class="fas fa-user-circle text-xs"></i> <span class="text-xs">Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-blue-400 transition text-xs">
                            <i class="fas fa-sign-in-alt text-xs"></i> <span class="text-xs">Login</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white border-b border-blue-600 sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-800 rounded-lg flex items-center justify-center shadow-lg border border-blue-700">
                            <i class="fas fa-car text-white text-lg"></i>
                        </div>
                        <div>
                            <span class="text-lg font-bold text-blue-600">ATC JAPAN</span>
                            <p class="text-xs text-gray-400">Asia Trading Co. Ltd.</p>
                        </div>
                    </a>
                    <div class="hidden lg:ml-8 lg:flex lg:space-x-1">
                        <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-base font-semibold transition-all flex items-center gap-1.5 {{ request()->routeIs('home') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <i class="fas fa-search text-xs"></i><span>Car Search</span>
                        </a>
                        <a href="{{ route('car-parts.index') }}" class="px-3 py-2 rounded-lg text-base font-semibold transition-all flex items-center gap-1.5 {{ request()->routeIs('car-parts.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <i class="fas fa-cogs text-xs"></i><span>Part Search</span>
                        </a>
                        <a href="{{ route('how-to-buy') }}" class="px-3 py-2 rounded-lg text-base font-semibold transition-all flex items-center gap-1.5 {{ request()->routeIs('how-to-buy') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <i class="fas fa-shopping-cart text-xs"></i><span>How To Buy</span>
                        </a>
                        <a href="{{ route('about') }}" class="px-3 py-2 rounded-lg text-base font-semibold transition-all flex items-center gap-1.5 {{ request()->routeIs('about') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <i class="fas fa-info-circle text-xs"></i><span>About Us</span>
                        </a>
                        <a href="{{ route('testimonials') }}" class="px-3 py-2 rounded-lg text-base font-semibold transition-all flex items-center gap-1.5 {{ request()->routeIs('testimonials') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <i class="fas fa-comment-dots text-xs"></i><span>Testimonials</span>
                        </a>
                        <a href="{{ route('contact') }}" class="px-3 py-2 rounded-lg text-base font-semibold transition-all flex items-center gap-1.5 {{ request()->routeIs('contact') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <i class="fas fa-envelope text-xs"></i><span>Contact Us</span>
                        </a>
                    </div>
                </div>
                <div class="hidden lg:flex items-center">
                </div>
                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-blue-400 hover:text-blue-300 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden bg-white border-t border-blue-600">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    Car Search
                </a>
                <a href="{{ route('car-parts.index') }}" class="block pl-3 pr-4 py-2 text-sm font-medium {{ request()->routeIs('car-parts.*') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    Part Search
                </a>
                <a href="{{ route('how-to-buy') }}" class="block pl-3 pr-4 py-2 text-sm font-medium {{ request()->routeIs('how-to-buy') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    How To Buy
                </a>
                <a href="{{ route('about') }}" class="block pl-3 pr-4 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    About Us
                </a>
                <a href="{{ route('contact') }}" class="block pl-3 pr-4 py-2 text-sm font-medium {{ request()->routeIs('contact') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    Contact Us
                </a>
                <a href="{{ route('testimonials') }}" class="block pl-3 pr-4 py-2 text-sm font-medium {{ request()->routeIs('testimonials') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    Testimonials
                </a>
                @auth
                    <a href="{{ route('enquiries.index') }}" class="block pl-3 pr-4 py-2 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                        My Enquiries
                    </a>
                    <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-lg font-bold mb-3 text-blue-500">Asia Trading Co.</h3>
                    <p class="text-sm text-gray-400 mb-4">
                        Your trusted partner for quality Japanese used vehicles and auto parts. Sourcing excellence from Japan since 2016.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="text-gray-500 hover:text-blue-500 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-blue-500 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-blue-500 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-semibold mb-3 text-blue-500">Quick Links</h4>
                    <ul class="space-y-1.5 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-blue-400 transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-blue-400 transition">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-blue-400 transition">Services</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-blue-400 transition">Products</a></li>
                        <li><a href="{{ route('car-parts.index') }}" class="text-gray-400 hover:text-blue-400 transition">Car Parts</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-blue-400 transition">Contact</a></li>
                        <li><a href="{{ route('testimonials') }}" class="text-gray-400 hover:text-blue-400 transition">Testimonials</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold mb-3 text-blue-500">Contact Info</h4>
                    <ul class="space-y-1.5 text-xs text-gray-400">
                        <li>Phone: +81 90-4804-3444</li>
                        <li>Tel: +81-296-45-4800</li>
                        <li>Fax: +81-296-45-6442</li>
                        <li>Ibaraki-ken, Japan</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-6 pt-6 text-center text-xs text-gray-400">
                <p>&copy; {{ date('Y') }} Asia Trading Co. Pvt. Limited. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Stylish Floating WhatsApp Button -->
    <div class="fixed right-6 bottom-6 z-[100]">
        <a href="https://wa.me/819048043444" target="_blank" class="flex items-center group">
            <div class="absolute right-full mr-3 bg-white px-4 py-2 rounded-xl shadow-xl border border-gray-100 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0 pointer-events-none">
                <p class="text-gray-800 font-bold text-sm whitespace-nowrap flex items-center gap-2">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    Lets Chat on whatsApp
                </p>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-25"></div>
                <div class="relative bg-gradient-to-br from-green-500 to-green-600 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-all duration-300 border-4 border-white">
                    <i class="fab fa-whatsapp text-3xl"></i>
                </div>
            </div>
        </a>
    </div>

    <script>
        // Mobile menu toggle
        const btn = document.querySelector('.mobile-menu-button');
        const menu = document.querySelector('.mobile-menu');
        
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

    @stack('scripts')
    @livewireScripts
</body>
</html>

