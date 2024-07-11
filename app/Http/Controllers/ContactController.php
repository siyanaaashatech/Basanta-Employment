<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('backend.contact.index', [
            'contacts' => $contacts,
            'page_title' => 'Contact Us'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/u', // Only allow letters and spaces
            'email' => 'required|email|max:255|ends_with:@gmail.com', // Must be a valid email ending with @gmail.com
            'phone_no' => 'required|string|regex:/^[0-9]+$/|digits:10', // Must be exactly 10 digits
            'message' => 'required|string',
            'g-recaptcha-response' => 'required',
        ], [
            'name.regex' => 'Only letters and spaces are allowed in the name field.',
            'email.email' => 'The email must be a valid email address.',
            'email.required' => 'The email field is required.',
            'email.ends_with' => 'The email must end with @gmail.com.',
            'phone_no.regex' => 'Phone number should only contain digits.',
            'phone_no.digits' => 'Phone number should be exactly 10 digits.',
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_no = $request->phone_no;
        $contact->message = $request->message;
        $contact->save();

        // Assuming you want to return a success response for AJAX handling
        return response()->json(['success' => true]);
    }
}
