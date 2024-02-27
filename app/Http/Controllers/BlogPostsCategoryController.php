<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostsCategory;
use App\Models\SummernoteContent;

class BlogPostsCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogPostsCategory::all();
        $summernoteContent = new SummernoteContent();
        return view('backend.blog_posts_category.index', ['categories' => $categories, 'summernoteContent' => $summernoteContent, 'page_title' => 'Blog Post Category']);
    }

    public function create()
    {

        $summernoteContent = new SummernoteContent();
        return view('backend.blog_posts_category.index', ['categories' => $categories, 'summernoteContent' => $summernoteContent, 'page_title' => 'Blog Post Category']);
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size as needed
        ]);

        try {
            $newImageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/blogpostcategory'), $newImageName);

            $summernoteContent = new SummernoteContent();
            $processedContent = $summernoteContent->processContent($request->content);

            $category = new BlogPostsCategory();
            $category->title = $request->title;
            $category->content = $processedContent;
            $category->image = $newImageName;

            if ($category->save()) {
                return redirect()->route('admin.blog-posts-categories.index')->with('success', 'Blog Post Category created successfully.');
            } else {
                return redirect()->back()->with('error', 'Error! Blog Post Category not created.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error! ' . $e->getMessage());
        }
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPostsCategory  $blogPostsCategory
     * @return \Illuminate\Http\Response
     */

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
