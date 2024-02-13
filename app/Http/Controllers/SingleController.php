<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Service;
use App\Models\Category;
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
}