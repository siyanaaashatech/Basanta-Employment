<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Service;
use App\Models\Category;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SingleController extends Controller
{


    public function render_about(Request $request)
    {
        $page_title = "About Us";
        $categories = Category::latest()->get()->take(10);
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $teams = Team::all();
        $services = Service::latest()->get()->take(6);
        $posts = Post::with('category')->latest()->get()->take(3);
        return view('frontend.aboutus', compact('page_title', 'categories', 'sitesetting', 'about', 'teams', 'services', 'posts'));

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

        return view('frontend.includes.teams', compact('teams', 'sitesetting', 'categories', 'about', 'page_title', 'services', 'posts'));

    }




    
    public function about()
    {

        $page_title = "About Us";
        $serviceList = Service::latest()->get()->take(6);
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $teams = Team::all();

        $images = PhotoGallery::latest()->get();
        $strippedContent = preg_replace('/<p>(\s*<iframe[^>]*><\/iframe>\s*)<\/p>/', '$1', $about->content);

        return view('frontend.aboutus', compact('teams','page_title','serviceList','categories','sitesetting', 'about', 'strippedContent','services', 'images'));
    }
    public function service()
    {
       $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $serviceHead = Service::latest()->get()->take(1);

        return view('portal.services', compact('images','services','categories','sitesetting', 'about', 'serviceHead'));
    }

    public function singleService($id)
    {
        $service = Service::find($id);
       $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $serviceHead = Service::latest()->get()->take(1);

        return view('portal.service', compact('service','images','services','categories','sitesetting', 'about', 'serviceHead'));
    }


    public function gallery()
    {
       $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('portal.gallerys', compact('images','services','categories','sitesetting', 'about'));
    }
    public function videos()
    {
       $videos = VideoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('portal.video', compact('videos','services','categories','sitesetting', 'about'));
    }

    public function galleryImage($id)
    {
       $image = PhotoGallery::findorfail($id);
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('portal.image', compact('image','services','categories','sitesetting', 'about'));
    }

    public function teams()
    {
       $teams = Team::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('portal.team', compact('teams','services','categories','sitesetting', 'about'));
    }


    // public function blog(){

    //     $blogs = BlogPostsCategory::with(['getCategories' => function ($query) {
    //         $query->latest();
    //     }])
    //         ->whereHas('getCategories', function ($query) {
    //             $query->where('category_id', 4);
    //         })->orderBy('created_at', 'desc')->latest()->get();
    //         $this->processPosts($blogs);


    //         $images = Gallery::latest()->get();
    //         $categories = Category::all();
    //         $services = Services::latest()->get();
    //         $sitesetting = SiteSetting::first();
    //         $about = About::first();

    //         return view('portal.blogs', compact('images','services','categories','sitesetting', 'about', 'blogs'));

    // }

}