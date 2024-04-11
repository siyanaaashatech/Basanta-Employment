<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\WorkCategory;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with(['university', 'course'])->paginate(10);
        return view('backend.testimonial.index', ['testimonials' => $testimonials, 'page_title' => 'Testimonials']);
    }

    public function create()
    {
        $universities = University::all();
        $work_categories = WorkCategory::all();
        return view('backend.testimonial.create', ['universities' => $universities, 'work_categories' => $work_categories, 'page_title' => 'Testimonials']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'work_category_id' => 'required|exists:work_categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,avif,webp,avi|max:2048',
            'description' => 'required|string',
        ]);

        try {
            $newImageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/testimonial'), $newImageName);

            $testimonial = new Testimonial();
            $testimonial->name = $request->name;
            $testimonial->university_id = $request->university_id;
            $testimonial->course_id = $request->course_id;
            $testimonial->image = $newImageName;
            $testimonial->description = $request->description;

            $testimonial->save();
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while creating testimonial: ' . $e->getMessage());
        }
    }

    // Inside TestimonialController

    public function edit($id)
    {
        $testimonials = Testimonial::find($id);
        if (!$testimonials) {
            return redirect()->route('admin.testimonials.index')->with('error', 'Testimonial not found.');
        }

        $universities = University::all();
        $courses = Course::all();
        return view('backend.testimonial.update', [
            'testimonials' => $testimonials,
            'universities' => $universities,
            'work_categories' => $work_categories,
            'page_title' => 'Update Testimonial'
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'work_category_id' => 'required|exists:work_categories,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,avif,webp|nullable|max:2048',
            'description' => 'required|string',
        ]);

        try {
            $testimonial = Testimonial::find($id);
            if (!$testimonial) {
                return back()->with('error', 'Testimonial not found.');
            }

            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                // Delete the old image from the server if it exists
                if ($testimonial->image && file_exists(public_path('uploads/testimonial/' . $testimonial->image))) {
                    unlink(public_path('uploads/testimonial/' . $testimonial->image));
                }

                // Upload the new image
                $newImageName = time() . '-' . $request->image->getClientOriginalName();
                $request->image->move(public_path('uploads/testimonial'), $newImageName);
                $testimonial->image = $newImageName;
            }

            // Update the testimonial with the new data
            $testimonial->name = $request->name;
            $testimonial->university_id = $request->university_id;
            $testimonial->course_id = $request->course_id;
            $testimonial->description = $request->description;
            $testimonial->save();

            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while updating the Testimonial: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $testimonials = Testimonial::find($id);
            if (!$testimonials) {
                return back()->with('error', 'Testimonial not found.');
            }

            $testimonials->delete();
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting Testimonial: ' . $e->getMessage());
        }
    }



}
