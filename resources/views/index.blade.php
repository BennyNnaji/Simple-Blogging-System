@extends('layout.app')
@section('content')
    @if (session('error'))
        <div>
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: '{{ session('error') }}'
                })
            </script>
        </div>
    @endif
    <div class="md:flex justify-between gap-2">
        {{-- Center --}}
        <div class="md:w-6/12  order-2">
            {{-- Slider --}}
            <div id="my-slider" class="bg-white">
                <div class="transition duration-150 ease-in-out"> <img
                        src="https://cdn.pixabay.com/photo/2020/07/08/04/12/work-5382501_1280.jpg" alt="Home Banner"
                        srcset="">
                </div>
                <div><img src="https://cdn.pixabay.com/photo/2023/08/18/19/44/dog-8199216_1280.jpg" alt=""></div>
                <div><img src="https://cdn.pixabay.com/photo/2016/12/13/00/13/rabbit-1903016_1280.jpg" alt=""></div>
            </div>
            {{-- Posts --}}
            @include('partials.center')
             </div>

        {{-- left sidebar --}}
        <div class="md:w-3/12 order-1 text-gray-600">
            @include('partials.left')
        </div>


        {{-- right Sidebar --}}
        <div class="md:w-3/12 order-3 bg-gray-300 text-gray-600">
            @include('partials.right')
        </div>

    </div>
@endsection
