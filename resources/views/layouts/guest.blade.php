<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="shortcut icon" href="{{ asset('storage/images/fav.png') }}" type="image/x-icon">

    <!-- Scripts -->

</head>

<body class="font-sans text-gray-900 antialiased bg-gray-200">
    @include('layout.preloader')
    <div class="bg-gray-700 text-gray-300 md:flex justify-between p-3 hidden">
        <div class="">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <div>
            <a href="https://facebook.com/EasyWorldTechs" target="_blank"> <i
                    class="fa-brands fa-facebook  mx-2"></i></a>
            <a href="https://instagram.com/EasyWorldTechs" target="_blank"> <i
                    class="fa-brands fa-instagram  mx-2"></i></a>
            <a href="https://twitter.com/EasyWorldTechs" target="_blank"> <i class="fa-brands fa-twitter mx-2"></i></a>
            <a href="https://ng.linkedin.com/company/EasyWorldTechs" target="_blank"> <i
                    class="fa-brands fa-linkedin mx-2"></i></a>
            <a href="https://wa.me.com/2347045887591" target="_blank"> <i class="fa-brands fa-whatsapp mx-2"></i></a>
        </div>
    </div>
    <div class="bg-gray-700 text-gray-300 flex justify-between p-3">
        <div class="md:hidden">
            <a href="/">
                <x-application-logo class="w-20 h-20" />
            </a>
        </div>
        <div class="hidden md:inline">
            <nav>
                <a href="{{ route('frontpage') }}"
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Home</a>
                <a href="{{ route('about') }}"
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">About Us</a>
                <a href="http://127.0.0.1:8000/categories/politics"
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Politics</a>
                <a href="http://127.0.0.1:8000/categories/lifestyle"
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Life Style</a>
                <a href="http://127.0.0.1:8000/categories/fashion"
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Fashion</a>
                <a href="{{ route('contact') }}"
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Contact</a>

            </nav>
        </div>
        <div class="hidden md:inline">
            <nav>
                @auth
                    @if (Auth::user()->role == '1')
                        <a href="{{ route('admin.dashboard') }}"
                            class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Dashboard</a>
                    @else
                        <a href="{{ route('dashboard') }}"
                            class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Dashboard</a>
                    @endif
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                        class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded animate__animated animate__zoomInDown">Log
                        in</a>
                    <a href="{{ route('register') }}"
                        class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Register</a>
                @endguest
            </nav>
        </div>

        <div class="md:hidden transition-opacity duration-500 ease-in-out" id="buttons">
            <span id=""><i class="fa-solid fa-bars cursor-pointer"></i></span>
        </div>

    </div>
    <div class="hidden md:hidden absolute bg-gray-700 inset-x-0 z-50 top-16 transition-all duration-1000 ease-in-out"
        id="mobile-menu">
        <a href="{{ route('frontpage') }}"
            class="tracking-wide hover:bg-gray-700 hover:text-gray-300 py-3 px-5 rounded block">Home</a>
        <a href="{{ route('about') }}"
            class="tracking-wide hover:bg-gray-700 hover:text-gray-300 py-3 px-5 rounded block">About Us</a>
        <a href="http://127.0.0.1:8000/categories/politics"
            class="tracking-wide hover:bg-gray-700 hover:text-gray-300 py-3 px-5 rounded block">Politics</a>
        <a href="http://127.0.0.1:8000/categories/lifestyle"
            class="tracking-wide hover:bg-gray-700 hover:text-gray-300 py-3 px-5 rounded block">Life Style</a>
        <a href="http://127.0.0.1:8000/categories/fashion"
            class="tracking-wide hover:bg-gray-700 hover:text-gray-300 py-3 px-5 rounded block">Fashion</a>
        <a href="{{ route('contact') }}"
            class="tracking-wide hover:bg-gray-700 hover:text-gray-300 py-3 px-5 rounded block">Contact</a>
    </div>
    <div class="w-full mx-auto sm:max-w-md mt-6 px-6 py-4  dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide the preloader when the page is fully loaded
            var preloader = document.querySelector('.preloader');
            preloader.style.display = 'none';


        });
        const mobileMenuButton = document.getElementById('buttons');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
