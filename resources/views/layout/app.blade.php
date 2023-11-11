<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | {{ env('App_Name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tiny-slider/dist/tiny-slider.css">
    <script src="https://cdn.jsdelivr.net/npm/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="{{ asset('storage/images/fav.png') }}" type="image/x-icon">

</head>

<body class="bg-gray-300">
    {{-- <p class="preloader flex items-center  h-screen justify-center bg-white">
<img src="{{ asset('storage/images/126.gif') }}" alt="">
</p> --}}

    @include('layout.preloader')
    <div class="bg-gray-700 text-gray-300 md:flex justify-between p-3 hidden">
        <div class="">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <div>
            <a href="https://facebook.com/EasyWorldTechs" target="_blank" title="Facebook"> <i
                    class="fa-brands fa-facebook  mx-2"></i></a>
            <a href="https://instagram.com/EasyWorldTechs" target="_blank" title="Instagram"> <i
                    class="fa-brands fa-instagram  mx-2"></i></a>
            <a href="https://twitter.com/EasyWorldTechs" target="_blank" title="Twitter"> <i class="fa-brands fa-twitter mx-2"></i></a>
            <a href="https://ng.linkedin.com/company/EasyWorldTechs" target="_blank"> <i
                    class="fa-brands fa-linkedin mx-2"></i></a>
                                <a href="https://github.com/EasyWorldTechs" target="_blank" title="Github"> <i
                    class="fa-brands fa-github mx-2"></i></a>
            <a href="https://wa.me.com/2347045887591" target="_blank"> <i class="fa-brands fa-whatsapp mx-2" title="WhatsApp"></i></a>
        </div>
    </div>
    <div class="bg-gray-700 text-gray-300 flex justify-between p-3">
        <div class="md:hidden">
            <a href="/">
                <x-application-logo class="w-20 h-20" />
            </a>
        </div>
        {{-- <div class="hidden md:inline"> --}}
        {{-- Desktop Menu --}}
        <div class="hidden md:flex space-x-4">
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

        <!-- Mobile Menu Button -->
        <div class="md:hidden transition-opacity duration-500 ease-in-out" id="buttons">
            <span><i class="fa-solid fa-bars cursor-pointer"></i></span>
        </div>

    </div>
    <!-- Responsive Navbar -->
    {{-- <div class="hidden" id="menus"> --}}
    <div class="hidden md:hidden absolute bg-gray-300/50 inset-x-0 z-50 top-16 transition-all duration-1000 ease-in-out"
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
        <div class="flex justify-content-between">
            <nav>
                <div>


                    @guest
                        <a href="{{ route('login') }}"
                            class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded bg-gray-700 text-gray-300 border-red-300 border-4">Log
                            in</a>
                        <a href="{{ route('register') }}"
                            class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded bg-gray-700 text-gray-300 border-red-700 border-4">Register</a>
                    @endguest

                </div>
                <div>
                    @auth
                        @if (Auth::user()->role == '1')
                            <a href="{{ route('admin.dashboard') }}"
                                class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded bg-gray-700 text-gray-300 border-red-700 border-4">Dashboard</a>
                        @else
                            <a href="{{ route('dashboard') }}"
                                class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded bg-gray-700 text-gray-300 border-red-700 border-4">Dashboard</a>
                        @endif
                    @endauth
                </div>
            </nav>
        </div>
    </div>

    @yield('content')
    <div class="bg-gray-700 text-gray-300 md:flex justify-between p-3">
        <div class="md:w-2/6">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500 " />
            </a>
            <span>{!! Str::limit($aboutPage['about_text'], 350, '...') !!}</span>
        </div>
        <div class="md:w-2/6">
            <a href="{{ route('frontpage') }}"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Home</a>

            <a href="http://127.0.0.1:8000/categories/politics"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Politics</a>
            <a href="" class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Life
                Style</a>
            <a href="http://127.0.0.1:8000/categories/fashion"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Fashion</a>
            <a href="http://127.0.0.1:8000/categories/entertainment"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Entertainment</a>
        </div>

        <div class="md:w-2/6">
            <a href="{{ route('frontpage') }}"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Home</a>
            <a href="{{ route('about') }}"
                class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">About
                Us</a>
            <a href="{{ route('privacy') }}"
                class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Privacy Policy
            </a>
            <a href="{{ route('terms') }}"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Terms and
                Conditions</a>


            <a href="{{ route('contact') }}"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Contact</a>
        </div>
        <div class="md:w-2/6">
            <a href="https://facebook.com/EasyWorldTechs" target="_blank"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Facebook</a>
            <a href="https://instagram.com/EasyWorldTechs" target="_blank"
                class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Instagram
            </a>
            <a href="https://twitter.com/EasyWorldTechs" target="_blank"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Twitter</a>
            <a href="https://ng.linkedin.com/company/EasyWorldTechs" target="_blank"
                class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">LinkedIn
            </a>
            <a href="https://wa.me/2348103938317" target="_blank"
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">WhatsApp</a>
        </div>

    </div>
    <div class="bg-gray-300 text-gray-700 text-center p-4"> Copyright &copy; <span
            class="text-red-500">EWT</span><span class="text-red-300">Blog</span> <?php echo date('Y'); ?> | Designed By <a
            href="https://github.com/bennynnaji/" target="_blank" class="text-red-500 font-bold">Benny Nnaji</a>
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
