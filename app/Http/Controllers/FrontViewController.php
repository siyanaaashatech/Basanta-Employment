<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class FrontViewController extends Controller
{

    public function index()
    {
        // dd('fav');
        $contacts = Contact::latest()->get();
        return view('frontend.index', ['contacts' => $contacts,]);
    }
}