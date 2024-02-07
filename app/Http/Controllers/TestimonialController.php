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
        return view('backend.testimonial.index', ['testimonials' => $testimonials, 'page_title' => 'Testimonials']);
    }

    public function create()
    {
        $universities = University::all();
        $courses = Course::all();
        return view('backend.testimonial.create', ['universities' => $universities, 'courses' => $courses, 'page_title' => 'Create Testimonials']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'course_id' => 'required|exists:courses,id',
            'description' => 'required|string',
        ]);

        try {
            $testimonial = new Testimonial();
            $testimonial->name = $request->name;
            $testimonial->university_id = $request->university_id;
            $testimonial->course_id = $request->course_id;
            $testimonial->description = $request->description;

            $testimonial->save();
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while creating the testimonial: ' . $e->getMessage());
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
            'courses' => $courses,
            'page_title' => 'Update Testimonial'
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'course_id' => 'required|exists:courses,id',
            'description' => 'required|string',
        ]);

        try {
            $testimonial = Testimonial::find($id);
            if (!$testimonial) {
                return back()->with('error', 'Testimonial not found.');
            }

            $testimonial->update([
                'name' => $request->name,
                'university_id' => $request->university_id,
                'course_id' => $request->course_id,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while updating the testimonial: ' . $e->getMessage());
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
            return back()->with('error', 'An error occurred while deleting the testimonial: ' . $e->getMessage());
        }
    }



}
