<div class="bg-red-700 h-1">&nbsp;</div>
<div class="py-2 bg-white my-2">
    <form action="{{ route('search') }}" method="get">
        <input type="search" name="search" id="search" class=" rounded-sm border border-gray-500" placeholder="Search...">
        <input type="submit" value="Search"
            class="bg-red-700 text-red-200 hover:bg-red-200 hover:text-red-700 py-2 px-5">
    </form>
</div>

{{-- popular Posts --}}
<div class="bg-white my-2">

    <div class="bg-red-700 p-3 font-semibold text-gray-100">Popular Posts</div>
    @foreach($pop as $post)
    <!-- Display each blog post here -->
    <h2></h2>
    <!-- Other post details -->

    <div class="m-2 flex gap-2">
        <div class="w-2/6">
            <img src="{{ asset('storage/images/' . $post->img) }}" alt="">
        </div>
        <div class="w-4/6">
            <p class="text-red-700 md:text-sm"> <a href="{{ route('blog.details', $post->slug) }}">{{ $post->title }}</a></p>
            <p class="md:text-xs">{!! Str::limit($post->content, 100) !!} </p>
        </div>

    </div>
    @endforeach

</div>

{{-- Recent Posts --}}
<div class="bg-white my-2">

    <div class="bg-red-700 p-3 font-semibold text-gray-100">Recent Posts</div>
    @if (count($blogs) > 0)
        @foreach ($blogs as $blog)
            <div class="m-2 flex gap-2">

                <div class="w-2/6 inline">
                    <a href="{{ route('blog.details', $blog->slug) }}">
                        <img src="{{ asset('storage/images/' . $blog->img) }}" alt="">
                </div>
                <div class="w-4/6">
                    <p class="text-red-700 md:text-sm">{{ $blog->title }}</p>
                    <p class="md:text-xs"> {!! \Illuminate\Support\Str::limit($blog->content, 100) !!} </p>
                    </a>
                </div>

            </div>
        @endforeach
    @else
        <p class="text-red-700 md:text-sm">No Post Found</p>
    @endif

</div>
