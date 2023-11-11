<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opps! Page Not Found | {{env('App_Name')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tiny-slider/dist/tiny-slider.css">
    <script src="https://cdn.jsdelivr.net/npm/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
            <a href=""> <i class="fa-brands fa-facebook  mx-2"></i></a>
            <a href=""> <i class="fa-brands fa-instagram  mx-2"></i></a>
            <a href=""> <i class="fa-brands fa-twitter mx-2"></i></a>
            <a href=""> <i class="fa-brands fa-linkedin mx-2"></i></a>
            <a href=""> <i class="fa-brands fa-whatsapp mx-2"></i></a>
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
                <a href=""
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">About Us</a>
                <a href=""
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Politics</a>
                <a href=""
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Life Style</a>
                <a href=""
                    class="mx-3 tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Fashion</a>
                <a href=""
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
                        class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded animate__animated animate__zoomInDown">Log in</a>
                    <a href="{{ route('register') }}"
                        class=" tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Register</a>
                @endguest
            </nav>
        </div>

        <div class="md:hidden">
            <span id="buttons"><i class="fa-solid fa-bars cursor-pointer"></i></span>
        </div>

    </div>
    <div class="hidden sm:hidden" id="menus">
        <a href=""
            class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Facebook</a>
        <a href="" class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Instagram
        </a>
        <a href=""
            class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Twitter</a>
        <a href="" class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">LinkedIn
        </a>
        <a href=""
            class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Pintrest</a>
        <a href=""
            class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">WhatsApp</a>
    </div>

  
    <div class="w-3/6 mx-auto">
        <img src="https://png.pngtree.com/png-clipart/20220125/original/pngtree-oops-404-error-with-a-broken-electric-line-concept-png-image-png-image_7222903.png" alt="">
        <h2 class="text-center my-7">Click <a href="{{ route('frontpage') }}" class="font-semibold text-xl text-red-700">Here</a> to go to Homepage</h2>
    </div>
    



    <div class="bg-gray-700 text-gray-300 md:flex justify-between p-3">
        <div class="md:w-2/6">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500 " />
            </a>
            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam atque ea hic esse id harum
                architecto corrupti cumque voluptatibus deserunt tempora, quas, illo sit officia laboriosam at
                aspernatur. Commodi, dicta!</span>
        </div>
        <div class="md:w-2/6">
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Home</a>
            <a href="" class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">About
                Us</a>
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Politics</a>
            <a href="" class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Life
                Style</a>
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Fashion</a>
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Contact</a>
        </div>

        <div class="md:w-2/6">
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Home</a>
            <a href="" class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">About
                Us</a>
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Politics</a>
            <a href="" class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Life
                Style</a>
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Fashion</a>
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Contact</a>
        </div>
        <div class="md:w-2/6">
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Facebook</a>
            <a href=""
                class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Instagram
            </a>
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Twitter</a>
            <a href=""
                class="block tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">LinkedIn
            </a>
            <a href=""
                class="block  tracking-wide hover:bg-gray-300 hover:text-gray-700 py-3 px-5 rounded">Pintrest</a>
            <a href=""
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
    </script>

</body>

</html>
