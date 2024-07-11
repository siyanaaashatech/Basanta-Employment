<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Http;

class ApplicationController extends Controller
{
    public function store(Request $request, $id)
    {
        // Validate the incoming request data including reCAPTCHA
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/u', // Only allow letters and spaces
            'email' => 'nullable|email|max:255|ends_with:@gmail.com',
            'address' => 'nullable|string|max:255|regex:/^[a-zA-Z0-9\s]+$/u', // Only allow letters, numbers, and spaces
            'phone_no' => 'required|string|regex:/^[0-9]+$/|digits:10', // Must be exactly 10 digits
            'whatsapp_no' => 'nullable|string|regex:/^[0-9]+$/|digits:10', // Must be exactly 10 digits
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust file types and size limit as needed
            'photo' => 'nullable|image|max:2048', // Adjust image size limit as needed
            'g-recaptcha-response' => 'required'
        ], [
            'name.regex' => 'Only letters and spaces are allowed in the name field.',
            'address.regex' => 'Only letters, numbers, and spaces are allowed in the address field.',
            'phone_no.regex' => 'Phone number should only contain digits.',
            'phone_no.digits' => 'Phone number should be exactly 10 digits.',
            'whatsapp_no.regex' => 'WhatsApp number should only contain digits.',
            'whatsapp_no.digits' => 'WhatsApp number should be exactly 10 digits.',
            'email.ends_with' => 'The email must end with @gmail.com.',
        ]);

        // Verify reCAPTCHA
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $recaptchaResponse,
            'remoteip' => $request->ip(),
        ]);

        $recaptchaData = $response->json();

        if (!$recaptchaData['success']) {
            return back()->withErrors(['g-recaptcha-response' => 'ReCAPTCHA validation failed.'])->withInput();
        }

        // Handle CV file upload
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time().'.'.$cv->getClientOriginalExtension();
            $cv->move(public_path('uploads/cv'), $cvName);
            $cv = 'uploads/cv/' . $cvName;
        } else {
            $cv = null;
        }

        // Handle photo file upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/photos'), $photoName);
            $photo = 'uploads/photos/' . $photoName;
        } else {
            $photo = null;
        }

        // Create a new Application instance
        $application = new Application();
        $application->demand_id = $id; // Assuming demand_id is passed from the form or URL
        $application->name = $request->input('name');
        $application->email = $request->input('email');
        $application->address = $request->input('address');
        $application->phone_no = $request->input('phone_no');
        $application->whatsapp_no = $request->input('whatsapp_no');
        $application->cv = $cv;
        $application->photo = $photo;
        $application->status = 'pending'; // Initial status is pending

        // Save the application
        $application->save();

        // Redirect back with success message or errors
        return redirect()->route('SingleDemand', ['id' => $id])->with('success', 'Application submitted successfully!');
    }

    public function adminIndex()
    {
        // Fetch all applications from the database
        $applications = Application::with('demand')->get();

        // Return the admin view with the applications
        return view('backend.applications.index', compact('applications'));
    }

    public function accept($id)
    {
        try {
            // Find the application by ID
            $application = Application::findOrFail($id);

            // Update status to accepted
            $application->status = 'accepted';
            $application->save();

            // Return success response
           
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function reject($id)
    {
        try {
            // Find the application by ID
            $application = Application::findOrFail($id);

            // Update status to rejected
            $application->status = 'rejected';
            $application->save();

            // Return success response
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
