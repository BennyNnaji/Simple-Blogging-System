@extends('layout.app')
@section('content')
    <div class="md:flex justify-between gap-2">
        {{-- Center --}}
        <div class="md:w-6/12  order-2">
            {{-- Posts --}}
            <h2 class="text-2xl text-red-700 text-center"> 
            @if ( count($blogs)>0)
                @if (count($blogs)==1)
                    There are     {{ count($blogs) }} Post  in the <strong>{{ $title }}</strong> category
                @else
                    There are     {{ count($blogs) }} Posts  in the <strong>{{ $title }}</strong> category
                @endif
            
                
            @endif</h2>
          @include('partials.center')
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
