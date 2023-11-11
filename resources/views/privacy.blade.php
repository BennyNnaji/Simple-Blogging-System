@extends('layout.app')
@section('content')
    <section class="w-11/12 mx-auto leading-9 tracking-5 text-justify">
        <h1 class="text-center text-2xl text-red-700">Privacy Policy</h1>
        <small class="text-xs italic text-gray-700">Last Updated: {{ $pages->updated_at->format('l, d F, Y - h:m a') }} </small>
        <p>{!! $pageData['privacy'] !!}</p>

    </section>
@endsection