<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
// use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

use Closure;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.contact.index', [
            'contacts' => $contacts,
            'page_title' => 'Contact Us'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_no' => 'required|string',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->route('Contact')->with('success', 'Contact saved successfully!');
    }



}