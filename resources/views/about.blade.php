@extends('layout.app')
@section('content')
    <h2 class="bg-red-700 p-3 font-semibold text-gray-100">About Us</h2>

    <section class="md:flex px-2">

        <div class="md:w-3/6 px-1">
            <img src="{{ asset('storage/images/front/' .$pageImages['about_img']) }}" alt="" class="md:hidden">
               <p class="text-justify first-letter:text-6xl">{!! $aboutPage['about_text'] !!}</p>
        </div>
        <div class="md:w-3/6 px-1">
            <img src="{{ asset('storage/images/front/' .$pageImages['about_img']) }}" alt=""
                class="hidden md:block">
            <div class="md:grid grid-cols-3 gap-3">
                <div>
                    <div class="rounded-full border-8 border-red-700 h-36 w-36 mx-auto m-2">
                        <img src="{{ asset('storage/images/front/' .$pageImages['value_img']) }}"
                            class="rounded-full h-32 w-32 " alt="">
                    </div>
                    <h2 class="bg-red-700 p-2 text-gray-100 text-center">Our Value</h2>
                    <p class="text-justify">{!! $aboutPage['value_text']!!}</p>
                </div>
                <div>
                    <div class="rounded-full border-8  border-red-700 h-36 w-36 mx-auto m-2">
                        <img src="{{ asset('storage/images/front/' .$pageImages['mission_img']) }}"
                            class="rounded-full h-32 w-32 " alt="">
                    </div>
                    <h2 class="bg-red-700 p-2 text-gray-100 text-center">Our Mission</h2>
                    <p class="text-justify">{!! $aboutPage['mission_text']!!}</p>
                     
                </div>
                <div>
                    <div class="rounded-full border-8 border-red-700 h-36 w-36 mx-auto m-2">
                        <img src="{{ asset('storage/images/front/' .$pageImages['vision_img']) }}"
                            class="rounded-full h-32 w-32 " alt="">
                    </div>
                    <h2 class="bg-red-700 p-2 text-gray-100 text-center">Our Vision</h2>
                    <p class="text-justify">{!! $aboutPage['value_text'] !!}.</p>
                </div>


            </div>
        </div>


    </section>
@endsection
