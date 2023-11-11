@extends('admin.layout.app')
@section('content')
 @if (session('success'))
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
                    icon: 'success',
                    title: '{{ session('success') }}'
                })
            </script>
        </div>
    @endif
    <section class="p-2">
       
        <div class="md:flex items-center gap-2">
            <div class="md:w-3/12  border border-green-500 elevation-5 py-11 px-4 text-center my-3">
                <h1 class="text-2xl"> Posts<sup class="bg-red-700 text-white h-5 w-5 rounded-full p-3">{{ $blogs->count() }}</sup></h1>
            </div>
            <div class="md:w-3/12  border border-green-500 elevation-5 py-11 px-4 text-center my-3">
                <h1 class="text-2xl"> Comments<sup class="bg-red-700 text-white h-5 w-5 rounded-full p-3">{{ $comments->count() }}</sup></h1>
            </div>
            <div class="md:w-3/12  border border-green-500 elevation-5 py-11 px-4 text-center my-3">
                <h1 class="text-2xl"> Users<sup class="bg-red-700 text-white h-5 w-5 rounded-full p-3">{{ $users->count() }}</sup></h1>
            </div>
            <div class="md:w-3/12  border border-green-500 elevation-5 py-11 px-4 text-center my-3">
                <h1 class="text-2xl"> Categories<sup class="bg-red-700 text-white h-5 w-5 rounded-full p-3">{{ $categories->count() }}</sup></h1>
            </div>
        </div>
    </section>
@endsection
