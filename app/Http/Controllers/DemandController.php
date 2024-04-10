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
        $demands = Demand::all();
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
            $demand->vacancy = $request->vacancy;
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

    public function update(Request $request, Demand $demand)
    {
        $request->validate([
            'country_id' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'content' => 'required',
            'vacancy' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Process image upload if a new image is provided
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/demands'), $newImageName);
            $demand->image = $newImageName;
        }

        $demand->update($request->all());

        return redirect()->route('admin.demands.index')
                         ->with('success','Demand updated successfully');
    }

    public function destroy(Demand $demand)
    {
        $demand->delete();

        return redirect()->route('admin.demands.index')
                         ->with('success','Demand deleted successfully');
    }
}
