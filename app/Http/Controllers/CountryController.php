<?php

namespace App\Http\Controllers;

use Exception;
use DOMDocument;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

use Exception;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Session;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\ImageConverter; // Make sure this model exists and contains the necessary methods


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
        if ($content != '') {
            $dom = new \DomDocument();
            $content = preg_replace('/<(\w+):(\w+)>/', '&lt;\1:\2&gt;', $content);
            $content = preg_replace('/<\/(\w+):(\w+)>/', '&lt;/\1:\2&gt;', $content);

            libxml_use_internal_errors(true);
            $dom->loadHtml('<meta http-equiv="Content-Type" content="charset=utf-8" />' . $content);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            // foreach <img> in the submited message
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                $src = str_replace('http://127.0.0.1:8000/', 'http://127.0.0.1:8000/', $src);
                $img->removeAttribute('src');
                $img->setAttribute('src', $src);


                if (preg_match('/data:image/', $src)) {

                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];

                    $filename = uniqid();
                    $filepath = 'uploads/country/content' . $filename . '.' . $mimetype;

                    $image = Image::make($src)

                        ->encode($mimetype, 100)
                        ->save(public_path($filepath));
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                }
            }
            $html_cut = preg_replace('~<(?:!DOCTYPE|/?(?:html|body|head|meta))[^>]>\s~i', '', $dom->saveHTML());
            return $html_cut;
        } else {
            return $content;
        }
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('backend.country.update', ['country' => $country, 'page_title' => 'Update Country']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'image.*' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,avif,webp,avi|max:2048',
            'content' => 'nullable|string',
        ]);

        $country = Country::findOrFail($id);

        try {
            $imagesPaths = $country->image ? json_decode($country->image, true) : [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $imageFile) {
                    $imagePath = ImageConverter::convertSingleImage($imageFile, 'uploads/country/');
                    $imagesPaths[] = $imagePath;
                }
            }

            $processedContent = $this->processSummernoteContent($request->input('content'));

            $country->name = $request->input('name');
            $country->slug = SlugService::createSlug(Country::class, 'slug', $request->input('name'), ['unique' => false, 'source' => 'name', 'onUpdate' => true], $id);
            $country->image = json_encode($imagesPaths);
            $country->content = $processedContent;
            $country->save();

            return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully.');
        } catch (Exception $e) {
            return back()->with('error', "Error updating country: " . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $images = json_decode($country->image, true);
        if ($images) {
            foreach ($images as $imagePath) {
                File::delete(public_path($imagePath));
            }
        }

        $country->delete();
        return redirect()->route('admin.countries.index')->with('success', 'Country deleted successfully.');
    }




}