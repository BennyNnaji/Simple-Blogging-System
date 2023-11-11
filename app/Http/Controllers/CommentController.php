<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {
       $request->validate(['comment'=>'required|max:550']);

     // Find the blog post by its slug
        $blog = Blog::where('slug', $slug)->firstOrFail();
       $comment =  Comment::create([
        'user_id'=>auth()->user()->id,
        'post_id'=>$blog->id,
        'comment'=>$request->comment
       ]);
        return redirect()->back()->with('success', 'Your thought has been shared, thanks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
