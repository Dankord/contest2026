<!DOCTYPE html>
<html lang="en" data-theme="commit">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <script>document.documentElement.classList.add('js')</script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex flex-col bg-base-200 font-sans">
    @if(session('success'))
        <div class="toast toast-top toast-center mt-20 z-30">
            <div class="alert alert-success animate-fade-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span> {{ session('success') }}</span>
            </div>
        </div>
    @endif

        <div class="bg-primary py-2 text-center text-sm text-primary-content/90">
            Free delivery on orders over ₱20,000. Pay with GCash, cards or installments.
        </div>

        {{-- Floating bubble navbar --}}
        <header class="sticky top-3 z-20 mx-auto mt-3 w-full max-w-7xl px-3 sm:px-4">
            <nav class="navbar min-h-0 rounded-full bg-base-100/90 px-2 py-2 shadow-lg shadow-primary/10 sm:px-3 ring-1 ring-base-300 backdrop-blur-md">
                <div class="navbar-start w-auto! flex-1 gap-1 lg:w-1/2! lg:flex-none">
                    {{-- Small screens: menu --}}
                    <div class="dropdown lg:hidden">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle btn-sm" aria-label="Open menu">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </div>
                        <ul tabindex="0" class="menu dropdown-content mt-4 w-56 rounded-box bg-base-100 p-2 shadow-lg ring-1 ring-base-300">
                            @foreach (['Laptops', 'Smartphones', 'Desktop PCs', 'Deals', 'Trade-in', 'Stores'] as $link)
                                <li><a href="#">{{ $link }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="/" class="btn btn-ghost h-auto px-1 py-1 text-base text-primary sm:px-2 sm:text-lg" aria-label="{{ config('app.name') }} home"><x-logo /></a>
                </div>

                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal gap-1 px-1 text-sm font-medium">
                        @foreach (['Laptops', 'Smartphones', 'Desktop PCs', 'Deals', 'Trade-in', 'Stores'] as $link)
                            <li><a href="#">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="navbar-end w-auto! shrink-0 gap-1 sm:gap-2 lg:w-1/2!">
                @auth
                    <span class="text-sm">{{ auth()->user()->name }}</span>
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-ghost btn-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-ghost btn-sm hidden sm:inline-flex">Sign In</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a>
                @endauth
                    <a href="#" class="btn btn-secondary btn-sm" aria-label="Cart"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4h2l2.4 10.2a1 1 0 0 0 1 .8h8.6a1 1 0 0 0 1-.8L20 8H6"/><circle cx="9" cy="19" r="1.2"/><circle cx="17" cy="19" r="1.2"/></svg><span class="hidden sm:inline">Cart</span> <span class="badge badge-sm border-0 bg-white/25 text-secondary-content">0</span></a>
                </div>
            </nav>
        </header>

        <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8">
            {{ $slot }}
        </main>

        <footer class="mt-8 bg-primary text-sm text-primary-content/70">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 py-12 sm:grid-cols-2 lg:grid-cols-4">
                <div>
                    <x-logo class="text-lg text-primary-content" />
                    <p class="mt-3 max-w-xs">Empowering modern living through technology. Laptops, phones and PCs with support you can walk into.</p>
                </div>
                <div>
                    <h2 class="font-semibold text-primary-content">Shop</h2>
                    <ul class="mt-3 space-y-2">
                        @foreach (['Laptops', 'Smartphones', 'Desktop PCs', 'Deals'] as $l)
                            <li><a href="#" class="hover:text-primary-content">{{ $l }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h2 class="font-semibold text-primary-content">Help</h2>
                    <ul class="mt-3 space-y-2">
                        @foreach (['How to order', 'Shipping', 'Returns and exchanges', 'Warranty', 'FAQs'] as $l)
                            <li><a href="#" class="hover:text-primary-content">{{ $l }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h2 class="font-semibold text-primary-content">Contact</h2>
                    <p class="mt-3">hello@yourdomain.com<br>Mon to Sun, 10:00 AM to 7:00 PM</p>
                </div>
            </div>
            <p class="border-t border-white/10 py-5 text-center">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </footer>
    </body>
</html>