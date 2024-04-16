<?php

namespace App\Http\Controllers;

use App\Models\CoverImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CoverImageController extends Controller
{
    public function index()
    {
        $coverimages = CoverImage::latest()->paginate(5);

        return view('backend.coverimage.index', ['coverimages' => $coverimages, 'page_title' => 'Cover Image']);
    }

    public function create()
    {
        return view('backend.coverimage.create', ['page_title' => 'Add Cover Image']);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            ]);

            $newImageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/coverimage'), $newImageName);

            $coverimage = new CoverImage;
            $coverimage->title = $request->title;
            $coverimage->image = $newImageName;

            if ($coverimage->save()) {
                return redirect()->route('admin.cover-images.index')->with('success', 'Success! Cover image created.');
            } else {
                return redirect()->back()->with('error', 'Error! Cover image not created.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error! The size of the image must be less than 2MB');
        }
    }

    public function edit($id)
    {
        $coverimage = CoverImage::find($id);
        if (!$coverimage) {
            return redirect()->route('admin.cover-images.index')->with('error', 'Cover Image not found.');
        }

        return view('backend.coverimage.update', ['coverimage' => $coverimage, 'page_title' => 'Update Cover Image']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $coverImage = CoverImage::findOrFail($id);
        if (!$coverImage) {
            return redirect()->route('admin.cover-images.index')->with('error', 'Cover Image not found.');
        }

        if ($request->hasFile('image')) {
            // Check if the uploaded image size is within the limit
            if ($request->file('image')->getSize() > 2097152) { // 2MB in bytes
                return redirect()->back()->with('error', 'Error! Make sure the size of the image is less than 2MB');
            }

            $newImageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/coverimage'), $newImageName);

            // Delete the old image, if exists.
            if ($coverImage->image) {
                $oldImagePath = public_path('uploads/coverimage/' . $coverImage->image);
                File::exists($oldImagePath) && File::delete($oldImagePath);
            }

            $coverImage->image = $newImageName;
        }

        $coverImage->title = $request->title ?? $coverImage->title;

        if ($coverImage->save()) {
            return redirect()->route('admin.cover-images.index')->with('success', 'Success! Cover image updated.');
        }

        return redirect()->back()->with('error', 'Error! Something went wrong.');
    }

    public function destroy($id)
    {
        $coverimage = CoverImage::find($id);
        if ($coverimage) {
            $coverimage->delete();
            return redirect()->route('admin.cover-images.index')->with('success', 'Success !! Cover Image Deleted');
        } else {
            return redirect()->route('admin.cover-images.index')->with('error', 'Cover Image not found.');
        }
    }
}
