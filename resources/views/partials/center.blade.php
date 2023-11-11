        @if (count($blogs) > 0)
            @foreach ($blogs as $blog)
                <div class="py-3 bg-white px-2">
                    <div class="text-xs">
                        <span><i class="fa-regular fa-calendar"></i> {{ $blog->created_at->format('D d F Y - h:i a') }}</span>
                        <span><i class="fa-solid fa-folder-open"></i>{{ $blog->category }}</span>
                        <span><i class="fa-solid fa-user"></i>Posted By: {{ $blog->author->name }}</span>
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
                 
                    <h2 class="text-red-700 text-xl leading-4 font-bold py-3 capitalize"> <a
                            href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }} </a> </h2>
                    <div class="flex gap-2">
                        <div class="w-2/5 ">

                            <img src="{{ asset('storage/images/' . $blog->img) }}" alt="Post image" class="hover:animate__zoomOut">
                        </div>
                        <div class="w-3/5">
                            {!! Str::limit($blog->content, 300) !!}
                            <div class="text-right">
                                <button
                                    class="bg-red-700 text-red-200 rounded px-4 py-2 hover:bg-red-200 hover:text-red-700"><a
                                        href="{{ route('blog.details', $blog->slug) }}">Read
                                        More..</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h2 class="text-red-700 text-xl leading-4 font-bold py-3 capitalize"> No Post Found!</h2>
        @endif


        <hr>
        <hr>
        <div class="text-right">
            <a href="" class="text-red-700 italic">{{ $blogs->links() }}</a>
        </div>
