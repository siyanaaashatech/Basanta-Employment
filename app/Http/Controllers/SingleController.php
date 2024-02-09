<?php

namespace App\Http\Controllers;

use App\Models\Mvc;

use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Video;
use App\Models\Career;
use App\Models\Client;
use App\Models\Advisor;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use App\Models\Welcome;
use App\Models\Category;
use App\Models\Backimage;
use App\Models\Legaldocs;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Models\InstagramPost;

class SingleController extends Controller
{


    // public function render_about(Request $request)
    // {
    //     $categories = Category::latest()->get()->take(10);
    //     $mvcs = Mvc::latest()->get()->take(3);

    //     $welcomes = Welcome::latest()->get()->take(4);
    //     $page_title = 'Introduction';
    //     $sitesetting = Sitesetting::first();
    //     $about = About::first();
    //     $teams = Team::all();
    //     $advisors = Advisor::all();
    //     $services = Service::latest()->get()->take(6);
    //     $posts = Post::with('getCategories')->latest()->get()->take(3);
    //     $categorieson = Category::with([
    //         'getPosts' => function ($query) {
    //             $query->latest()->take(8);
    //         }
    //     ])->whereIn('id', [1])->get();
    //     $categoriesone = Category::with([
    //         'getPosts' => function ($query) {
    //             $query->latest()->take(8);
    //         }
    //     ])->whereIn('id', [2])->get();
    //     return view('aboutus', compact('sitesetting', 'mvcs', 'welcomes', 'posts', 'teams', 'categories', 'categorieson', 'categoriesone', 'about', 'services', 'page_title', 'advisors'));

    // }



    // public function render_team(Request $request)
    // {
    //     $teams = Team::all();
    //     $page_title = 'Our Team';
    //     $services = Service::latest()->get()->take(6);
    //     $sitesetting = Sitesetting::first();
    //     $categories = Category::latest()->get()->take(10);
    //     $about = About::first();
    //     $posts = Post::with('getCategories')->latest()->get()->take(3);

    //     return view('team', compact('teams', 'sitesetting', 'categories', 'about', 'page_title', 'services', 'posts'));

    // }

    // public function render_service(Request $request)
    // {
    //     $services = Service::all();
    //     $page_title = 'Our Services';
    //     $sitesetting = Sitesetting::first();
    //     $welcomes = Welcome::latest()->get()->take(4);
    //     $categories = Category::latest()->get()->take(10);
    //     $about = About::first();
    //     return view('service', compact('sitesetting', 'welcomes', 'categories', 'about', 'services', 'page_title'));
    // }


    // public function render_allprojects(Request $request)
    // {

    //     $projects = Project::all();
    //     $page_title = 'Our Projects';
    //     $sitesetting = Sitesetting::first();
    //     $welcomes = Welcome::latest()->get()->take(4);
    //     $categories = Category::latest()->get()->take(10);
    //     $services = Service::all();
    //     $about = About::first();
    //     $otherone = Welcome::whereIn('id', [1])->get()->take(1);
    //     $othertwo = Welcome::whereIn('id', [2])->get()->take(1);
    //     $projects = Project::latest()->get()->take(6);
    //     $testimonials = Testimonial::latest()->get()->take(6);
    //     $advisors = Advisor::latest()->get()->take(3);
    //     $clients = Client::latest()->get()->take(10);
    //     $posts = Post::with('getCategories')->latest()->get()->take(3);

    //     return view('projects', compact('sitesetting', 'welcomes', 'categories', 'about', 'projects', 'page_title', 'services', 'posts', 'otherone', 'othertwo', 'projects', 'testimonials', 'advisors', 'clients'));
    // }
    // public function render_servicesingle($slug)
    // {
    //     $service = Service::where('slug', $slug)->first();
    //     $welcomes = Welcome::latest()->get()->take(4);
    //     $sitesetting = Sitesetting::first();
    //     $posts = Post::latest()->get()->take(10);
    //     $services = Service::all();
    //     $servicelist = Service::latest()->get()->take(8);
    //     $categories = Category::latest()->get()->take(10);
    //     $categorieson = Category::with([
    //         'getPosts' => function ($query) {
    //             $query->latest()->take(8);
    //         }
    //     ])->whereIn('id', [1])->get();
    //     $about = About::first();
    //     $otherone = Welcome::whereIn('id', [1])->get()->take(1);
    //     $othertwo = Welcome::whereIn('id', [2])->get()->take(1);
    //     $projects = Project::latest()->get()->take(6);
    //     $testimonials = Testimonial::latest()->get()->take(6);
    //     $advisors = Advisor::latest()->get()->take(3);
    //     $clients = Client::latest()->get()->take(10);

    //     return view('servicesingle', compact('sitesetting', 'welcomes', 'categorieson', 'posts', 'service', 'categories', 'about', 'services', 'servicelist', 'otherone', 'othertwo', 'projects', 'testimonials', 'advisors', 'clients'));

    // }


    // public function render_gallery(Request $request)
    // {
    //     $sitesetting = Sitesetting::first();
    //     $images = PhotoGallery::all();
    //     $categories = Category::latest()->get()->take(10);
    //     $page_title = 'Image Gallery';
    //     $about = About::first();
    //     $services = Service::latest()->get()->take(3);
    //     return view('gallery', compact('sitesetting', 'page_title', 'images', 'categories', 'about', 'services'));
    // }
    // public function render_video(Request $request)
    // {
    //     $sitesetting = Sitesetting::first();
    //     $videos = Video::all();
    //     $categories = Category::latest()->get()->take(10);
    //     $page_title = 'Video Gallery';
    //     $about = About::first();
    //     $services = Service::latest()->get()->take(3);
    //     return view('videos', compact('sitesetting', 'page_title', 'videos', 'categories', 'about', 'services'));
    // }


    public function render_contact(Request $request)
    {
        $page_title = 'Contact Us';
        $sitesetting = SiteSetting::first();
        // $welcomes = Welcome::latest()->get()->take(4);
        $categories = Category::latest()->get()->take(10);
        $about = About::first();
        $services = Service::latest()->get()->take(3);
        return view('frontend/contactpage', compact('sitesetting', 'page_title', 'categories', 'about', 'services'));
    }



    // public function render_cat($slug)
    // {
    //     $category = Category::where('slug', $slug)->first();
    //     $sitesetting = Sitesetting::first();
    //     $posts = Post::whereHas('getCategories', function ($q) use ($slug) {
    //         $q->where('slug', $slug);
    //     })->latest()->paginate(10);
    //     $services = Service::latest()->get()->take(3);
    //     $categories = Category::latest()->get()->take(10);
    //     $about = About::first();
    //     // $backimages= BackImage::latest()->get()->take(4);
    //     $otherone = Welcome::whereIn('id', [1])->get()->take(1);
    //     $othertwo = Welcome::whereIn('id', [2])->get()->take(1);
    //     $projects = Project::latest()->get()->take(6);
    //     $testimonials = Testimonial::latest()->get()->take(6);
    //     $advisors = Advisor::latest()->get()->take(3);
    //     $clients = Client::latest()->get()->take(10);


    //     return view('single', compact('sitesetting', 'category', 'posts', 'categories', 'about', 'services', 'otherone', 'othertwo', 'projects', 'testimonials', 'advisors', 'clients'));

    // }

    // public function render_post($slug)
    // {
    //     $post = Post::where('slug', $slug)->first();
    //     $mvcs = Mvc::latest()->get()->take(3);
    //     $sitesetting = Sitesetting::first();
    //     $categorieson = Category::with([
    //         'getPosts' => function ($query) {
    //             $query->latest()->take(8);
    //         }
    //     ])->whereIn('id', [1])->get();
    //     $postslist = Post::latest()->get()->take(6);
    //     $services = Service::latest()->get()->take(8);
    //     $categories = Category::latest()->get()->take(10);
    //     $about = About::first();

    //     $otherone = Welcome::whereIn('id', [1])->get()->take(1);
    //     $othertwo = Welcome::whereIn('id', [2])->get()->take(1);
    //     $projects = Project::latest()->get()->take(6);
    //     $testimonials = Testimonial::latest()->get()->take(6);
    //     $advisors = Advisor::latest()->get()->take(3);
    //     $clients = Client::latest()->get()->take(10);
    //     return view('postview', compact('sitesetting', 'postslist', 'mvcs', 'categorieson', 'post', 'categories', 'about', 'services', 'otherone', 'projects', 'testimonials', 'advisors', 'clients', 'othertwo'));

    // }
    // public function render_welcome($slug)
    // {
    //     $welcome = Welcome::where('slug', $slug)->first();
    //     $page_title = 'Welcome';
    //     $sitesetting = Sitesetting::first();
    //     $post = Post::latest()->get()->take(10);
    //     $services = Service::latest()->get()->take(3);
    //     $categories = Category::latest()->get()->take(10);
    //     $categorieson = Category::with([
    //         'getPosts' => function ($query) {
    //             $query->latest()->take(8);
    //         }
    //     ])->whereIn('id', [1])->get();
    //     $about = About::first();

    //     $otherone = Welcome::whereIn('id', [1])->get()->take(1);
    //     $othertwo = Welcome::whereIn('id', [2])->get()->take(1);
    //     $projects = Project::latest()->get()->take(6);
    //     $testimonials = Testimonial::latest()->get()->take(6);
    //     $advisors = Advisor::latest()->get()->take(3);
    //     $clients = Client::latest()->get()->take(10);
    //     return view('welcome', compact('sitesetting', 'categorieson', 'welcome', 'post', 'otherone', 'categories', 'about', 'services', 'page_title', 'otherone', 'othertwo', 'projects', 'testimonials', 'advisors', 'clients'));

    // }
    // public function render_project($slug)
    // {
    //     $project = Project::where('slug', $slug)->first();
    //     $page_title = 'Projects';
    //     $sitesetting = Sitesetting::first();
    //     $post = Post::latest()->get()->take(10);
    //     $services = Service::latest()->get()->take(3);
    //     $categories = Category::latest()->get()->take(10);
    //     $categorieson = Category::with([
    //         'getPosts' => function ($query) {
    //             $query->latest()->take(8);
    //         }
    //     ])->whereIn('id', [1])->get();
    //     $about = About::first();

    //     $otherone = Welcome::whereIn('id', [1])->get()->take(1);
    //     $othertwo = Welcome::whereIn('id', [2])->get()->take(1);
    //     $projects = Project::latest()->get()->take(6);
    //     $testimonials = Testimonial::latest()->get()->take(6);
    //     $advisors = Advisor::latest()->get()->take(3);
    //     $clients = Client::latest()->get()->take(10);
    //     return view('projectview', compact('sitesetting', 'categorieson', 'project', 'post', 'otherone', 'categories', 'about', 'services', 'page_title', 'otherone', 'othertwo', 'projects', 'testimonials', 'advisors', 'clients'));

    // }


    // public function render_testimonial(Request $request)
    // {
    //     $testimonials = Testimonial::latest()->paginate(12);
    //     $page_title = 'Testimonials';
    //     $sitesetting = Sitesetting::first();
    //     $categories = Category::latest()->get()->take(10);
    //     $about = About::first();
    //     $services = Service::latest()->get()->take(6);
    //     return view('testimonials', compact('sitesetting', 'testimonials', 'categories', 'about', 'services', 'page_title'));

    // }

    // public function render_message(Request $request)
    // {
    //     $messages = Message::all()->sortBy('id');
    //     ;
    //     $sitesetting = Sitesetting::first();
    //     $categories = Category::latest()->get()->take(10);
    //     $about = About::first();

    //     return view('message', compact('messages', 'sitesetting', 'categories', 'about'));

    // }

    // public function render_legaldocs(Request $request)
    // {
    //     $legaldocs = Legaldocs::all();
    //     $sitesetting = Sitesetting::first();
    //     $categories = Category::latest()->get()->take(10);
    //     $about = About::first();
    //     $page_title = 'Legal Documents';

    //     return view('legaldocs', compact('legaldocs', 'sitesetting', 'categories', 'about', 'page_title'));

    // }

    // public function render_singlemessage($id)
    // {
    //     $message = Message::find($id);
    //     $sitesetting = Sitesetting::first();
    //     $categories = Category::latest()->get()->take(10);
    //     $about = About::first();
    //     $services = Service::all();
    //     return view('singlemessage', compact('message', 'sitesetting', 'categories', 'about', 'services'));

    // }
    //Careers
    // public function render_career(Request $request)
    // {
    //     $sitesetting = Sitesetting::first();
    //     $data = Career::all();
    //     $categories = Category::latest()->get()->take(10);
    //     $services = Service::all();
    //     $page_title = 'Current Openings';

    //     return view('currentjoboppening', compact('sitesetting', 'data', 'categories', 'services', 'page_title'));
    // }
    // public function render_job($id)
    // {
    //     $job = Career::find($id);

    //     if (!$job) {
    //         abort(404);
    //     }

    //     $sitesetting = Sitesetting::first();
    //     $categories = Category::latest()->get()->take(10);
    //     $services = Service::all();

    //     return view('jobs', compact('sitesetting', 'job', 'categories', 'services'));
    // }
    // public function render_applyForm($id)
    // {
    //     $job = Career::find($id);

    //     if (!$job) {
    //         abort(404);
    //     }
    //     $sitesetting = Sitesetting::first();
    //     $categories = Category::latest()->get()->take(10);
    //     $services = Service::all();

    //     return view('apply_form', compact('sitesetting', 'job', 'categories', 'services'));
    // }
}