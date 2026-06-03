<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout — {{ config('app.name', 'NishShop') }}</title>
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

            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('images/logo.png') }}" class="h-10 w-auto object-contain" alt="NishShop Icon">
                <span class="text-2xl font-bold text-amber-300 tracking-wide drop-shadow-sm">NishShop</span>
            </a>

            <div class="flex-1 max-w-xl">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-red-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search for products, brands and more..."
                        class="w-full pl-10 pr-4 py-2 bg-red-800 border border-red-700 rounded-lg text-sm text-white placeholder-red-300 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition">
                    <button class="absolute inset-y-0 right-0 px-4 bg-amber-500 text-gray-900 text-sm font-semibold rounded-r-lg hover:bg-amber-400 transition">
                        Search
                    </button>
                </div>
            </div>

            <div class="flex items-center gap-1 shrink-0">
                <button class="relative p-2 text-white hover:text-amber-400 hover:bg-red-800 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </button>
                <button class="p-2 text-white hover:text-amber-400 hover:bg-red-800 rounded-lg transition hidden sm:block">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </button>
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
{{-- TOP MENU                                                      --}}
{{-- ============================================================ --}}
<nav class="bg-red-950 text-white border-t border-red-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-11 gap-1">
            <button class="flex items-center gap-2 px-4 h-full bg-red-900 text-sm font-medium hover:bg-red-800 transition shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                All Categories
            </button>
            <div class="flex items-center overflow-x-auto ml-2">
                <a href="{{ route('home') }}" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Home</a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Products</a>
                <a href="{{ route('cart.index') }}" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Cart</a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Contact</a>
            </div>
        </div>
    </div>
</nav>

{{-- ============================================================ --}}
{{-- BREADCRUMB                                                    --}}
{{-- ============================================================ --}}
<div class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <nav class="flex items-center gap-2 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-red-800 transition-colors">Home</a>
            <svg class="w-3.5 h-3.5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('cart.index') }}" class="hover:text-red-800 transition-colors">Cart</a>
            <svg class="w-3.5 h-3.5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900 font-medium">Checkout</span>
        </nav>
    </div>
</div>

{{-- ============================================================ --}}
{{-- MAIN CONTENT                                                  --}}
{{-- ============================================================ --}}
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Page Title --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Secure Checkout</h1>
        <p class="text-sm text-gray-500 mt-1">Fill in your details below to complete your order.</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 items-start">

        {{-- ====================================================== --}}
        {{-- LEFT — Billing / Shipping Form                          --}}
        {{-- ====================================================== --}}
        <div class="flex-1 min-w-0">
            <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                @csrf

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 mb-6 text-sm">
                        <p class="font-semibold mb-1">Please fix the following errors:</p>
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- ── Contact Information ── --}}
                <div class="bg-white rounded-2xl border border-gray-200 p-6 mb-5">
                    <h2 class="text-base font-semibold text-gray-900 mb-5 flex items-center gap-2">
                        <span class="w-6 h-6 bg-red-800 text-white rounded-full flex items-center justify-center text-xs font-bold shrink-0">1</span>
                        Contact Information
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        {{-- Full Name --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                   value="{{ old('name') }}"
                                   placeholder="John Doe"
                                   class="w-full px-4 py-2.5 border rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email"
                                   value="{{ old('email') }}"
                                   placeholder="john@example.com"
                                   class="w-full px-4 py-2.5 border rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" id="phone" name="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="+1 (555) 000-0000"
                                   class="w-full px-4 py-2.5 border rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition {{ $errors->has('phone') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- City --}}
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1.5">
                                City <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="city" name="city"
                                   value="{{ old('city') }}"
                                   placeholder="New York"
                                   class="w-full px-4 py-2.5 border rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition {{ $errors->has('city') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- ── Shipping Address ── --}}
                <div class="bg-white rounded-2xl border border-gray-200 p-6 mb-6">
                    <h2 class="text-base font-semibold text-gray-900 mb-5 flex items-center gap-2">
                        <span class="w-6 h-6 bg-red-800 text-white rounded-full flex items-center justify-center text-xs font-bold shrink-0">2</span>
                        Shipping Address
                    </h2>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Street Address <span class="text-red-500">*</span>
                        </label>
                        <textarea id="address" name="address" rows="3"
                                  placeholder="123 Main Street, Apt 4B"
                                  class="w-full px-4 py-2.5 border rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition resize-none {{ $errors->has('address') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Place Order — visible on mobile at bottom of form --}}
                <button type="submit"
                        class="w-full lg:hidden flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-400 active:scale-95 text-gray-900 font-bold text-base px-6 py-4 rounded-xl transition-all shadow-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Place Order
                </button>

            </form>
        </div>

        {{-- ====================================================== --}}
        {{-- RIGHT — Order Summary                                   --}}
        {{-- ====================================================== --}}
        <div class="w-full lg:w-80 shrink-0">
            <div class="bg-white rounded-2xl border border-gray-200 p-6 sticky top-28">

                <h2 class="text-base font-bold text-gray-900 mb-5 flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Order Summary
                </h2>

                {{-- Items --}}
                <div class="space-y-3 mb-5">
                    @foreach ($items as $item)
                        <div class="flex items-start gap-3">
                            {{-- Thumbnail --}}
                            <div class="w-12 h-12 bg-gray-100 rounded-lg overflow-hidden shrink-0 flex items-center justify-center">
                                @if ($item->attributes->image)
                                    <img src="{{ Storage::url($item->attributes->image) }}"
                                         alt="{{ $item->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <svg class="w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                @endif
                            </div>
                            {{-- Info --}}
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $item->name }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">Qty: {{ $item->quantity }} × ${{ number_format($item->price, 2) }}</p>
                            </div>
                            {{-- Row total --}}
                            <span class="text-sm font-semibold text-gray-900 shrink-0">
                                ${{ number_format($item->getPriceSum(), 2) }}
                            </span>
                        </div>
                    @endforeach
                </div>

                {{-- Divider --}}
                <div class="border-t border-gray-100 pt-4 space-y-2.5 text-sm mb-4">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-medium text-gray-900">${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Shipping</span>
                        @if ($total >= 50)
                            <span class="font-medium text-green-600">Free</span>
                        @else
                            <span class="font-medium text-gray-900">$5.99</span>
                        @endif
                    </div>
                    @if ($total < 50)
                        <p class="text-xs text-amber-700 bg-amber-50 rounded-lg px-3 py-2">
                            Add ${{ number_format(50 - $total, 2) }} more for free shipping!
                        </p>
                    @endif
                </div>

                {{-- Total --}}
                <div class="border-t border-gray-100 pt-4 mb-6">
                    <div class="flex justify-between items-center">
                        <span class="text-base font-bold text-gray-900">Total</span>
                        <span class="text-xl font-bold text-gray-900">
                            ${{ number_format($total + ($total < 50 ? 5.99 : 0), 2) }}
                        </span>
                    </div>
                </div>

                {{-- Place Order CTA --}}
                <button type="submit" form="checkout-form"
                        class="w-full flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-400 active:scale-95 text-gray-900 font-bold text-base px-6 py-4 rounded-xl transition-all duration-150 shadow-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Place Order
                </button>

                {{-- Trust Badges --}}
                <div class="flex items-center justify-center gap-4 text-xs text-gray-400 mt-5">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        SSL Secure
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Easy Returns
                    </span>
                </div>

                {{-- Edit Cart Link --}}
                <div class="text-center mt-4">
                    <a href="{{ route('cart.index') }}"
                       class="text-xs text-gray-400 hover:text-red-800 transition-colors">
                        ← Edit cart
                    </a>
                </div>

            </div>
        </div>

    </div>
</main>

{{-- ============================================================ --}}
{{-- FOOTER                                                        --}}
{{-- ============================================================ --}}
<footer class="bg-gray-900 text-gray-400 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('images/logo.png') }}" class="h-8 w-auto" alt="NishShop Logo">
                    <span class="text-base font-bold text-amber-300">NishShop</span>
                </div>
                <p class="text-sm leading-relaxed">Quality products at unbeatable prices.</p>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-widest mb-3">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('cart.index') }}" class="hover:text-white transition">Cart</a></li>
                    <li><a href="#" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-widest mb-3">Support</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                    <li><a href="#" class="hover:text-white transition">Shipping Policy</a></li>
                    <li><a href="#" class="hover:text-white transition">Returns</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
            <p>&copy; {{ date('Y') }} NishShop. All rights reserved.</p>
            <div class="flex items-center gap-1.5 text-gray-500">
                @foreach (['VISA', 'MC', 'PP', 'AMEX'] as $pay)
                    <span class="px-2 py-0.5 bg-gray-800 border border-gray-700 rounded font-medium">{{ $pay }}</span>
                @endforeach
            </div>
        </div>
    </div>
</footer>

</body>
</html>
