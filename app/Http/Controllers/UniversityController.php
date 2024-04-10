<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\University;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class UniversityController extends Controller
{
    public function index()
    {
        // $universities = University::paginate(10);
        $universities = University::with('country')->paginate(10);
        return view('backend.university.index', ['universities' => $universities, 'page_title' => 'Company']);


    }
    public function create()
    {
        $countries = Country::all();
        return view('backend.university.create', ['countries' => $countries, 'page_title' => 'Create Company']);
    }
    public function store(Request $request)
{
    // Validate the incoming request
    // $this->validate($request, [
    //     'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
    //     'title' => 'required|string|max:255',
    //     'address' => 'required|string|max:255',
    //     'country_id' => 'required|exists:countries,id',
    //     'phone_no' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
    //     'email' => 'nullable|email',
    //     'website' => 'nullable|url',
    // ]);

    try {
        // Handle file upload
        if ($request->hasFile('logo')) {
            $newLogo = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/university/'), $newLogo);
        } else {
            $newLogo = "NoImage";
        }

        // Generate slug
        $slug = SlugService::createSlug(University::class, 'slug', $request->title);

        // Create a new instance of University
        $university = new University;
        $university->logo = $newLogo;
        $university->title = $request->title;
        $university->address = $request->address;
        $university->country_id = $request->country_id;
        $university->slug = $slug; // Assign generated slug
        $university->phone_no = $request->phone_no;
        $university->email = $request->email;
        $university->website = $request->website;

        // Save the university
        if ($university->save()) {
            return redirect()->route('admin.universities.index')->with('success', 'Success! Company created.');
        } else {
            return redirect()->back()->with('error', 'Error! Company not created.');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error! Something went wrong.');
    }
}


    public function edit($id)
    {
        $countries = Country::all();
        $universities = University::with('country')->find($id);

        if (!$universities) {
            return redirect()->route('admin.universities.index')->with('error', 'Company not found.');
        }

        return view('backend.university.update', ['universities' => $universities, 'countries' => $countries, 'page_title' => 'Update Company']);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'phone_no' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ]);

        try {
            $university = University::find($id);
            if (!$university) {
                return redirect()->back()->with('error', 'Company not found.');
            }

            if ($request->hasFile('logo')) {
                // Assuming you want to replace the old logo
                $newLogo = time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('uploads/university/'), $newLogo);
                $university->logo = $newLogo;
            }
            $university->title = $request->title;
            $university->address = $request->address;
            $university->country_id = $request->country_id;
            $university->phone_no = $request->phone_no;
            $university->email = $request->email;
            $university->website = $request->website;

            if ($university->save()) {
                return redirect()->route('admin.universities.index')->with('success', 'Company updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Error! Company not updated.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error! Something went wrong: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $universities = University::find($id);

        if ($universities) {
            $universities->delete();
            return redirect()->route('admin.universities.index')->with('success', 'Success !! Company Deleted');
        } else {
            return redirect()->route('admin.universities.index')->with('error', 'Company not found.');
        }
    }
}