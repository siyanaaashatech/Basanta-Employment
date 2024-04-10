<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Team;
use App\Models\About;
// use App\Models\Service;

use App\Models\Course;
use App\Models\Demand;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Service;
use App\Models\Category;
use App\Models\CoverImage;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Models\BlogPostsCategory;

class FrontViewController extends Controller
{
    public function index()
    {
        $sitesetting = SiteSetting::first();
        $about= About::first();
        $services = Service::latest()->get()->take(6);
        $contacts = Contact::latest()->get();
        $blogs = BlogPostsCategory::latest()->get()->take(3);
        // $courses = Course::latest()->get()->take(6);
        $testimonials = Testimonial::latest()->get()->take(10);
        $coverImages = CoverImage::all();
        $demands = Demand::latest()->get()->take(12);

        // $countries = Country::latest()->get()->take(10);

   // Fetch the first category
   $firstCategory = Category::first();

   // Fetch posts related to the first category
   $posts = $firstCategory->posts()->latest()->take(6)->get();
        // $enrollPost = $countryUniversityCategory->posts()->orderBy('id', 'desc')->skip(1)->first();





        return view('frontend.index', compact([
            'services',
            'contacts',
            'blogs',
            'sitesetting',
            // 'courses',
            'testimonials',
            'coverImages',
            'demands',
            'about',
            'posts',
            'firstCategory'

            // 'countries',
            // 'sliderPost',
            // 'enrollPost'
        ]));
    }
    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('id', '!=', $post->id)->get();

        return view('frontend.posts', compact('post', 'relatedPosts'));
    }


    // public function about()
    // {
    //     $serviceList = Service::latest()->get()->take(6);
    //     $categories = Category::all();
    //     $services = Service::latest()->get();
    //     $sitesetting = SiteSetting::first();
    //     $about = About::first();
    //     $images = PhotoGallery::latest()->get();

    //     return view('frontend.aboutus', compact('serviceList', 'categories', 'sitesetting', 'about', 'services', 'images'));
    // }
}
