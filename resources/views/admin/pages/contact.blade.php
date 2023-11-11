@extends('admin.layout.app')
@section('content')
    <div class="w-4/5 md:w-3/6 mx-auto overflow-hidden py-6">
        <form action="{{ route('admin.contact.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <label for="" class="block"> Contact Us </label>
            <input type="text" class="block w-4/5 p-3 m-2 rounded" name="name" value="Contact Us" readonly>
            @error('name')
                <div class="text-red-700">{{ $message }}</div>
            @enderror --}}

            <label for="phone" class="block"> Phone </label>
            <input type="number" name="phone" id="phone" class="block w-4/5 p-3 m-2 rounded"
                placeholder="Phone Number" value="{{ $pageData['phone'] }}">

            <label for="email" class="block"> Email </label>
            <input type="email" name="email" id="email" class="block w-4/5 p-3 m-2 rounded"
                placeholder="Email Address" value="{{ $pageData['email'] }}">

            <label for="address" class="block"> Address </label>
            <input type="text" name="address" id="address" class="block w-4/5 p-3 m-2 rounded" placeholder="Address" value="{{ $pageData['address'] }}">

            <label for="map" class="block"> Map </label>
            <input type="text" name="map" id="map" class="block w-4/5 p-3 m-2 rounded"
                placeholder="Google Map <iframe> tag" value="{{ $pageData['map'] }}">

            <label for="contact_img" class="block"> Contact Image </label>
                   <input type="file" name="contact_img" class="block w-2/5 m-2" id="contact_img" onchange="contactPreview(event)">
         <div class="w-1/6" id="contact_img"><img id="contact_img_preview" src="{{ asset('storage/images/front/' .$pageImages['contact_img']) }}" alt=""></div>
                @error('contact_img')
            <div class="text-red-700">{{ $message }}</div>
        @enderror


            <button type="submit" class="bg-red-700 hover:bg-red-400 px-6 py-3 rounded text-red-200 my-5">Save Changes</button>
        </form>
    </div>
    <script>
         function contactPreview(event) {
      var contact_img = document.getElementById('contact_img');
      var contact_img_preview = document.getElementById('contact_img_preview');

      // Display the selected image as a preview
      var file = contact_img.files[0];
      var reader = new FileReader();

      reader.onload = function (event) {
            contact_img_preview.src = event.target.result;
            contact_img_preview.style.display = 'block';
      };

      reader.readAsDataURL(file);
}
    </script>
@endsection
