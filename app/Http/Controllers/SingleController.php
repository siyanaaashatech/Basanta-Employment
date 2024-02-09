<?php

namespace App\Http\Controllers;


use App\Models\About;

use App\Models\Service;

use App\Models\Category;

use App\Models\SiteSetting;

use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function render_contact() {
        $page_title = 'Contact Us';
        $sitesetting = SiteSetting::first(); // Only if needed
        return view('frontend.contactpage', compact('sitesetting', 'page_title'));
    }
}