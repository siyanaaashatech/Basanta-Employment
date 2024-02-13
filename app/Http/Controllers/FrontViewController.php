<?php

namespace App\Http\Controllers;

use App\Models\Contact;
// use App\Models\Service;

use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Service;
use App\Models\Category;
use App\Models\PhotoGallery;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class FrontViewController extends Controller
{

    public function index()
    {
        // dd('fav');

        $services = Service::latest()->get()->take(5);
        $contacts = Contact::latest()->get();
        return view('frontend.index', compact([
            'services',
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

        return view('frontend.aboutus', compact('serviceList','categories','sitesetting', 'about', 'strippedContent','services', 'images'));
    }
}