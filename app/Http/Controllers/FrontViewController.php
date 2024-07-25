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
use App\Models\Client;
use App\Models\Message;

class FrontViewController extends Controller
{
    public function index()
    {
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $services = Service::latest()->get()->take(6);
        $contacts = Contact::latest()->get();
        $blogs = BlogPostsCategory::latest()->get()->take(3);
        $testimonials = Testimonial::latest()->get()->take(10);
        $coverImages = CoverImage::all();
        $demands = Demand::latest()->get()->take(12);
        
        // Fetch the most recent message
        $message = Message::latest()->first(); // Fetch a single latest message
    
        // Fetch the first category
        $firstCategory = Category::first();
    
        // Fetch posts related to the first category
        $posts = $firstCategory->posts()->latest()->take(6)->get();

        $clients = Client::latest()->get();
    
        return view('frontend.index', compact([
            'services',
            'contacts',
            'blogs',
            'sitesetting',
            'testimonials',
            'coverImages',
            'message', // Updated to single message
            'clients',
            'demands',
            'about',
            'posts',
            'firstCategory'
        ]));
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
