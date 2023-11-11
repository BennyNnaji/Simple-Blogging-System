@extends('layout.app')
@section('content')

    <section class="">
        <div class="grid grid-cols-3 gap-x-2 mx-auto w-10/12 justify-content-center m-2">
            <div class="  px-5 shadow-xl  grid justify-items-center py-10 ">
                <i class="fas fa-phone fa-2x text-red-700"></i>
                <p>{{ $pageData['phone'] }}</p>

            </div>

            <div class="  px-5 shadow-xl  grid justify-items-center py-10 ">
                <i class="fas fa-envelope fa-2x text-red-700"></i>
                <p>{{ $pageData['email'] }}</p>
            </div>

            <div class="  px-5 shadow-xl  grid justify-items-center py-10 ">
                <i class="fas fa-map-marker-alt fa-2x text-red-700"></i>
                 <p>{{ $pageData['address'] }}</p>
            </div>
        </div>
        <section class="md:flex my-3 py-5">
          <div class="w-5/6 md:w-3/6 shadow-xl mx-auto hidden md:block">
            <img src="{{ asset('storage/images/front/' .$pageImages['contact_img']) }}" alt="">
          </div>
            <div class="w-5/6 md:w-3/6 shadow-xl mx-auto">
                <h1 class="text-center text-3xl text-red-700 ">Contact Us</h1>
                <form action="" method="POST" class="text-center w-11/12 mx-auto md:text-left py-5" action="{{ route('sendMail') }}">
                    @csrf
                    <div class="md:flex md:mb-11">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block  tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Name
                            </label>
                            <input type="text" name="name" placeholder="Your Full Name" class="w-full" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block  tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Email
                            </label>
                            <input type="email" name="email" placeholder="Your Email Address" class="w-full" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="md:flex md:mb-11">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block  tracking-wide text-xs font-bold mb-2">
                                Subject
                            </label>
                            <input type="text" name="subject" placeholder="Subject" class="w-full" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block  tracking-wide text-xs font-bold mb-2">
                                Phone Number
                            </label>
                            <input type="tel" name="phone" placeholder="Phone " class="w-full" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>
                    
                    </div>
                        <div class="w-full px-3 h-[200px]">
                            <label class="block  tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Message
                            </label>
                            <textarea name="contact_message" placeholder="Your Message" class="w-full ">{{ old('contact_message')}}</textarea>
                            @error('contact_message')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>
                    <div class="md:flex">
                        <div class="w-full px-3">
                            <button class="bg-red-700 hover:bg-red-400 text-white font-bold py-3 px-6 rounded"
                                type="submit">Send Message</button>
                        </div>
                    </div>
                </form>




            </div>

        </section>
        <div class="shadow-xl" style="">
           <p style="width: 100% !important;">{!!$pageData['map'] !!}</p>
        </div>
    </section>
     @if (session('success'))
        <div>
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: '{{ session('success') }}'
                })
            </script>
        </div>
    @endif
@endsection
