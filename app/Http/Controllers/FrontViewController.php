<?php

namespace App\Http\Controllers;

use App\Models\BlogPostsCategory;
use App\Models\Course;
use App\Models\Post;
// use App\Models\Service;

use App\Models\Team;
use App\Models\About;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Service;
use App\Models\Category;
use App\Models\SiteSetting;
use App\Models\PhotoGallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontViewController extends Controller
{
    public function index()
    {
        $sitesetting = SiteSetting::first();
        $services = Service::latest()->get();
        $contacts = Contact::latest()->get();
        $blogs = BlogPostsCategory::latest()->get()->take(3);
        $courses = Course::latest()->get()->take(6);
        $testimonials = Testimonial::latest()->get()->take(10);

        $countries = Country::latest()->get()->take(10);


        $lastCategory = Category::find('5');
        $categoryId = $lastCategory->id;
        $countryUniversityCategory = Category::findOrFail($categoryId);
        $sliderPost = $countryUniversityCategory->posts()->latest()->first();
        $enrollPost = $countryUniversityCategory->posts()->orderBy('id', 'desc')->skip(1)->first();





        return view('frontend.index', compact([
            'services',
            'contacts',
            'blogs',
            'courses',
            'testimonials',
            'countries',
            'sliderPost',
            'enrollPost'
        ]));
    }
    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('id', '!=', $post->id)->get();

        return view('frontend.posts', compact('post', 'relatedPosts'));
    }


    public function about()
    {
        $serviceList = Service::latest()->get()->take(6);
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $images = PhotoGallery::latest()->get();

        return view('frontend.aboutus', compact('serviceList', 'categories', 'sitesetting', 'about', 'services', 'images'));
    }
}
