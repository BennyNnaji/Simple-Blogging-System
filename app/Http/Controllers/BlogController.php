<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $blogs = Blog::with('author')->paginate(8);
    $categories = Category::all();

      // Create an empty array to store comments for each blog post
    $comments = [];

    foreach ($blogs as $blog) {
        // Retrieve comments for each blog post
        $blogComments = Comment::where('post_id', $blog->id)->get();
        
        // Store the comments in the $comments array
        $comments[$blog->id] = $blogComments;
    }
return view('admin.posts.index'
, compact(['blogs','comments', 'categories']));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = Category::all();
        return view('admin.posts.create', ['blogs' => $blogs]);
     
    }
  
    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validate the request data, including the image upload
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'category' => 'required',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
        $fileName = time() . '.' . $request->img->extension();
        $request->img->storeAs('public/images', $fileName);

    // Automatically generate the slug based on the title
    $title = $request->input("title");
    $slug = Str::slug($title);
    //$slug = str_replace(' ', '-', strtolower($title));

    // Create a new Blog entry with the uploaded image path and auto-generated slug
    $blog = Blog::create([
        'title' => $title,
        'content' => $request->input("content"),
        'category' => $request->input("category"),
        'slug' => $slug,
        'user_id' => Auth::user()->id,
        'img' => $fileName,
    ]);

    // Redirect or return a success message
    return redirect()->route('admin.posts')->with('success', 'Blog post created successfully!');
}
    /**
     * Display the specified resource.
     */
 public function show($slug)
{
   
    // Retrieve the blog post based on the provided slug
    $blog = Blog::where('slug', $slug)->firstOrFail();
    // Category on the left sidebar
    $categories = Category::all();
    // Comments on a particular post
    $comments=Comment::with('user')->orderBy('created_at', 'desc')->where('post_id', $blog->id)->get();
    // Recent Posts on the right sidebar
     $blogs = Blog::orderBy('created_at', 'desc')->paginate(6);
    //Related Posts
$relatedBlogs = Blog::where('category', $blog->category)
    ->where('slug', '!=', $blog->slug)
    ->orderBy('created_at', 'desc')
    ->paginate(4);
    // Popular Posts
        $pop = Blog::select('blogs.*')
        ->join('comments', 'blogs.id', '=', 'comments.post_id')
        ->groupBy('blogs.id')
        ->orderByRaw('COUNT(comments.id) DESC')
        ->paginate(6);
 // Title of the pages
    $title = Blog::where('slug', $slug)->value('title');
            $aboutPage = Page::where('name', 'About Us')->first();
        $aboutPage = json_decode($aboutPage->data, true);
    // Pass the blog post to the view
    return view('show', [
        "title" => $title,
        // for the post (Pls observe the singular word, BLOG)
        'blog' => $blog,
        //        for Recent Posts on the right sidebar. (Pls observe the plural word BLOGS)
        'blogs' => $blogs,
        //        For categories on the left side bar
        'categories' => $categories,
        //      For   Related posts
        'relatedBlogs'=>$relatedBlogs,
        //       For comments on this specific post
        "comments"=>$comments,
        // for the popular post
        'pop' => $pop,
        'aboutPage'=>$aboutPage,
    ]);
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog, $id)
    {
         $blog = Blog::findOrFail($id);
         $categories =Category::all();
         return view('admin.posts.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Blog $blog)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'category' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('img')) {
        $fileName = time() . '.' . $request->img->extension();
        $request->img->storeAs('public/images', $fileName);
    } else {
        // Handle the case where no new image was uploaded, and you want to keep the existing image.
        $fileName = $blog->img; // Use the existing image file name
    }

    // Automatically generate the slug based on the title
    // $title = $request->input("title");
    // $slug = Str::slug($title);

    // Update Blog entry with the uploaded image path and auto-generated slug
 $blog->fill([
    'title' => $request->input("title"),
    'content' => $request->input("content"),
    'category' => $request->input("category"),
    'slug' => Str::slug($request->input("title")),
    'user_id' => Auth::user()->id,
    'img' => $fileName,
 ])->save();


// Redirect or return a success message
    return redirect()->route('admin.posts')->with('success', 'Blog post updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog, $id)
    {
        $blog = Blog::findOrFail($id);
                //Delete the image of the post
                $imagePath = 'public/images/' . $blog->img;
                Storage::delete($imagePath); 
        $blog->delete();
        return response()->json(['success' => true]);
        
        //return redirect()->route('admin.posts')->with('success', 'Blog post deleted successfully!');

}
}