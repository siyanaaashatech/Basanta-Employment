<?php

namespace App\Http\Controllers;

use App\Models\BlogPostsCategory;
use Illuminate\Http\Request;

class BlogPostsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogPostsCategory::all();
        $page_title = "Blog Post Categories";
        return view('backend.blog_posts_category.index', compact('categories','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog_posts_category.create');
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
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size as needed
        ]);

        $category = new BlogPostsCategory();
        $category->title = $request->input('title');
        $category->content = $request->input('content');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/blog-posts-categories');
            $category->image = $imagePath;
        }

        $category->save();

        return redirect()->route('admin.blog-posts-categories.index')->with('success', 'Blog Post Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPostsCategory  $blogPostsCategory
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPostsCategory  $blogPostsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPostsCategory $blogPostsCategory)
    {
        return view('backend.blog_posts_category.update', compact('blogPostsCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPostsCategory  $blogPostsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPostsCategory $blogPostsCategory)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blogPostsCategory->title = $request->input('title');
        $blogPostsCategory->content = $request->input('content');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/blog-posts-categories');
            $blogPostsCategory->image = $imagePath;
        }

        $blogPostsCategory->save();

        return redirect()->route('admin.blog-posts-categories.index')->with('success', 'Blog Post Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPostsCategory  $blogPostsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPostsCategory $blogPostsCategory)
    {
        $blogPostsCategory->delete();
        return redirect()->route('admin.blog-posts-categories.index')->with('success', 'Blog Post Category deleted successfully.');
    }
}
