<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class DemandController extends Controller
{
    public function index()
    {
        $demands = Demand::latest()->paginate(5);
        $page_title = 'Demands';
        return view('backend.demand.index', compact('demands','page_title'));
    }

    public function create()
    {
        $countries = Country::all();
        
        return view('backend.demand.create', compact('countries'));
    }

    public function store(Request $request)
{
    try {
        // Check if the request has the 'image' file
        if ($request->hasFile('image')) {
            // Move the uploaded file to the desired location
            $newImageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/demands'), $newImageName);
        } else {
            // Handle case when no image is uploaded
            return redirect()->back()->with('error', 'No image uploaded. Please upload an image.');
        }
            // Create a new Demand instance and set its attributes
            $demand = new Demand;
            $demand->country_id = $request->country_id;
            $demand->from_date = $request->from_date;
            $demand->to_date = $request->to_date;
            $demand->content = $request->content;
            $demand->content_ne = $request->content_ne;
            $demand->vacancy = $request->vacancy;
            $demand->vacancy_ne = $request->vacancy_ne;
            $demand->image = $newImageName; // Set the image attribute

            // Save the demand and check if it's saved successfully
            if ($demand->save()) {
                return redirect()->route('admin.demands.index')->with('success', 'Success! Demand created.');
            } else {
                return redirect()->back()->with('error', 'Error! Demand not created.');
            }
      
    } catch (\Exception $e) {
        // Log any errors that occur during the process
        Log::error('Error creating demand: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error creating demand. Please try again.' . $e->getMessage());
    }




}
public function edit($id)
{
    $demand = Demand::findOrFail($id); // Fetch the demand with the provided ID
    $countries = Country::all(); // Fetch all countries

    return view('backend.demand.update', compact('demand', 'countries'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'country_id' => 'required',
        'from_date' => 'required|date',
        'to_date' => 'required|date',
        'vacancy' => 'required',
        'vacancy_ne' => 'required',
        'content' => 'required|string',
        'content_ne' => 'nullable|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
    ]);

    // Find the Demand instance by its ID
    $demand = Demand::findOrFail($id);

    // Assign the validated request data to the Demand instance
    $demand->country_id = $request->input('country_id');
    $demand->from_date = $request->input('from_date');
    $demand->to_date = $request->input('to_date');
    $demand->vacancy = $request->input('vacancy');
    $demand->vacancy_ne = $request->input('vacancy_ne');
    $demand->content = $request->input('content');
    $demand->content_ne = $request->input('content_ne') ?? '';

    // Handle the image upload if a new image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/demands'), $imageName);
        $demand->image = $imageName;
    }

    // Save the updated Demand instance
    $demand->save();

    // Redirect back to the index with a success message
    return redirect()->route('admin.demands.index')->with('success', 'Demand updated successfully.');
}

    public function destroy(Demand $demand)
    {
        $demand->delete();

        return redirect()->route('admin.demands.index')
                         ->with('success','Demand deleted successfully');
    }
}
