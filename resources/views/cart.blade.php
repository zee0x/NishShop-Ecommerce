<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart — {{ config('app.name', 'NishShop') }}</title>
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
                </button>
                <button class="p-2 text-white hover:text-amber-400 hover:bg-red-800 rounded-lg transition hidden sm:block">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </button>
                {{-- Cart (active on cart page) --}}
                @php $cartCount = \Cart::getTotalQuantity() @endphp
                <a href="{{ route('cart.index') }}"
                   class="relative flex items-center gap-2 px-4 py-2 text-gray-900 font-bold bg-amber-500 hover:bg-amber-400 rounded-xl transition ml-2 shadow-sm ring-2 ring-amber-300">
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
            <div class="flex items-center overflow-x-auto ml-2">
                <a href="{{ route('home') }}" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Home</a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Products</a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">
                    Sale <span class="ml-1.5 text-xs bg-amber-500 px-1.5 py-0.5 rounded font-semibold">HOT</span>
                </a>
                <a href="#" class="px-4 h-11 flex items-center text-sm font-medium text-white hover:bg-red-800 hover:text-amber-400 transition whitespace-nowrap">Contact</a>
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
            <span class="text-gray-900 font-medium">Shopping Cart</span>
        </nav>
    </div>
</div>

{{-- MAIN --}}
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Flash message --}}
    @if (session('cart_success'))
        <div class="flex items-center gap-2 bg-green-50 border border-green-200 text-green-800 text-sm px-4 py-3 rounded-xl mb-6">
            <svg class="w-4 h-4 text-green-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ session('cart_success') }}
        </div>
    @endif

    @if ($items->isEmpty())

        {{-- EMPTY STATE --}}
        <div class="text-center py-24">
            <div class="w-24 h-24 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Your cart is empty</h2>
            <p class="text-gray-500 mb-8">Looks like you haven't added anything yet. Start shopping!</p>
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 bg-red-800 hover:bg-red-700 text-white font-semibold text-sm px-6 py-3 rounded-xl transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                Continue Shopping
            </a>
        </div>

    @else

        {{-- CART WITH ITEMS --}}
        <div class="flex flex-col lg:flex-row gap-8 items-start">

            {{-- CART ITEMS LIST --}}
            <div class="flex-1 min-w-0">

                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-xl font-bold text-gray-900">
                        Shopping Cart
                        <span class="text-sm font-normal text-gray-500 ml-1">({{ $items->count() }} {{ $items->count() === 1 ? 'item' : 'items' }})</span>
                    </h1>

                    <form action="{{ route('cart.clear') }}" method="POST"
                          onsubmit="return confirm('Clear your entire cart?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-red-500 hover:text-red-700 hover:underline transition">
                            Clear cart
                        </button>
                    </form>
                </div>

                <div class="space-y-3">
                    @foreach ($items as $item)
                        <div class="bg-white rounded-xl border border-gray-200 p-4 flex flex-col sm:flex-row items-start sm:items-center gap-4">

                            {{-- Image --}}
                            <a href="{{ route('product.show', $item->attributes->slug) }}"
                               class="shrink-0 w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                                @if ($item->attributes->image)
                                    <img src="{{ Storage::url($item->attributes->image) }}"
                                         alt="{{ $item->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                @endif
                            </a>

                            {{-- Name + Category --}}
                            <div class="flex-1 min-w-0">
                                @if ($item->attributes->category)
                                    <p class="text-xs font-medium text-amber-600 uppercase tracking-wide mb-0.5">
                                        {{ $item->attributes->category }}
                                    </p>
                                @endif
                                <a href="{{ route('product.show', $item->attributes->slug) }}"
                                   class="text-sm font-semibold text-gray-900 hover:text-red-800 transition-colors line-clamp-2">
                                    {{ $item->name }}
                                </a>
                                <p class="text-xs text-gray-400 mt-0.5">${{ number_format($item->price, 2) }} each</p>
                            </div>

                            {{-- Quantity stepper --}}
                            <div class="flex items-center gap-3 shrink-0">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                      id="qty-form-{{ $item->id }}" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                                        <button type="button"
                                            onclick="stepQty('{{ $item->id }}', -1)"
                                            class="w-8 h-8 flex items-center justify-center text-gray-500 hover:bg-gray-100 transition text-base font-medium">
                                            −
                                        </button>
                                        <input type="number" name="quantity"
                                               id="qty-{{ $item->id }}"
                                               value="{{ $item->quantity }}"
                                               min="1" max="99"
                                               onchange="document.getElementById('qty-form-{{ $item->id }}').submit()"
                                               class="w-10 h-8 text-center text-sm font-semibold text-gray-900 border-x border-gray-200 focus:outline-none">
                                        <button type="button"
                                            onclick="stepQty('{{ $item->id }}', 1)"
                                            class="w-8 h-8 flex items-center justify-center text-gray-500 hover:bg-gray-100 transition text-base font-medium">
                                            +
                                        </button>
                                    </div>
                                </form>
                            </div>

                            {{-- Subtotal + Remove --}}
                            <div class="flex items-center gap-4 shrink-0">
                                <span class="text-base font-bold text-gray-900 w-20 text-right">
                                    ${{ number_format($item->getPriceSum(), 2) }}
                                </span>

                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-8 h-8 flex items-center justify-center text-gray-300 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center gap-2 text-sm text-red-800 hover:text-red-900 font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                        </svg>
                        Continue Shopping
                    </a>
                </div>

            </div>

            {{-- ORDER SUMMARY --}}
            <div class="w-full lg:w-80 shrink-0">
                <div class="bg-white rounded-xl border border-gray-200 p-6 sticky top-24">

                    <h2 class="text-base font-bold text-gray-900 mb-5">Order Summary</h2>

                    <div class="space-y-3 text-sm mb-5">
                        @foreach ($items as $item)
                            <div class="flex items-start justify-between gap-2">
                                <span class="text-gray-600 line-clamp-1 flex-1">
                                    {{ $item->name }}
                                    <span class="text-gray-400">× {{ $item->quantity }}</span>
                                </span>
                                <span class="text-gray-900 font-medium shrink-0">
                                    ${{ number_format($item->getPriceSum(), 2) }}
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <div class="border-t border-gray-100 pt-4 space-y-2.5 text-sm mb-5">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span class="font-medium text-gray-900">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping</span>
                            @if ($total >= 50)
                                <span class="font-medium text-green-600">Free</span>
                            @else
                                @php $shipping = 5.99 @endphp
                                <span class="font-medium text-gray-900">${{ number_format($shipping, 2) }}</span>
                            @endif
                        </div>
                        @if ($total < 50)
                            <p class="text-xs text-amber-700 bg-amber-50 rounded-lg px-3 py-2">
                                Add ${{ number_format(50 - $total, 2) }} more for free shipping!
                            </p>
                        @endif
                    </div>

                    <div class="border-t border-gray-100 pt-4 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-base font-bold text-gray-900">Total</span>
                            <span class="text-xl font-bold text-gray-900">
                                ${{ number_format($total + ($total < 50 ? 5.99 : 0), 2) }}
                            </span>
                        </div>
                    </div>

                    {{-- Checkout CTA --}}
                    <a href="{{ route('checkout.index') }}"
                       class="w-full flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-400 active:scale-95 text-gray-900 font-bold text-sm px-6 py-3.5 rounded-xl transition-all duration-150 mb-3 shadow-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Proceed to Checkout
                    </a>

                    <div class="flex items-center justify-center gap-4 text-xs text-gray-400 mt-4">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            Secure
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Easy Returns
                        </span>
                    </div>

                </div>
            </div>

        </div>

    @endif

</main>

{{-- FOOTER --}}
<footer class="bg-gray-900 text-gray-400 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('images/logo.png') }}" class="h-8 w-auto" alt="NishShop Logo">
                    <span class="text-base font-bold text-white">NishShop</span>
                </div>
                <p class="text-sm leading-relaxed">Quality products at unbeatable prices.</p>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-widest mb-3">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="#" class="hover:text-white transition">Products</a></li>
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

<script>
    function stepQty(rowId, delta) {
        const input = document.getElementById('qty-' + rowId);
        const next  = parseInt(input.value) + delta;
        if (next >= 1 && next <= 99) {
            input.value = next;
            document.getElementById('qty-form-' + rowId).submit();
        }
    }
</script>

</body>
</html>
