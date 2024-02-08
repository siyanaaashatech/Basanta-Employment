<?php

namespace App\Http\Controllers;

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
        return view('backend.post.index', compact('posts'));
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


        $imagePath = $request->file('image')->store('posts', 'public');

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->image = $imagePath;
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048', 
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('backend.post.update', compact('post', 'categories'));
    }
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }
}
