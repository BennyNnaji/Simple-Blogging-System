@extends('admin.layout.app')
@section('content')
    <section>

        <div class="w-4/6 elevation-6 p-5">
      

             @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title" class="block"> Post Title</label>
                <input type="text" name="title" id="title" placeholder=" Post Title " value="{{ old('title') }}"
                    class="form-input w-4/5">

                <label for="content" class="block"> Post Content</label>
                <textarea id="myTextarea" name="content" rows="10" id="content" class="w-4/5 form-textarea">{{ old('content') }}</textarea>

                <label for="category" class="block"> Post Category</label>
                <select name="category" id="category" class="form-select w-4/5">
                    @foreach ($blogs as $blog)
                        <option value="{{ $blog->category }}">{{ $blog->category }}</option>
                    @endforeach
                </select>
                <label for="img" class="block"> Post Image</label>
                <input type="file" accept=".jpg, .png,.jpeg" name="img" id="img">
                <input type="submit" value="Add Post"
                    class="w-1/6 bg-zinc-500 block rounded text-zinc-300 px-4 py-2 my-5 cursor-pointer">
            </form>
        </div>

    </section>
@endsection
