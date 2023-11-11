@extends('admin.layout.app')
@section('content')
    <div class="w-4/5 md:w-4/6 mx-auto overflow-hidden py-6">
        <form action="{{ route('admin.terms.update') }}" method="post">
            @csrf

            {{-- <label for="" class="block"> Terms and Conditions </label>
            <input type="text" class="block w-4/5 p-3 m-2 rounded" name="name" value="Terms and Conditions" readonly>
            @error('name')
                <div class="text-red-700">{{ $message }}</div>
            @enderror --}}

            <label class="block  tracking-wide text-gray-700 text-xs font-bold mb-2">
                Terms
            </label>
            <textarea name="terms" class=" h-screen block w-4/5 p-3 m-2 rounded">{{ $pageData['terms'] }}</textarea>
            @error('terms')
                <div class="text-red-700">{{ $message }}</div>
            @enderror
            <button class="bg-red-700 hover:bg-red-400 text-white font-bold py-3 px-6 rounded"
                type="submit">Submit</button>


        </form>
    </div>
   
@endsection
