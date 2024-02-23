<?php

namespace App\Http\Controllers;

use App\Models\BlogPostsCategory;
use Illuminate\Http\Request;

class BlogPostsCategoryController extends Controller
{

    public function index()
    {
        $categories = BlogPostsCategory::all();
        return view('backend.blog_posts_category.index', ['categories' => $categories, 'page_title' => 'Blog Post Category']);
    }


    public function create()
    {
        return view('backend.blog_posts_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size as needed
        ]);
        try {
            $newImageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/blogpostcategory'), $newImageName);

            $category = new BlogPostsCategory();
            $category->title = $request->title;
            $category->content = $request->content;
            $category->image = $newImageName;

            if ($category->save()) {
                return redirect()->route('admin.blog-posts-categories.index')->with('success', 'Blog Post Category created successfully.');
            } else {
                return redirect()->back()->with('error', 'Error! Blog Post Category not created.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error! Something went wrong.');
        }
    }

    public function edit($id)
    {
        $category = BlogPostsCategory::find($id);
        return view('backend.blog_posts_category.update', compact('category'));
    }


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


    public function destroy(BlogPostsCategory $blogPostsCategory)
    {
        $blogPostsCategory->delete();
        return redirect()->route('admin.blog-posts-categories.index')->with('success', 'Blog Post Category deleted successfully.');
    }
}
