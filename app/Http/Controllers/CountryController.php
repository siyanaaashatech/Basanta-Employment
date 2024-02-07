<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\ImageConverter; // Make sure this model exists and contains the necessary methods
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Session;
use DOMDocument;
use Intervention\Image\Facades\Image;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::paginate(10);
        return view('backend.country.index', ['countries' => $countries, 'page_title' => 'Country']);
    }
    public function create()
    {
        return view('backend.country.create', ['page_title' => 'Create Country']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,avif,webp,avi|max:2048',
            'content' => 'nullable|string',
        ]);

        try {
            $imagesPaths = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $imageFile) {
                    $imagePath = ImageConverter::convertSingleImage($imageFile, 'uploads/country/');
                    $imagesPaths[] = $imagePath;
                }
            }

            $processedContent = $this->processSummernoteContent($request->input('content'));

            $country = new Country();
            $country->name = $request->input('name');
            $country->slug = SlugService::createSlug(Country::class, 'slug', $request->input('name'));
            $country->image = json_encode($imagesPaths);
            $country->content = $processedContent;
            $country->save();

            return redirect()->route('admin.countries.index')->with('success', 'Country created successfully.');
        } catch (Exception $e) {
            return back()->with('error', "Error creating country: " . $e->getMessage());
        }
    }

    protected function processSummernoteContent($content)
    {
        if (empty($content)) {
            return '';
        }

        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {
            $src = $img->getAttribute('src');
            if (strpos($src, 'data:image') === 0) {
                $image = Image::make($src);
                $imageName = uniqid() . '.webp';
                $path = 'uploads/country/content/' . $imageName;
                $image->save(public_path($path));
                $newSrc = asset($path);
                $img->setAttribute('src', $newSrc);
            }
        }

        libxml_clear_errors();
        $content = $dom->saveHTML();
        return $content;
    }
}