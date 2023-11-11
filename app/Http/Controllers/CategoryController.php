<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.posts.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate(['category' => 'required|unique:categories']); // Validate the request data

    $blog = new Category(); 

    // Assuming you have a 'category' column in your 'blogs' table
    //$blog->category = $request->input('category');
     $blog->category = $request->category;

    // Save the blog entry to the database
    $blog->save();

    return redirect()->back()->with('success', 'Category added successfully');
}


    /**
     * Display the specified resource.
     */
// public function show(Category $category)
// {
//     // Use findOrFail on the $category model to retrieve the data
//     $category = Category::findOrFail($category->id);

//     return view('admin.posts.category.show', ['category' => $category]);
// }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
          // Use findOrFail on the $category model to retrieve the data
    $category = Category::findOrFail($category->id);

    return view('admin.posts.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(['category' => 'required|unique:categories']); // Validate the request data
          $category->update([
        'category' => $request->input('category'),
    ]);

    return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
           $category = Category::findOrFail($category->id);

           $category->delete();

  return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }
    // method for storing category in the database
    
}
