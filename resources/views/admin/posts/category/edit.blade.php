@extends('admin.layout.app')
@section('content')
    <section>
        <button class="bg-green-700 text-green-300 rounded border px-4 py-2"><a href="{{ route('admin.categories') }}">View
                Categories</a></button>
        <div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('admin.categories.update', $category->id) }}" method="post"
                class="elevation-4 w-10/12 p-5 m-3">
                @csrf
                @method('PUT')
                <input type="text" name="category" id="category"
                    value="{{ old('category', $category->category) }}"placeholder="Enter the name of the category"
                    class="form-input w-3/6 focus:border-stone-500">
                <input type="submit" value="Update Category"
                    class="bg-zinc-700 text-zinc-300 rounded border px-5 cursor-pointer py-2">
            </form>
        </div>
    </section>
@endsection
