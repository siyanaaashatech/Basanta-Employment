<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone_no' => 'required|string',
            'whatsapp_no' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Adjust file types and size limit as needed
            'photo' => 'nullable|image|max:2048', // Adjust image size limit as needed
        ]);

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

        // Redirect back with success message or any other action
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
