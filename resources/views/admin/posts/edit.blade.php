@extends('admin.layout.app')
@section('content')
    <section>

        <div class="w-4/6 elevation-6 p-5">


            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('admin.posts.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <label for="title" class="block"> Post Title</label>
                <input type="text" name="title" id="title" placeholder=" Post Title " value="{{ $blog->title }}"
                    class="form-input w-4/5">

                <label for="content" class="block"> Post Content</label>
                <textarea name="content" rows="10" id="content" class="w-4/5 form-textarea">{{ $blog->content }}</textarea>

                <label for="category" class="block"> Post Category</label>
                <select name="category" id="category" class="form-select w-4/5">
                    <option value="{{ $blog->category }}">{{ $blog->category }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                    @endforeach
                </select>
                <label for="img" class="block"> Post Image</label>
                <input type="file" accept=".jpg, .png,.jpeg" name="img" id="img"> <br>
                <br>
                <div class="w-1/6">
                    <img src="{{ asset('storage/images/' . $blog->img) }}" alt="Post image" class="">
                </div>
                <input type="submit" value="Update Post"
                    class="w-1/6 bg-zinc-500 mx-5 rounded text-zinc-300 px-4 py-2 my-5 cursor-pointer">

                   
            </form>
            {{-- <form action="{{ route('admin.posts.destroy', $blog->id) }}" method="post" class="inline">
                @csrf @method('DELETE')
                <button class="w-1/6 bg-red-500 mx-5 rounded text-red-300 px-4 py-2 my-5 cursor-pointer">Delete Post</button>

            </form>  --}}
        {{-- <button onclick="deleteMe({{ $blog->id }})" class="w-1/6 bg-red-500 mx-5 rounded text-red-300 px-4 py-2 my-5 cursor-pointer">Delete Post</button> --}}
 <button onclick="deletePost({{ $blog->id }})" class="w-1/6 bg-red-500 mx-5 rounded text-red-300 px-4 py-2 my-5 cursor-pointer">Delete Post</button>
      </div>
<script>
    function deletePost(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Make an AJAX call to delete the post
                axios.delete('/admin/posts/' + id)
                    .then((response) => {
                        // Check if the deletion was successful
                        if (response.data.success) {
                            Swal.fire(
                                'Deleted!',
                                'Post deleted.',
                                'success'
                            ).then(() => {
                                // Redirect to the posts index page
                                window.location.href = '/admin/posts';
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'Failed to delete post.',
                                'error'
                            );
                        }
                    })
                    .catch((error) => {
                        Swal.fire(
                            'Error!',
                            'Failed to delete posts.',
                            'error'
                        );
                    });
            }
        });
    }
</script>

    </section>
@endsection
