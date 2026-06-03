<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'NishShop') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

{{-- ============================================================ --}}
{{-- HEADER                                                        --}}
{{-- ============================================================ --}}
<header class="bg-red-950 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-6">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('images/logo.png') }}" class="h-10 w-auto object-contain" alt="NishShop Icon">
                <span class="text-2xl font-bold text-amber-300 tracking-wide drop-shadow-sm">NishShop</span>
            </a>

            {{-- Search Bar --}}
            <div class="flex-1 max-w-xl">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-red-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input
                        type="text"
                        placeholder="Search for products, brands and more..."
                        class="w-full pl-10 pr-4 py-2 bg-red-800 border border-red-700 rounded-lg text-sm text-white placeholder-red-300 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition"
                    >
                    <button class="absolute inset-y-0 right-0 px-4 bg-amber-500 text-gray-900 text-sm font-semibold rounded-r-lg hover:bg-amber-400 transition">
                        Search
                    </button>
                </div>
            </div>

            {{-- Right Icons --}}
            <div class="flex items-center gap-1 shrink-0">

                {{-- Wishlist --}}
                <button class="relative p-2 text-white hover:text-amber-400 hover:bg-red-800 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-amber-400 rounded-full"></span>
                </button>

                {{-- Account --}}
                <button class="p-2 text-white hover:text-amber-400 hover:bg-red-800 rounded-lg transition hidden sm:block">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </button>

                {{-- Cart --}}
                @php $cartCount = \Cart::getTotalQuantity() @endphp
                <a href="{{ route('cart.index') }}"
                   class="relative flex items-center gap-2 px-4 py-2 text-gray-900 font-bold bg-amber-500 hover:bg-amber-400 rounded-xl transition ml-2 shadow-sm">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="text-sm hidden sm:block">Cart</span>
                    @if ($cartCount > 0)
                        <span class="inline-flex items-center justify-center w-5 h-5 bg-red-800 text-white text-xs font-bold rounded-full">
                            {{ $cartCount > 99 ? '99+' : $cartCount }}
                        </span>
                    @endif
                </a>

            </div>
        </div>
    </div>
</header>

{{-- ============================================================ --}}
{{-- TOP MENU / NAVIGATION                                         --}}
{{-- ============================================================ --}}
<nav class="bg-red-950 text-white border-t border-red-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-11 gap-1">

            {{-- All Categories Button --}}
            <button class="flex items-center gap-2 px-4 h-full bg-red-900 text-sm font-medium hover:bg-red-800 transition shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                All Categories
            </button>

            {{-- Nav Links --}}
            <div class="flex items-center gap-0 overflow-x-auto scrollbar-hide ml-2">
                <a href="{{ route('home') }}" class="px-4 h-11 flex items-center text-sm font-semibold text-white bg-red-800 hover:bg-red-700 hover:text-amber-400 transition whitespace-nowrap">
                    Home
                </a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">
                    Products
                </a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">
                    Electronics
                </a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">
                    Fashion
                </a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">
                    Home &amp; Living
                </a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">
                    Sale
                    <span class="ml-1.5 text-xs bg-amber-500 text-white px-1.5 py-0.5 rounded font-semibold">HOT</span>
                </a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">
                    Contact
                </a>
            </div>

            {{-- Promo Badge --}}
            <div class="ml-auto shrink-0 hidden lg:flex items-center gap-2 text-xs font-medium text-red-200 whitespace-nowrap pr-2">
                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                Free shipping on orders over $50
            </div>

        </div>
    </div>
</nav>

{{-- ============================================================ --}}
{{-- HERO SLIDER                                                   --}}
{{-- ============================================================ --}}
<section class="relative overflow-hidden bg-gray-900" id="hero-slider">

    <div class="relative" id="slider-track">

        {{-- Slide 1 --}}
        <div class="slider-slide" data-slide="0">
            <div class="relative h-72 md:h-96 lg:h-[440px] bg-gradient-to-r from-red-950 to-red-800 flex items-center">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-8 right-16 w-72 h-72 bg-white rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-12 -left-12 w-64 h-64 bg-amber-300 rounded-full blur-3xl"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 flex flex-col md:flex-row items-center gap-8 w-full">
                    <div class="flex-1 text-white text-center md:text-left">
                        <span class="inline-block text-xs font-semibold bg-white/20 text-white px-3 py-1 rounded-full uppercase tracking-widest mb-4">New Arrivals 2025</span>
                        <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-4">
                            Latest Tech<br>
                            <span class="text-amber-400">Gadgets & Deals</span>
                        </h2>
                        <p class="text-red-200 text-sm md:text-base mb-6 max-w-md">
                            Explore our brand new collection of electronics. Up to 40% off on selected items this week only.
                        </p>
                        <div class="flex items-center gap-3 justify-center md:justify-start">
                            <a href="#" class="bg-amber-400 hover:bg-amber-300 text-gray-900 font-semibold text-sm px-6 py-2.5 rounded-lg transition">
                                Shop Now
                            </a>
                            <a href="#" class="border border-white/50 text-white hover:bg-white/10 text-sm px-6 py-2.5 rounded-lg transition">
                                Learn More
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-1 justify-center items-center">
                        <div class="w-64 h-64 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-white/20">
                            <svg class="w-32 h-32 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="slider-slide hidden" data-slide="1">
            <div class="relative h-72 md:h-96 lg:h-[440px] bg-gradient-to-r from-rose-700 via-rose-600 to-orange-500 flex items-center">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-8 right-16 w-72 h-72 bg-white rounded-full blur-3xl"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 flex flex-col md:flex-row items-center gap-8 w-full">
                    <div class="flex-1 text-white text-center md:text-left">
                        <span class="inline-block text-xs font-semibold bg-white/20 text-white px-3 py-1 rounded-full uppercase tracking-widest mb-4">Summer Collection</span>
                        <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-4">
                            Fashion &amp;<br>
                            <span class="text-yellow-300">Style Trends</span>
                        </h2>
                        <p class="text-rose-100 text-sm md:text-base mb-6 max-w-md">
                            Refresh your wardrobe with our curated summer styles. Flat 30% off on all fashion items.
                        </p>
                        <div class="flex items-center gap-3 justify-center md:justify-start">
                            <a href="#" class="bg-white hover:bg-gray-100 text-rose-700 font-semibold text-sm px-6 py-2.5 rounded-lg transition">
                                Explore Now
                            </a>
                            <a href="#" class="border border-white/50 text-white hover:bg-white/10 text-sm px-6 py-2.5 rounded-lg transition">
                                View Lookbook
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-1 justify-center items-center">
                        <div class="w-64 h-64 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-white/20">
                            <svg class="w-32 h-32 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide 3 --}}
        <div class="slider-slide hidden" data-slide="2">
            <div class="relative h-72 md:h-96 lg:h-[440px] bg-gradient-to-r from-emerald-800 via-teal-700 to-cyan-600 flex items-center">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-8 right-16 w-72 h-72 bg-white rounded-full blur-3xl"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 flex flex-col md:flex-row items-center gap-8 w-full">
                    <div class="flex-1 text-white text-center md:text-left">
                        <span class="inline-block text-xs font-semibold bg-white/20 text-white px-3 py-1 rounded-full uppercase tracking-widest mb-4">Weekend Special</span>
                        <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-4">
                            Home &amp; Living<br>
                            <span class="text-cyan-300">Essentials</span>
                        </h2>
                        <p class="text-emerald-100 text-sm md:text-base mb-6 max-w-md">
                            Transform your space with our premium home decor and furniture. Starting from $29.
                        </p>
                        <div class="flex items-center gap-3 justify-center md:justify-start">
                            <a href="#" class="bg-cyan-400 hover:bg-cyan-300 text-gray-900 font-semibold text-sm px-6 py-2.5 rounded-lg transition">
                                Discover More
                            </a>
                            <a href="#" class="border border-white/50 text-white hover:bg-white/10 text-sm px-6 py-2.5 rounded-lg transition">
                                Browse All
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-1 justify-center items-center">
                        <div class="w-64 h-64 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-white/20">
                            <svg class="w-32 h-32 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Slider Controls --}}
    <button id="slider-prev" class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-white/20 hover:bg-white/40 text-white rounded-full flex items-center justify-center backdrop-blur-sm transition z-10">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button id="slider-next" class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-white/20 hover:bg-white/40 text-white rounded-full flex items-center justify-center backdrop-blur-sm transition z-10">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    {{-- Dot Indicators --}}
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2 z-10">
        <button class="slider-dot w-7 h-2 bg-white rounded-full transition-all" data-dot="0"></button>
        <button class="slider-dot w-2 h-2 bg-white/50 rounded-full transition-all" data-dot="1"></button>
        <button class="slider-dot w-2 h-2 bg-white/50 rounded-full transition-all" data-dot="2"></button>
    </div>

</section>

{{-- ============================================================ --}}
{{-- MAIN CONTENT: SIDEBAR + PRODUCT GRID                          --}}
{{-- ============================================================ --}}
{{-- Order success flash --}}
@if (session('order_success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
        <div class="flex items-start gap-3 bg-green-50 border border-green-200 text-green-800 px-5 py-4 rounded-xl shadow-sm">
            <svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-sm font-medium">{{ session('order_success') }}</p>
        </div>
    </div>
@endif

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex gap-6">

        {{-- LEFT SIDEBAR — CATEGORIES --}}
        <aside class="w-64 shrink-0 hidden lg:block">

            {{-- Categories --}}
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden mb-5">
                <div class="bg-red-800 px-4 py-3">
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wide flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                        </svg>
                        Categories
                    </h3>
                </div>
                <ul class="divide-y divide-gray-100">
                    @forelse ($categories as $cat)
                        <li>
                            <a href="#" class="flex items-center justify-between px-4 py-2.5 hover:bg-amber-50 hover:text-red-900 transition group text-sm">
                                <span class="text-gray-700 group-hover:text-red-900">
                                    {{ $cat->name }}
                                </span>
                                <span class="text-xs text-gray-400 bg-gray-100 group-hover:bg-amber-100 group-hover:text-red-800 px-1.5 py-0.5 rounded-full transition">
                                    {{ $cat->products_count }}
                                </span>
                            </a>
                        </li>
                    @empty
                        <li class="px-4 py-3 text-sm text-gray-400 italic">No categories yet.</li>
                    @endforelse
                </ul>
            </div>

            {{-- Price Filter --}}
            <div class="bg-white rounded-xl border border-gray-200 p-4 mb-5">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">Price Range</h3>
                <div class="flex items-center gap-2 mb-3">
                    <input type="number" placeholder="Min" value="0"
                           class="w-full border border-gray-200 rounded-lg px-3 py-1.5 text-sm text-gray-700 focus:outline-none focus:border-amber-400">
                    <span class="text-gray-400 text-sm">—</span>
                    <input type="number" placeholder="Max" value="500"
                           class="w-full border border-gray-200 rounded-lg px-3 py-1.5 text-sm text-gray-700 focus:outline-none focus:border-amber-400">
                </div>
                <button class="w-full bg-red-800 hover:bg-red-700 text-white text-sm font-medium py-2 rounded-lg transition">
                    Apply Filter
                </button>
            </div>

            {{-- Rating Filter --}}
            <div class="bg-white rounded-xl border border-gray-200 p-4 mb-5">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">Customer Rating</h3>
                <div class="space-y-2">
                    @foreach ([5, 4, 3, 2] as $stars)
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 rounded text-red-800 border-gray-300">
                            <span class="flex items-center gap-0.5">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-3.5 h-3.5 {{ $i <= $stars ? 'text-amber-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </span>
                            <span class="text-xs text-gray-500">& Up</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Promo Banner --}}
            <div class="bg-red-800 rounded-xl p-4 text-white text-center">
                <p class="text-xs font-semibold uppercase tracking-widest text-amber-200 mb-1">Special Offer</p>
                <p class="text-2xl font-bold mb-1">25% OFF</p>
                <p class="text-xs text-amber-100 mb-3">On your first order with code</p>
                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1.5 font-mono font-bold tracking-widest text-sm mb-3">
                    WELCOME25
                </div>
                <button class="w-full bg-amber-400 hover:bg-amber-300 text-gray-900 text-xs font-bold py-2 rounded-lg transition">
                    Copy Code
                </button>
            </div>

        </aside>

        {{-- MAIN CONTENT AREA — PRODUCT GRID --}}
        <div class="flex-1 min-w-0">

            {{-- Toolbar --}}
            <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Featured Products</h2>
                    <p class="text-xs text-gray-500 mt-0.5">Showing {{ $products->count() }} {{ $products->count() === 1 ? 'product' : 'products' }}</p>
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-sm text-gray-600">Sort by:</label>
                    <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 text-gray-700 focus:outline-none focus:border-amber-400 bg-white">
                        <option>Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest First</option>
                        <option>Best Rating</option>
                    </select>
                </div>
            </div>

            {{-- Product Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
                @forelse ($products as $product)
                    <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg hover:border-amber-200 transition-all duration-200 group flex flex-col">

                        {{-- Image --}}
                        <div class="relative bg-gray-100 h-44 flex items-center justify-center overflow-hidden">
                            <a href="{{ route('product.show', $product->slug) }}" class="absolute inset-0 z-0">
                                @if ($product->image)
                                    <img
                                        src="{{ Storage::url($product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    >
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-24 h-24 text-gray-300 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </a>

                            {{-- Wishlist --}}
                            <button class="absolute top-2.5 right-2.5 z-10 w-8 h-8 bg-white rounded-full shadow flex items-center justify-center text-gray-400 hover:text-red-600 opacity-0 group-hover:opacity-100 transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>
                        </div>

                        {{-- Details --}}
                        <div class="p-3.5 flex flex-col flex-1">
                            @if ($product->category)
                                <span class="text-xs font-medium text-amber-600 uppercase tracking-wide">
                                    {{ $product->category->name }}
                                </span>
                            @endif

                            <h3 class="text-sm font-semibold text-gray-900 mt-1 mb-4 leading-snug line-clamp-2 flex-1">
                                <a href="{{ route('product.show', $product->slug) }}" class="hover:text-red-800 transition-colors">
                                    {{ $product->name }}
                                </a>
                            </h3>

                            {{-- Price & CTA --}}
                            <div class="flex items-center justify-between mt-auto">
                                <span class="text-base font-bold text-gray-900">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                                <button class="flex items-center gap-1.5 bg-red-800 hover:bg-red-700 text-white text-xs font-medium px-3 py-1.5 rounded-lg transition">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Add
                                </button>
                            </div>
                        </div>

                    </article>
                @empty
                    <div class="col-span-full text-center py-20">
                        <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4"/>
                        </svg>
                        <p class="mt-4 text-gray-400 text-base">No products available yet.</p>
                        <a href="/admin/products/create"
                           class="mt-5 inline-block bg-red-800 text-white text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-red-700 transition">
                            Add your first product
                        </a>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="flex items-center justify-center gap-1.5 mt-8">
                <button class="w-9 h-9 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:border-amber-400 hover:text-red-800 transition text-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-800 text-white font-semibold text-sm">1</button>
                <button class="w-9 h-9 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:border-amber-400 hover:text-red-800 transition text-sm">2</button>
                <button class="w-9 h-9 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:border-amber-400 hover:text-red-800 transition text-sm">3</button>
                <span class="text-gray-400 text-sm px-1">…</span>
                <button class="w-9 h-9 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:border-amber-400 hover:text-red-800 transition text-sm">18</button>
                <button class="w-9 h-9 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:border-amber-400 hover:text-red-800 transition text-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

        </div>
        {{-- END MAIN CONTENT --}}

    </div>
</div>

{{-- ============================================================ --}}
{{-- FOOTER                                                        --}}
{{-- ============================================================ --}}
<footer class="bg-gray-900 text-gray-400 mt-12">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            {{-- Brand Column --}}
            <div class="lg:col-span-1">
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/logo.png') }}" class="h-8 w-auto" alt="NishShop Logo">
                    <span class="text-lg font-bold text-white">NishShop</span>
                </div>
                <p class="text-sm leading-relaxed mb-4">
                    Your one-stop destination for quality products at unbeatable prices. Shop smarter, live better.
                </p>
                <div class="flex items-center gap-3">
                    @foreach (['M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z', 'M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84', 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z'] as $path)
                        <a href="#" class="w-8 h-8 bg-gray-800 hover:bg-red-800 rounded-lg flex items-center justify-center transition">
                            <svg class="w-4 h-4 text-gray-400 hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="{{ $path }}"/>
                            </svg>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-widest mb-4">Quick Links</h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach (['Home', 'Products', 'About Us', 'Blog', 'Contact'] as $link)
                        <li><a href="#" class="hover:text-white hover:translate-x-1 inline-block transition-all">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Customer Service --}}
            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-widest mb-4">Customer Service</h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach (['FAQ', 'Shipping Policy', 'Returns & Refunds', 'Track Your Order', 'Privacy Policy'] as $link)
                        <li><a href="#" class="hover:text-white hover:translate-x-1 inline-block transition-all">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Newsletter --}}
            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-widest mb-4">Newsletter</h4>
                <p class="text-sm mb-4 leading-relaxed">
                    Get exclusive deals and updates straight to your inbox.
                </p>
                <div class="flex gap-2 mb-4">
                    <input
                        type="email"
                        placeholder="your@email.com"
                        class="flex-1 min-w-0 bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm text-gray-300 placeholder-gray-600 focus:outline-none focus:border-amber-500"
                    >
                    <button class="bg-red-800 hover:bg-red-700 text-white text-sm px-4 py-2 rounded-lg transition shrink-0">
                        Join
                    </button>
                </div>
                <div class="flex items-center gap-3">
                    <div class="text-center">
                        <p class="text-white font-bold text-lg">4.9★</p>
                        <p class="text-xs">Rating</p>
                    </div>
                    <div class="w-px h-8 bg-gray-700"></div>
                    <div class="text-center">
                        <p class="text-white font-bold text-lg">50K+</p>
                        <p class="text-xs">Customers</p>
                    </div>
                    <div class="w-px h-8 bg-gray-700"></div>
                    <div class="text-center">
                        <p class="text-white font-bold text-lg">99%</p>
                        <p class="text-xs">Satisfaction</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Bottom Footer --}}
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
            <p>&copy; {{ date('Y') }} NishShop. All rights reserved.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-white transition">Privacy Policy</a>
                <a href="#" class="hover:text-white transition">Terms of Service</a>
                <a href="#" class="hover:text-white transition">Cookies</a>
            </div>
            <div class="flex items-center gap-1.5 text-gray-500">
                @foreach (['VISA', 'MC', 'PP', 'AMEX'] as $pay)
                    <span class="px-2 py-0.5 bg-gray-800 border border-gray-700 rounded text-xs font-medium">{{ $pay }}</span>
                @endforeach
            </div>
        </div>
    </div>

</footer>

<script>
    const slides = document.querySelectorAll('.slider-slide');
    const dots   = document.querySelectorAll('.slider-dot');
    let current  = 0;
    let timer;

    function goTo(index) {
        slides[current].classList.add('hidden');
        dots[current].classList.remove('w-7', 'bg-white');
        dots[current].classList.add('w-2', 'bg-white/50');
        current = (index + slides.length) % slides.length;
        slides[current].classList.remove('hidden');
        dots[current].classList.remove('w-2', 'bg-white/50');
        dots[current].classList.add('w-7', 'bg-white');
    }

    function startAuto() { timer = setInterval(() => goTo(current + 1), 5000); }
    function resetAuto()  { clearInterval(timer); startAuto(); }

    document.getElementById('slider-next').addEventListener('click', () => { goTo(current + 1); resetAuto(); });
    document.getElementById('slider-prev').addEventListener('click', () => { goTo(current - 1); resetAuto(); });
    dots.forEach(dot => dot.addEventListener('click', () => { goTo(parseInt(dot.dataset.dot)); resetAuto(); }));

    startAuto();
</script>

</body>
</html>
