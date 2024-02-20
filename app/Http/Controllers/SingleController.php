<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Country;
use App\Models\Service;
use App\Models\Category;
use App\Models\SiteSetting;
use App\Models\PhotoGallery;
use App\Models\University;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

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

        return view('frontend.aboutus', compact('categories', 'sitesetting', 'about', 'teams', 'services', 'posts', 'images'));

    }



    public function render_team(Request $request)
    {
        $teams = Team::all();
        $page_title = 'Our Team';
        $services = Service::latest()->get()->take(6);
        $sitesetting = SiteSetting::first();
        $categories = Category::latest()->get()->take(10);
        $about = About::first();
        $posts = Post::with('getCategories')->latest()->get()->take(3);

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

    public function render_singleService($id)
    {
        $service = Service::find($id);
        $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $serviceHead = Service::latest()->get()->take(1);

        return view('frontend.service', compact('service', 'images', 'services', 'categories', 'sitesetting', 'about', 'serviceHead'));
    }
    public function render_singleCountry($slug)
    {
        $country = Country::where('slug', $slug)->firstOrFail();
        // $countries = Country::all();
        return view('frontend.country', compact('country'));
    }

    public function render_singleUniversity($slug)
    {
        $university = University::where('slug', $slug)->firstOrFail();
        return view('frontend.university', compact('university'));
    }

    public function render_singleCourse($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('frontend.course', compact('course'));
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

    public function render_singleImage($id)
    {
        $image = PhotoGallery::find($id);
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