<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Course;
use App\Models\Country;
use App\Models\Service;
use App\Models\Category;
use App\Models\University;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\BlogPostsCategory;
use App\Models\DirectorMessage;

class SingleController extends Controller
{


    public function render_about()
    {
        // $page_title = "About Us";
        $categories = Category::latest()->get()->take(10);
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('category')->latest()->get()->take(3);
        $images = PhotoGallery::latest()->get();
        $listservices = Service::latest()->get()->take(5);
        $message = DirectorMessage::first();

        return view('frontend.aboutus', compact('categories', 'sitesetting', 'about', 'teams', 'services', 'posts', 'images', 'listservices', 'message'));

    }



    public function render_team(Request $request)
    {
        $teams = Team::all();
        $page_title = 'Our Team';
        $services = Service::latest()->get()->take(6);
        $sitesetting = SiteSetting::first();
        $categories = Category::latest()->get()->take(10);
        $about = About::first();
        $posts = Post::with('category')->latest()->get()->take(3);

        return view('frontend.team', compact('teams', 'sitesetting', 'categories', 'about', 'page_title', 'services', 'posts'));

    }



    public function render_service()
    {
        $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $serviceHead = Service::latest()->get()->take(1);

        return view('frontend.services', compact('images', 'services', 'categories', 'sitesetting', 'about', 'serviceHead'));
    }

    public function render_testimonial()
    {
        $testimonials = Testimonial::all();

        return view('frontend.testimonials', compact('testimonials'));
    }



    public function render_blogpostcategory()
    {
        $blogpostcategories = BlogPostsCategory::all();

        return view('frontend.blogpostcategories', compact('blogpostcategories'));
    }

    public function render_singleBlogpostcategory($slug)
    {
        
        $blogpostcategory = BlogPostsCategory::where('slug', $slug)->firstOrFail();
        $listblogs = BlogPostsCategory::where('slug', '!=', $slug)->latest()->get()->take(5);

        return view('frontend.blogpostcategory', compact('blogpostcategory', 'listblogs'));
    }

    public function render_singleService($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $listservices = Service::where('slug', '!=', $slug)->get();

        return view('frontend.service', compact('service', 'images', 'services', 'categories', 'sitesetting', 'about', 'listservices'));
    }

    public function render_Countries()
    {
        $countries = Country::all();

        return view('frontend.countries', compact('countries'));
    }
    public function render_singleCountry($slug)
    {
        $country = Country::where('slug', $slug)->firstOrFail();
        $recommendedCountries = Country::where('slug', '!=', $slug)->get();
        // $countries = Country::all();

        return view('frontend.single', compact('country', 'recommendedCountries'));
    }

    public function render_singleUniversity($slug)
    {
        $university = University::where('slug', $slug)->firstOrFail();
        return view('frontend.university', compact('university'));
    }

    public function render_singleCourse($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $listcourse = Course::latest()->get()->take(4);
        return view('frontend.course', compact('course', 'listcourse'));
    }



    public function render_singleCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $relatedCategories = Category::where('id', '!=', $category->id)->get();
        $posts = $category->posts()->paginate(10);
        return view('frontend.category', compact('category', 'relatedCategories', 'posts'));
    }

    public function render_singlePost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        // Get the category associated with the post
        $category = $post->category;

        // Get all posts related to the same category
        $relatedPosts = $category->posts()->where('id', '!=', $post->id)->get();
        return view('frontend.post', compact('post', 'relatedPosts'));
    }


    public function render_gallery()
    {
        $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('frontend.galleries', compact('images', 'services', 'categories', 'sitesetting', 'about'));
    }

    public function render_singleImage($slug)
    {
        $image = PhotoGallery::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('frontend.singleImage', compact('image', 'services', 'categories', 'sitesetting', 'about'));

    }


    public function render_videos()
    {
        $videos = VideoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('frontend.video', compact('videos', 'services', 'categories', 'sitesetting', 'about'));
    }

    public function teams()
    {
        $teams = Team::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('portal.team', compact('teams', 'services', 'categories', 'sitesetting', 'about'));
    }

    public function render_contact()
    {
        $page_title = 'Contact Us';
        $googleMapsLink = SiteSetting::first()->google_maps_link;
        return view('frontend.contactpage', compact('page_title', 'googleMapsLink'));
    }
}