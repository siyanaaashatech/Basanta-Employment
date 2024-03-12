<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Course;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with(['university', 'course'])->paginate(10);
        return view('backend.testimonial.index', ['testimonials' => $testimonials, 'page_title' => 'Student Review']);
    }

    public function create()
    {
        $universities = University::all();
        $courses = Course::all();
        return view('backend.testimonial.create', ['universities' => $universities, 'courses' => $courses, 'page_title' => 'Student Review']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'course_id' => 'required|exists:courses,id',
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
            return redirect()->route('admin.testimonials.index')->with('success', 'Student Review created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while creating the Student Review: ' . $e->getMessage());
        }
    }

    // Inside TestimonialController

    public function edit($id)
    {
        $testimonials = Testimonial::find($id);
        if (!$testimonials) {
            return redirect()->route('admin.testimonials.index')->with('error', 'Student Review not found.');
        }

        $universities = University::all();
        $courses = Course::all();
        return view('backend.testimonial.update', [
            'testimonials' => $testimonials,
            'universities' => $universities,
            'courses' => $courses,
            'page_title' => 'Update Student Review'
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'course_id' => 'required|exists:courses,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,avif,webp|nullable|max:2048',
            'description' => 'required|string',
        ]);

        try {
            $testimonial = Testimonial::find($id);
            if (!$testimonial) {
                return back()->with('error', 'Student Review not found.');
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

            return redirect()->route('admin.testimonials.index')->with('success', 'Student Review updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while updating the Student Review: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $testimonials = Testimonial::find($id);
            if (!$testimonials) {
                return back()->with('error', 'Student Review not found.');
            }

            $testimonials->delete();
            return redirect()->route('admin.testimonials.index')->with('success', 'Student Review deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the Student Review: ' . $e->getMessage());
        }
    }



}
