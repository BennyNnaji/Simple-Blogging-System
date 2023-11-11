 <div class="bg-white my-2">

     <div class="bg-red-700 p-3 font-semibold text-gray-100">Categories</div>
     <div class="mx-4">
         <ul>
             @if (count($categories) > 0)
                 @foreach ($categories as $category)
                     <li><a href="{{ route('front-cate',$category->category) }}">{{ $category->category }}</a></li>
                 @endforeach
             @else
                 <p class="text-red-700 md:text-sm">No Category Found</p>
             @endif
         </ul>
     </div>
 </div>
 <div class="bg-white">

     <div class="bg-red-700 p-3 font-semibold text-gray-100">Archaive</div>
     <div class="mx-4">
         <ul>
             <li><a href="">Politics</a></li>
             <li><a href="">Fashion</a></li>
             <li><a href="">Music</a></li>
             <li><a href="">Entertainment</a></li>
             <li><a href="">Religion</a></li>
             <li><a href="">Business</a></li>

         </ul>
     </div>
 </div>
