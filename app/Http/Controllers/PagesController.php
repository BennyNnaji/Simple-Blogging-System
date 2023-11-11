<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
  
public function about_edit(Page $page)
{

    // Fetch the 'About Us' page
    $aboutPage = Page::where('name', 'About Us')->first();

    if ($aboutPage) {
        // Decode the JSON data
        $pageData = json_decode($aboutPage->data, true);
        $pageImages = json_decode($aboutPage->images, true);

        // You might need to pass these variables to the view
        return view('admin.pages.about', compact('pageImages', 'pageData'));
    } else {
        // Handle a case where the 'About Us' page is not found
       abort(404);
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function about_update(Request $request, Page $page)
{
        $page = Page::where('name', 'About Us')->first();
    if (!$page) {
        return abort(404); // Or handle the case where the page is not found
    }
    // Validate the request data
    $request->validate([
        'name' => 'string|max:255',
        'about_text' => 'required|string',
        'value_text' => 'required|string|max:200',
        'mission_text' => 'required|string|max:200',
        'vision_text' => 'required|string|max:200',
        'about_img' => 'image|mimes:jpeg,png,jpg,gif',
        'value_img' => 'image|mimes:jpeg,png,jpg,gif',
        'mission_img' => 'image|mimes:jpeg,png,jpg,gif',
        'vision_img' => 'image|mimes:jpeg,png,jpg,gif',
    ]);

    // Prepare the data for the page
    $pageData = [
        'about_text' => $request->input('about_text'),
        'value_text' => $request->input('value_text'),
        'mission_text' => $request->input('mission_text'),
        'vision_text' => $request->input('vision_text'),
    ];

    // Prepare the image file names
    $pageImages = [];
    $pageImages = json_decode($page->images, true);
    // Handle the 'about_img' file
    if ($request->hasFile('about_img')) {
        $about_img = 'about_img.' . $request->about_img->extension();
        $request->about_img->storeAs('public/images/front', $about_img);
        $pageImages['about_img'] = $about_img;
    }else {
    // If no new 'about_img' uploaded, retain the existing one if it exists
    if (isset($pageImages['about_img'])) {
        $pageImages['about_img'] = $pageImages['about_img'];
    }
}

    // Handle the 'value_img' file
    if ($request->hasFile('value_img')) {
        $value_img = 'value_img.' . $request->value_img->extension();
        $request->value_img->storeAs('public/images/front', $value_img);
        $pageImages['value_img'] = $value_img;
    }else {
    // If no new 'value_img' uploaded, retain the existing one if it exists
    if (isset($pageImages['value_img'])) {
        $pageImages['value_img'] = $pageImages['value_img'];
    }
}

    // Handle the 'mission_img' file
    if ($request->hasFile('mission_img')) {
        $mission_img = 'mission_img.' . $request->mission_img->extension();
        $request->mission_img->storeAs('public/images/front', $mission_img);
        $pageImages['mission_img'] = $mission_img;
    }else {
    // If no new 'mission_img' uploaded, retain the existing one if it exists
    if (isset($pageImages['mission_img'])) {
        $pageImages['mission_img'] = $pageImages['mission_img'];
    }
}

    // Handle the 'vision_img' file
    if ($request->hasFile('vision_img')) {
        $vision_img = 'vision_img.' . $request->vision_img->extension();
        $request->vision_img->storeAs('public/images/front', $vision_img);
        $pageImages['vision_img'] = $vision_img;
    }else {
    // If no new 'vision_img' uploaded, retain the existing one if it exists
    if (isset($pageImages['vision_img'])) {
        $pageImages['vision_img'] = $pageImages['vision_img'];
    }
}

    // Update the page
$page->fill([
    'name' => $request->input('name', 'About Us'),
    'data' => json_encode($pageData),
    'images' => json_encode($pageImages),
])->save();

    return redirect()->route('admin.dashboard')->with('success', 'Page updated successfully');
}


    public function contact_edit(Page $page)
    {

        // Fetch the 'Contact Us' page
        $aboutPage = Page::where('name', 'Contact Us')->first();

        if ($aboutPage) {
            // Decode the JSON data
            $pageData = json_decode($aboutPage->data, true);
            $pageImages = json_decode($aboutPage->images, true);

            // You might need to pass these variables to the view
            return view('admin.pages.contact', compact('pageImages', 'pageData'));
        } else {
            // Handle a case where the 'About Us' page is not found
            return abort(404); // Or any other error handling mechanism
        }
    }

    public function contact_update(Request $request, Page $page)
{
        $page = Page::where('name', 'Contact Us')->first();
    if (!$page) {
        return abort(404); // Or handle the case where the page is not found
    }
        // Validate the request data
        $request->validate([
            'name' => 'string|max:255',
            'phone' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'map' => 'required|string',
            'contact_img' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $pageData = [
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'map' => $request->input('map'),
        ];
          // Prepare the image file names
    $pageImages = [];
    $pageImages = json_decode($page->images, true);
    // Handle the 'about_img' file
    if ($request->hasFile('contact_img')) {
            $contact_img = 'contact_img.' . $request->contact_img->extension();
        $request->contact_img->storeAs('public/images/front', $contact_img);
        $pageImages['contact_img'] = $contact_img;
    }else {
    // If no new 'about_img' uploaded, retain the existing one if it exists
    if (isset($pageImages['contact_img'])) {
        $pageImages['contact_img'] = $pageImages['contact_img'];
    }
}
        // Update the page
        $page->fill([
            'name' => $request->input('name', 'Contact Us'),
            'data' => json_encode($pageData),
            'images' => json_encode($pageImages),
        ])->save();

        return redirect()->route('admin.dashboard')->with('success', 'Page updated successfully');

    }
    public function terms_edit(){
        $pages = Page::where('name', 'Terms and Conditions')->first();

        if (!$pages) {
            return abort(404);
        }
        $pageData = json_decode($pages->data, true);
        return view('admin.pages.terms', compact('pageData'));
    }

    public function terms_update(Request $request){
        $pages = Page::where('name', 'Terms and Conditions')->first();

        if (!$pages) {
            return abort(404); 
        }

        $request->validate([
           // 'name' => 'required',
            'terms' => 'required',
        ]);
        $pageData = [
            'terms' => $request->input('terms'),
        ];
        $pages->fill([
            'name' => $request->input('name', 'Terms and Conditions'),
            'data' => json_encode($pageData),
        ])->save();

        return redirect()->route('admin.dashboard')->with('success', 'Page updated successfully');

    }

    public function privacy_edit()
    {
        $pages = Page::where('name', 'Privacy Policy')->first();

        if (!$pages) {
            return abort(404);
        }
        $pageData = json_decode($pages->data, true);
        return view('admin.pages.privacy', compact('pageData'));
    }

    public function privacy_update(Request $request)
    {
        $pages = Page::where('name', 'Privacy Policy')->first();

        if (!$pages) {
            return abort(404);
        }

        $request->validate([
            //'name' => 'required',
            'privacy' => 'required',
        ]);
        $pageData = [
            'privacy' => $request->input('privacy'),
        ];
        $pages->fill([
            'name' => $request->input('name', 'Privacy Policy'),
            'data' => json_encode($pageData),
        ])->save();

        return redirect()->route('admin.dashboard')->with('success', 'Page updated successfully');
    }

}
