<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Contracts\Mail\ContactMail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $blogs = Blog::with('author')->orderBy('created_at', 'desc')->paginate(8);
    $categories = Category::all();
    $title = "Home";
    $pop = Blog::select('blogs.*')
        ->join('comments', 'blogs.id', '=', 'comments.post_id')
        ->groupBy('blogs.id')
        ->orderByRaw('COUNT(comments.id) DESC')
        ->get();
    $aboutPage = Page::where('name', 'About Us')->first();
    $aboutPage = json_decode($aboutPage->data, true);

    // Create an empty array to store comments for each blog post
    $comments = [];

    foreach ($blogs as $blog) {
        // Retrieve comments for each blog post
        $blogComments = Comment::where('post_id', $blog->id)->get();
        
        // Store the comments in the $comments array
        $comments[$blog->id] = $blogComments;
    }

    return view('index', [
        'blogs' => $blogs,
        'categories' => $categories,
        'comments' => $comments, // Pass the comments array to the view
        'pop' => $pop,
        'title'=>$title,
        'aboutPage'=> $aboutPage
    ]);
}

    public function category($category){
    $cate = Category::where('category', $category)->get();
    $blogs = Blog::where('category', $category)->with('author')->orderBy('created_at', 'desc')->paginate(8);
    $categories = Category::all();
    $title = Category::where('category', $category)->value('category');
    $pop = Blog::select('blogs.*')
        ->join('comments', 'blogs.id', '=', 'comments.post_id')
        ->groupBy('blogs.id')
        ->orderByRaw('COUNT(comments.id) DESC')
        ->get();
        $aboutPage = Page::where('name', 'About Us')->first();
        $aboutPage = json_decode($aboutPage->data, true);

    // Create an empty array to store comments for each blog post
    $comments = [];

    foreach ($blogs as $blog) {
        // Retrieve comments for each blog post
        $blogComments = Comment::where('post_id', $blog->id)->get();
        
        // Store the comments in the $comments array
        $comments[$blog->id] = $blogComments;
    }

        return view('category', compact('cate','blogs', 'categories', 'title', 'pop', 'comments', 'aboutPage'));
    }
    /**
     * The search.
     */
public function search(Request $request)
{
    $search = $request->input('search');
    $searchs = Blog::where('title', 'like', "%$search%")
        ->orWhere('content', 'like', "%$search%")
        ->get();
    $blogs = Blog::with('author')->orderBy('created_at', 'desc')->paginate(8);
    $categories = Category::all();
    $title = "Search for " .$search;
    $pop = Blog::select('blogs.*')
        ->join('comments', 'blogs.id', '=', 'comments.post_id')
        ->groupBy('blogs.id')
        ->orderByRaw('COUNT(comments.id) DESC')
        ->get();
        $aboutPage = Page::where('name', 'About Us')->first();
        $aboutPage = json_decode($aboutPage->data, true);

    // Create an empty array to store comments for each blog post
    $comments = [];

    foreach ($blogs as $blog) {
        // Retrieve comments for each blog post
        $blogComments = Comment::where('post_id', $blog->id)->get();
        
        // Store the comments in the $comments array
        $comments[$blog->id] = $blogComments;
    }
    return view('search', compact('searchs','blogs', 'categories','title', 'pop', 'comments', 'aboutPage' ));
}

    /**
     * Store a newly created resource in storage.
     */
    // About us page
    public function about(){
    $page = Page::where('name', 'About Us')->first();
    
    if (!$page) {
        // Handle the case where the page with ID 1 doesn't exist
        abort(404);
    }
        // Decode the JSON data
    $aboutPage = json_decode($page->data, true);
    $pageImages = json_decode($page->images, true);

     $title = "About Us";

    // Pass the data to the view
    return view('about', compact('title', 'aboutPage', 'pageImages'));
    }

    public function contact(){
        $page = Page::where('name', 'Contact Us')->first();
        $aboutPage = Page::where('name', 'About Us')->first();

        // Decode the JSON data
     
        $pageData = json_decode($page->data, true);
        $aboutPage = json_decode($aboutPage->data, true);
        $pageImages = json_decode($page->images, true);
        

        $title = 'Contact Us';
       return view("contact", compact('title', 'pageData', 'pageImages', 'aboutPage'));
    }

    public function sendMail(Request $request){
       $data = $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'subject' => 'required',
            'phone' => 'required',
            'contact_message' => 'required'
        ]);
     
        Mail::send('mail.contactmail', $data, function ($msg) {
            $msg->from('from@johndoe.com', 'From Doe');
            $msg->to('to@johndoe.com', 'To Doe');
            $msg->replyTo('replyTo@johndoe.com', 'Reply Doe');
            $msg->subject('New Contact Email');
        });


        return redirect()->back()->with('success', 'Message sent!');
    }


        public function terms(){
        $pages = Page::where('name', 'Terms and Conditions')->first();

        // Decode the JSON data
        $pageData = json_decode($pages->data, true);
        $aboutPage = Page::where('name', 'About Us')->first();
        $aboutPage = json_decode($aboutPage->data, true);
    

        $title = 'Terms and Conditions';
       return view("terms", compact('title', 'pageData', 'pages', 'aboutPage'));
    }

    public function privacy()
    {
        $pages = Page::where('name', 'Privacy Policy')->first();
        $aboutPage = Page::where('name', 'About Us')->first();
        $aboutPage = json_decode($aboutPage->data, true);

        // Decode the JSON data
        $pageData = json_decode($pages->data, true);


        $title = 'Privacy Policy';
        return view("privacy", compact('title', 'pageData', 'pages', 'aboutPage'));
    }

}
