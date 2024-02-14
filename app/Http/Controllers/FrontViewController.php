<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Service;
use App\Models\University;
use App\Models\SiteSetting;
use App\Models\BlogPostsCategory;

class FrontViewController extends Controller
{

    public function index()
    {
        // dd('fav');
        $sitesetting = SiteSetting::first();
        $services = Service::latest()->get()->take(5);
        $contacts = Contact::latest()->get();
        $universities = University::latest()->get()->take(5);
        return view('frontend.index', compact([
            'services','sitesetting', 'contacts', 'universities'
        ]));
    }

    public function blogs()
    {
        $blogs = BlogPostsCategory::latest()->get();

        return view('frontend.blogs', compact([
            'blogs',
        ]));

    }

    public function news()
    {
        $about = About::latest()->get()->take(1); 

    return view('frontend.news', compact('about'));

    }
}