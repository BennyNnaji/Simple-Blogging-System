@extends('layout.app')
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
    <div class="md:flex justify-between gap-2">
        {{-- Center --}}
        <div class="md:w-6/12  order-2">
            {{-- Slider --}}
            <div class="bg-white">
                <h2 class="text-red-700 text-lg md:text-4xl leading-4 font-bold py-3 capitalize">{{ $blog->title }} </h2>
                <img src="{{ asset('storage/images/' . $blog->img) }}" alt="Post image" class="">
            </div>
            <div class="text-xs text-red-700 font-semibold">
                <span><i class="fa-regular fa-calendar"></i> {{ $blog->created_at->diffForHumans() }}</span>
                <span><i class="fa-solid fa-folder-open"></i>{{ $blog->category }}</span>
                <span><i class="fa-solid fa-user"></i>Posted By: {{ $blog->author->name }}</span>
                <span><i class="fa-solid fa-comments"></i>
               @if ($comments->count()>0)
                   @if ($comments->count() == 1)
                       {{ $comments->count() }} Comment
                    @else
                      {{ $comments->count() }}  Comments
                    @endif
               @else
                   No Comment
               @endif
                </span>
            </div>
            <div class="p-2 bg-white">
                <p class="first-letter:text-7xl">{!! $blog->content !!}</p>
            </div>
            {{-- Displays the comment form for logged in Users --}}
            @auth
                <div class="p-3 my-3 elevation-5">
                    <form action="" method="post">
                        @csrf
                        <label for="comment" class="block capitalize text-lg m-3">Share Your Thought on this:</label>
                        <textarea name="comment" id="comment" class="form-textarea w-5/6 h-36 block">{{ old('comment') }}</textarea>
                        <input type="submit" value="Post Comment"
                            class="bg-red-700 rounded px-4 py-2 text-red-300 hover:bg-red-300 hover:text-red-700 cursor-pointer m-3">
                    </form>
                </div>
            @endauth
            {{-- Displays the login n register links for non-logged in users --}}
            @guest
                <div class="my-5">
                    <a href="{{ route('login') }}" class="text-red-700 italic font-semibold"> Login</a> or <a
                        href="{{ route('register') }}" class="text-red-700 italic font-semibold"> Register</a> to comment on
                    this post
                </div>
            @endguest

            {{-- Displays the comments --}}
            <div class=" elevation-5 p-2 my-3 bg-white">
                {{--                Displaying all the comments of a particular blog--}}
             
                    
               
                  @if (count($comments)>0)
               <div>
                <span class="w-11 h-11 rounded-full bg-red-700 text-center text-red-100 p-3">{{ $comments->count() }}</span> <span class="text-red-700  leading-4 font-bold py-3 capitalize italic text-2xl" >
                    @if ($comments->count() == 1)
                        Comment
                    @else
                        Comments
                    @endif
                </span>
               </div>
                    @foreach ($comments as $comment)
                                        <div class="flex items-start p-3 gap-2">
                    <div class="w-2/6">
                        <img src="https://secure.webtoolhub.com/static/resources/icons/set108/26ce8716.png" alt="User Picture" class="w-11">
                         <h2 class="text-red-700  leading-4 font-bold py-3 capitalize italic"> {{ $comment->user->name }}</h2>
                    </div>
                    <div class="4/6 ">{{$comment->comment}}.</p>
                        <div class="text-right"><p class="text-gray-400 italic text-xs">{{ $comment->created_at->format('l j F, Y - g:i a') }}
                        </p></div>
                         
                    </div>
                 
                </div>
                   <hr>
                    @endforeach
                @else
                    <h2 class="text-red-700  leading-4 font-bold py-3 capitalize italic"> No Comment </h2>
                @endif


            </div>

                        {{-- Related Posts --}}
            <div class="">
                <h2 class="text-red-700 text-xl leading-4 font-bold py-3 capitalize italic"> Relates Posts</h2>
                <div class="flex gap-1">
                    @foreach ($relatedBlogs as $blog)
                        <div class="w-3/12">
                            <a href="{{ route('blog.details', $blog->slug) }}">
                                <div class="w-11/12"><img src="{{ asset('storage/images/' . $blog->img) }}" alt="">
                                </div>
                                <h2 class="text-red-700 text-sm capitalize">
                                    {{ \Illuminate\Support\Str::limit($blog->title, 30) }} </h2>
                                <p class="italic text-xs"> {!! \Illuminate\Support\Str::limit($blog->content, 40) !!} </p>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div>{{ $relatedBlogs->links() }}</div>


            </div>
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
