@extends('admin.layout.app')
@section('content')
    <section class=" py-3 elevation-5 grid grid-cols-2">
        
        @foreach ($blogs as $blog)
            <a href="{{ route('admin.posts.edit', $blog->id) }}">
                <div class="m-2 flex gap-2">
                    <div class="w-1/6">
                        <img src="{{ asset('storage/images/' . $blog->img) }}" alt="Post image" class="">
                    </div>
                    <div class="w-4/6">
                        <p class="text-red-700 md:text-sm">{{ $blog->title }} </p>
                        <p class="md:text-xs">{{ \Illuminate\Support\Str::limit($blog->content, 100) }}
                        <div class="text-xs p-2">
                            <span><i class="fa-regular fa-calendar"></i> {{ $blog->created_at->format('D d M. y - H:i a')  }}</span>
                            <span><i class="fa-solid fa-folder-open"></i>{{ $blog->category }}</span>
                            <span><i class="fa-solid fa-user"></i>Posted By: {{ $blog->author->name }} </span>
                            <span><i class="fa-solid fa-comments"></i>

                                @php
                                    $commentCount = count($comments[$blog->id]);
                                @endphp

                                @if ($commentCount > 0)
                                    @if ($commentCount == 1)
                                        {{ $commentCount }} Comment
                                    @else
                                        {{ $commentCount }} Comments
                                    @endif
                                @else
                                    No Comment
                                @endif
                            </span>
                        </div>
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
        {{ $blogs->links() }}
    </section>
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
@endsection
