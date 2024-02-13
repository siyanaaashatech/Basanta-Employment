<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;

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
}