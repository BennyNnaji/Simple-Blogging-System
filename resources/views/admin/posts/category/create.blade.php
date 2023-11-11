@extends('admin.layout.app')
@section('content')
    <section>
        <button class="bg-green-700 text-green-300 rounded border px-4 py-2"><a href="{{ route('admin.categories') }}">View
                Categories</a></button>
        <div>
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
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach
            @endif
            <form action="" method="post" class="elevation-4 w-6/12 p-5 m-3">
                @csrf
                <input type="text" name="category" id="category" placeholder="Enter the name of the category"
                    class="form-input w-5/6 focus:border-stone-500">
                <input type="submit" value="Add"
                    class="bg-zinc-700 text-zinc-300 rounded border px-5 cursor-pointer py-2">
            </form>
        </div>
    </section>
@endsection
