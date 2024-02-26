<?php

namespace App\Http\Controllers;
use App\Models\SummernoteContent;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $posts = Post::all();
    $summernoteContent = new SummernoteContent();
    $post = $summernoteContent;
    return view('backend.post.index', compact('posts', 'summernoteContent'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('backend.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:2048', 
        'category_id' => 'required|exists:categories,id'
    ]);


    // Move the uploaded image to the desired directory
    $imageName = $request->image->getClientOriginalName();
    $imageDestinationPath = $request->image->move(public_path('uploads/post'), $imageName);


    $summernoteContent = new SummernoteContent();
    $processedDescription = $summernoteContent->processContent($request->description);

    // Create a new Post instance and save it to the database
    $post = new Post();
    $post->title = $request->input('title');
    $post->description = $processedDescription;
    $post->image = $imageName; // Store only the filename in the database
    $post->category_id = $request->input('category_id');
    $post->save();

    

    // Redirect back to the index page with a success message
    return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
}

public function edit(Post $post)
{
    $categories = Category::all();
    return view('backend.post.update', compact('post', 'categories'));
}


public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'image|max:2048',
        'category_id' => 'required|exists:categories,id'
    ]);

    // Check if a new image has been uploaded
    if ($request->hasFile('image')) {
        // Move the uploaded image to the desired directory
        $imageName = $request->image->getClientOriginalName();
        $imagePath = $request->image->move(public_path('uploads/post'), $imageName);
    }
        
        // Update the image attribute of the post with the new image path
      
        $post = new Post();
        $post->image = $imageName;
      
        $post->title = $request->input('title');
        $post->description = $request->input('description');
     
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }
   


   
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }
}
