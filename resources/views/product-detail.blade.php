<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} — {{ config('app.name', 'NishShop') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

{{-- HEADER --}}
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
                    <span class="absolute top-1 right-1 w-2 h-2 bg-amber-400 rounded-full"></span>
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

{{-- TOP MENU --}}
<nav class="bg-red-950 text-white border-t border-red-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-11 gap-1">
            <button class="flex items-center gap-2 px-4 h-full bg-red-900 text-sm font-medium hover:bg-red-800 transition shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                All Categories
            </button>
            <div class="flex items-center gap-0 overflow-x-auto ml-2">
                <a href="{{ route('home') }}" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Home</a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Products</a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">
                    Sale
                    <span class="ml-1.5 text-xs bg-amber-500 text-white px-1.5 py-0.5 rounded font-semibold">HOT</span>
                </a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Contact</a>
            </div>
            <div class="ml-auto shrink-0 hidden lg:flex items-center gap-2 text-xs font-medium text-red-200 whitespace-nowrap pr-2">
                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                Free shipping on orders over $50
            </div>
        </div>
    </div>
</nav>

{{-- BREADCRUMB --}}
<div class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <nav class="flex items-center gap-2 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-red-800 transition-colors">Home</a>
            <svg class="w-3.5 h-3.5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            @if ($product->category)
                <a href="#" class="hover:text-red-800 transition-colors">{{ $product->category->name }}</a>
                <svg class="w-3.5 h-3.5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            @endif
            <span class="text-gray-900 font-medium truncate max-w-xs">{{ $product->name }}</span>
        </nav>
    </div>
</div>

{{-- PRODUCT DETAIL --}}
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">

            {{-- LEFT — Product Image --}}
            <div class="relative bg-gray-50 flex items-center justify-center min-h-80 lg:min-h-[520px] p-8 border-b lg:border-b-0 lg:border-r border-gray-200">

                @if ($product->image)
                    <img
                        src="{{ Storage::url($product->image) }}"
                        alt="{{ $product->name }}"
                        id="product-image"
                        class="max-h-96 lg:max-h-[440px] w-full object-contain rounded-xl transition-transform duration-300 hover:scale-105 cursor-zoom-in"
                    >
                @else
                    <div class="flex flex-col items-center justify-center text-gray-300 gap-4">
                        <svg class="w-40 h-40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8"
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-sm">No image available</p>
                    </div>
                @endif

                <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full shadow-md flex items-center justify-center text-gray-400 hover:text-red-600 hover:shadow-lg transition-all">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </button>

            </div>

            {{-- RIGHT — Product Info --}}
            <div class="p-8 lg:p-10 flex flex-col">

                {{-- Category badge --}}
                @if ($product->category)
                    <span class="inline-flex items-center gap-1.5 self-start bg-amber-50 text-amber-700 text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wide">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                        </svg>
                        {{ $product->category->name }}
                    </span>
                @endif

                {{-- Name --}}
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 leading-snug mb-4">
                    {{ $product->name }}
                </h1>

                {{-- Price --}}
                <div class="flex items-baseline gap-3 mb-6 pb-6 border-b border-gray-100">
                    <span class="text-4xl font-bold text-gray-900">
                        ${{ number_format($product->price, 2) }}
                    </span>
                    <span class="text-sm text-green-600 font-medium bg-green-50 px-2.5 py-0.5 rounded-full">
                        In Stock
                    </span>
                </div>

                {{-- Description --}}
                <div class="mb-8">
                    <h2 class="text-sm font-semibold text-gray-900 uppercase tracking-wide mb-3">Description</h2>
                    @if ($product->description)
                        <div class="text-gray-600 text-sm leading-relaxed space-y-2">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    @else
                        <p class="text-gray-400 text-sm italic">No description provided.</p>
                    @endif
                </div>

                {{-- Quick specs --}}
                <div class="grid grid-cols-2 gap-3 mb-8">
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-0.5">Category</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $product->category?->name ?? '—' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-0.5">SKU</p>
                        <p class="text-sm font-semibold text-gray-800">{{ strtoupper(substr($product->slug, 0, 10)) }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-0.5">Availability</p>
                        <p class="text-sm font-semibold text-green-600">In Stock</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-0.5">Shipping</p>
                        <p class="text-sm font-semibold text-gray-800">Free over $50</p>
                    </div>
                </div>

                {{-- Flash message --}}
                @if (session('cart_success'))
                    <div id="cart-toast"
                         class="flex items-center gap-2 bg-green-50 border border-green-200 text-green-800 text-sm px-4 py-3 rounded-xl mb-4">
                        <svg class="w-4 h-4 text-green-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ session('cart_success') }}
                        <a href="{{ route('cart.index') }}" class="ml-auto font-semibold underline hover:no-underline whitespace-nowrap">View Cart →</a>
                    </div>
                @endif

                {{-- Quantity + Add to Cart --}}
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="flex items-center gap-3">

                        {{-- Quantity stepper --}}
                        <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden">
                            <button type="button" id="qty-minus"
                                class="w-10 h-11 flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-gray-900 transition text-lg font-medium">
                                −
                            </button>
                            <input id="qty-input" type="number" name="quantity" value="1" min="1" max="99"
                                class="w-12 h-11 text-center text-sm font-semibold text-gray-900 border-x border-gray-200 focus:outline-none">
                            <button type="button" id="qty-plus"
                                class="w-10 h-11 flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-gray-900 transition text-lg font-medium">
                                +
                            </button>
                        </div>

                        {{-- Add to Cart --}}
                        <button type="submit" class="flex-1 flex items-center justify-center gap-2 bg-red-800 hover:bg-red-700 active:scale-95 text-white font-semibold text-sm px-6 py-3 rounded-xl transition-all duration-150">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Add to Cart
                        </button>

                        {{-- Buy Now --}}
                        <a href="{{ route('cart.index') }}"
                           onclick="this.closest('form').submit(); return false;"
                           class="flex items-center justify-center gap-2 bg-gray-900 hover:bg-gray-700 active:scale-95 text-white font-semibold text-sm px-5 py-3 rounded-xl transition-all duration-150 hidden sm:flex">
                            Buy Now
                        </a>

                    </div>
                </form>

                {{-- Trust badges --}}
                <div class="flex items-center gap-5 mt-6 pt-6 border-t border-gray-100">
                    <div class="flex items-center gap-1.5 text-xs text-gray-500">
                        <svg class="w-4 h-4 text-green-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        Secure Payment
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-gray-500">
                        <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Easy Returns
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-gray-500">
                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        Fast Shipping
                    </div>
                </div>

            </div>
            {{-- END RIGHT --}}

        </div>
    </div>

    {{-- RELATED PRODUCTS --}}
    @if ($related->isNotEmpty())
        <section class="mt-12">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-lg font-semibold text-gray-900">More from this Category</h2>
                <a href="{{ route('home') }}" class="text-sm text-red-800 hover:text-red-900 font-medium transition-colors">
                    View all →
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($related as $item)
                    <a href="{{ route('product.show', $item->slug) }}"
                       class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md hover:border-amber-200 transition-all duration-200 group flex flex-col">

                        <div class="bg-gray-100 h-36 flex items-center justify-center overflow-hidden">
                            @if ($item->image)
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <svg class="w-16 h-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            @endif
                        </div>

                        <div class="p-3 flex flex-col flex-1">
                            <h3 class="text-xs font-semibold text-gray-900 line-clamp-2 flex-1 mb-2 group-hover:text-red-800 transition-colors">
                                {{ $item->name }}
                            </h3>
                            <span class="text-sm font-bold text-gray-900">${{ number_format($item->price, 2) }}</span>
                        </div>

                    </a>
                @endforeach
            </div>
        </section>
    @endif

</main>

{{-- FOOTER --}}
<footer class="bg-gray-900 text-gray-400 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="lg:col-span-1">
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/logo.png') }}" class="h-8 w-auto" alt="NishShop Logo">
                    <span class="text-lg font-bold text-white">NishShop</span>
                </div>
                <p class="text-sm leading-relaxed mb-4">
                    Your one-stop destination for quality products at unbeatable prices.
                </p>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-widest mb-4">Quick Links</h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach (['Home' => route('home'), 'Products' => '#', 'About Us' => '#', 'Contact' => '#'] as $label => $href)
                        <li><a href="{{ $href }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-widest mb-4">Customer Service</h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach (['FAQ', 'Shipping Policy', 'Returns & Refunds', 'Track Your Order', 'Privacy Policy'] as $link)
                        <li><a href="#" class="hover:text-white hover:translate-x-1 inline-block transition-all">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-widest mb-4">Newsletter</h4>
                <p class="text-sm mb-4 leading-relaxed">Get exclusive deals straight to your inbox.</p>
                <div class="flex gap-2">
                    <input type="email" placeholder="your@email.com"
                        class="flex-1 min-w-0 bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm text-gray-300 placeholder-gray-600 focus:outline-none focus:border-amber-500">
                    <button class="bg-red-800 hover:bg-red-700 text-white text-sm px-4 py-2 rounded-lg transition shrink-0">Join</button>
                </div>
            </div>

        </div>
    </div>

    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
            <p>&copy; {{ date('Y') }} NishShop. All rights reserved.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-white transition">Privacy Policy</a>
                <a href="#" class="hover:text-white transition">Terms of Service</a>
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
    const input = document.getElementById('qty-input');
    document.getElementById('qty-minus').addEventListener('click', () => {
        if (input.value > 1) input.value = parseInt(input.value) - 1;
    });
    document.getElementById('qty-plus').addEventListener('click', () => {
        if (input.value < 99) input.value = parseInt(input.value) + 1;
    });
</script>

</body>
</html>
