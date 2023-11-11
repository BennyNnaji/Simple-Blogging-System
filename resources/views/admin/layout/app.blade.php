<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | EWT Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tiny-slider/dist/tiny-slider.css">
    <script src="https://cdn.jsdelivr.net/npm/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="{{ asset('storage/images/fav.png') }}" type="image/x-icon">
    <script src="https://cdn.tiny.cloud/1/6216wbng5cbdfeqd1pkwh8m5hymacgkbzx3etbiache8b5sj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <section>
        <div class="bg-stone-700 text-stone-300 p-3 flex justify-between">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <div class="flex items-center">
                <div class="mx-3">
                    <button class="px-3 py-2 md:px-5 md:py-3 rounded bg-zinc-500 text-zinc-300 font-bold "><i
                            class="fa-solid fa-plus animate-bounce"></i> <a href="{{ route('admin.posts.create') }}">Add
                            Post</a></button>
                </div>
                <div class="relative">
                    <button class="flex items-center">
                        <span class="mr-2 hidden md:inline">{{ Auth::user()->name }}</span>
                        <img src="https://as1.ftcdn.net/v2/jpg/05/34/22/36/1000_F_534223627_0JFVJDBwNku7LyLazrtN6YBTJ2agUfP5.webp"
                            alt="Profile" class="h-8 w-8 rounded-full"><i class="fa-solid fa-angle-down"></i>
                    </button>
                    <ul class="absolute right-0 mt-2 w-40  shadow-lg rounded-md hidden dropdown-transition">
                        <li><a href="#" class="block px-4 py-2 hover:bg-stone-700">Profile</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-stone-700">Settings</a></li>
                        <li><a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-stone-700">

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();">Log
                                        Out
                                    </button>
                                </form>
                            </a></li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <section class="flex">

        {{-- Side Menu --}}
        <div class="w-1/6 min-h-screen bg-stone-700 text-stone-200">
            <section class="mx-5">
                <h2 class="italic font-weight-lighter text-sm">Welcome, </h2>
                <p class="text-lg">{{ Auth::user()->name }}</p>
                <div>
                    <ul>
                        <li class="my-5"><a href="{{ route('admin.dashboard') }}"> <i class="fa-solid fa-gauge"></i> Dashboard</a></li>


                        <li class="my-5"><a href="{{ route('admin.categories') }}"> <i class="fa-solid fa-layer-group"></i> Categories</a></li>
                        <li class="my-5"><a href="{{ route('admin.posts') }}"><i class="fa-regular fa-paste"></i> Posts</a></li>
                        <li class="my-5"><a href=""> <i class="fa-solid fa-user-tie"></i> Users</a></li>
                        <li class="my-5"><a href="{{ route('admin.about') }}"> <i class="fa-solid fa-file"></i> About Us</a></li>
                        <li class="my-5"><a href="{{ route('admin.contact') }}"> <i class="fa-solid fa-file"></i> Contact Us</a></li>
                        <li class="my-5"><a href="{{ route('admin.terms') }}"> <i class="fa-solid fa-file"></i> Terms</a></li>
                        <li class="my-5"><a href="{{ route('admin.privacy') }}"> <i class="fa-solid fa-file"></i> Privacy Policy</a></li>
                    

                    </ul>
                </div>

            </section>

        </div>
        {{-- Main Content --}}

        <div class=" w-5/6 bg-gray-300/40 p-3">
            @yield('content')
        </div>

    </section>

    <script>
        //     Admin Profile dropdown
        // Dropdown toggle
        document.querySelector('.relative').addEventListener('click', function() {
            var dropdown = this.querySelector('.absolute');
            dropdown.classList.toggle('hidden');
        });
    </script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>

</body>

</html>


  
 
