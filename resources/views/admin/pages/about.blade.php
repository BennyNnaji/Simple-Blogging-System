@extends('admin.layout.app')
@section('content')
@if ($errors->any())
    @foreach ($errors->all as $error)
         <div class="text-red-700">{{ $error }}</div>
    @endforeach
    
@endif
    <form action="{{ route('admin.about.update') }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        {{-- <label for="" class="block"> About </label>
        <input type="text" class="block w-2/5 p-3 m-2 rounded" name="name" value="About Us" readonly>
        @error('name')
            <div class="text-red-700">{{ $message }}</div>
        @enderror --}}

        <label for="" class="block"> About Text</label>
           <textarea class="block w-2/5 h-40  m-2 rounded" name="about_text"  id="about_text">{{ $pageData['about_text'] }}</textarea>
        @error('about_text')
            <div class="text-red-700">{{ $message }}</div>
        @enderror

        <label for="" class="block ">Our Value</label>
         <textarea class="block w-2/5 h-32  m-2 rounded" name="value_text"  id="value_text">{{ $pageData['value_text'] }}</textarea>
                @error('value_text')
            <div class="text-red-700">{{ $message }}</div>
        @enderror

        <label for="" class="block">Our Mission</label>
       <textarea class="block w-2/5 h-32  m-2 rounded" name="mission_text"  id="mission_text">{{ $pageData['mission_text'] }}</textarea>
                @error('mission_text')
            <div class="text-red-700">{{ $message }}</div>
        @enderror

        <label for="" class="block">Our Vision</label>
        <textarea class="block w-2/5 h-32  m-2 rounded" name="vision_text"  id="vision_text">{{ $pageData['vision_text'] }}</textarea>
                @error('vision_text')
            <div class="text-red-700">{{ $message }}</div>
        @enderror

        <label for="" class="block">About Us Banner</label>
        <input type="file" name="about_img" class="block w-2/5 m-2" id="about_img" onchange="aboutPreview(event)">
            <div class="w-1/12" ><img id="about_img_preview" src="{{ asset('storage/images/front/' .$pageImages['about_img']) }}" alt=""></div>
                @error('about_img')
            <div class="text-red-700">{{ $message }}</div>
        @enderror

<label for="" class="block">Our Value Banner</label>
        <input type="file" name="value_img" class="block w-2/5 m-2" id="value_img" onchange="valuePreview(event)">
         <div class="w-1/12" id="about_img"><img id="value_img_preview" src="{{ asset('storage/images/front/' .$pageImages['value_img']) }}" alt=""></div>
                @error('value_img')
            <div class="text-red-700">{{ $message }}</div>
        @enderror

        <label for="" class="block">Our Vision Banner</label>
        <input type="file" name="vision_img" class="block w-2/5 m-2" id="vision_img" onchange="visionPreview(event)">
         <div class="w-1/12" id="about_img"><img id="vision_img_preview" src="{{ asset('storage/images/front/' .$pageImages['vision_img']) }}" alt=""></div>
                @error('vision_img')
            <div class="text-red-700">{{ $message }}</div>
        @enderror
<label for="" class="block">Our Mission Banner</label>
        <input type="file" name="mission_img" class="block w-2/5 m-2" id="mission_img" onchange="missionPreview(event)">
         <div class="w-1/12" id="mission_img"><img id="mission_img_preview" src="{{ asset('storage/images/front/' .$pageImages['mission_img']) }}" alt=""></div>
                @error('mission_img')
            <div class="text-red-700">{{ $message }}</div>
        @enderror

        <button type="submit" class="px-6 py-3 rounded m-5 bg-red-700 text-red-200"> Save Changes</button>
    </form>
    <script>
    function aboutPreview(event) {
      var about_img = document.getElementById('about_img');
      var about_img_preview = document.getElementById('about_img_preview');

      // Display the selected image as a preview
      var file = about_img.files[0];
      var reader = new FileReader();

      reader.onload = function (event) {
            about_img_preview.src = event.target.result;
            about_img_preview.style.display = 'block';
      };

      reader.readAsDataURL(file);
}

function valuePreview(event) {
      var value_img = document.getElementById('value_img');
      var value_img_preview = document.getElementById('value_img_preview');

      // Display the selected image as a preview
      var file = value_img.files[0];
      var reader = new FileReader();

      reader.onload = function (event) {
            value_img_preview.src = event.target.result;
            value_img_preview.style.display = 'block';
      };

      reader.readAsDataURL(file);
}

 function missionPreview(event) {
        var mission_img = document.getElementById('mission_img');
        var mission_img_preview = document.getElementById('mission_img_preview');

        // Display the selected image as a preview
        var file = mission_img.files[0];
        var reader = new FileReader();

        reader.onload = function(event) {
            mission_img_preview.src = event.target.result;
            mission_img_preview.style.display = 'block';
        };

        reader.readAsDataURL(file);
}

  function visionPreview(event) {
        var vision_img = document.getElementById('vision_img');
        var vision_img_preview = document.getElementById('vision_img_preview');

        // Display the selected image as a preview
        var file = vision_img.files[0];
        var reader = new FileReader();

        reader.onload = function(event) {
            vision_img_preview.src = event.target.result;
            vision_img_preview.style.display = 'block';
        };

        reader.readAsDataURL(file);
}
    </script>
@endsection