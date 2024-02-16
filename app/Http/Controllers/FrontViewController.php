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
        // dd('fav');
        $sitesetting = SiteSetting::first();
        $services = Service::latest()->get()->take(5);
        $contacts = Contact::latest()->get();
        $blogs = BlogPostsCategory::latest()->get()->take(5);
        $courses = Course::latest()->get()->take(6);
        $testimonials = Testimonial::latest()->get()->take(10);

        $countries = Country::all();
        $countryImages = [];

        foreach ($countries as $country) {
            $images = json_decode($country->image, true);
            $countryImages = array_merge($countryImages, $images);
        }


        return view('frontend.index', compact([
            'services',
            'contacts',
            'blogs',
            'courses',
            'testimonials',
            'countries',
            'countryImages'
        ]));
    }



    public function about()
    {
        $serviceList = Service::latest()->get()->take(6);
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $images = PhotoGallery::latest()->get();
        $strippedContent = preg_replace('/<p>(\s*<iframe[^>]*><\/iframe>\s*)<\/p>/', '$1', $about->content);

        return view('frontend.aboutus', compact('serviceList', 'categories', 'sitesetting', 'about', 'strippedContent', 'services', 'images'));
    }
}