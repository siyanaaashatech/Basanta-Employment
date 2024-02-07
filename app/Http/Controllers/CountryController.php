<?php

namespace App\Http\Controllers;

use Exception;
use DOMDocument;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ImageConverter;
use Cviebrock\EloquentSluggable\Services\SlugService;

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


    private function convertImage($image)
    {
        $fileName = uniqid() . '.webp';
        $imagePath = 'uploads/country/' . $fileName;

        $directory = public_path('uploads/country/');
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        $img = Image::make($image->getRealPath());
        $img->encode('webp', 70)->save(public_path($imagePath));

        return $imagePath;
    }

    private function convertImages($images)
    {
        $ext = 'webp';
        $news = [];

        foreach ($images as $image) {
            $image_name = hexdec(uniqid()) . '-' . time() . '.' . $ext;
            $image_destination_path = public_path('uploads/country/') . $image_name;
            $image_convert = Image::make($image->getRealPath());
            $image_convert->save($image_destination_path, 50);
            $news[] = $image_name;
        }

        return $news;
    }



    private function processTags($tags)
    {
        if (empty($tags)) {
            return '';
        }

        $tagsArray = explode(',', $tags);
        $formattedTags = [];

        foreach ($tagsArray as $tag) {
            $formattedTags[] = '#' . trim($tag);
        }

        return implode(',', $formattedTags);
    }
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required|string',
            'photo' => 'required|array',
            'photo.*' => 'required|image|mimes:jpeg,png,jpg,gif,avif,webp,avi|max:2048',
            'content' => 'nullable|string',
        ]);
        try {
            $country = new Country;
            $country->name = $request->name;
            $country->slug = SlugService::createSlug(Country::class, 'slug', $request->name);
            $country->content = $this->postSummernote($request->content);
            $country->tags = $this->processTags($request->tags);
            // $country->photo = $request->hasFile('photo') ? json_encode($this->convertImages($request->file('photo'))) : [];
            $images = [];
            foreach ($request->file('photo') as $photo) {
                $imagePath = $this->convertImage($photo);
                $images[] = $imagePath;
            }
            $country->photo = json_encode($images);

            if ($country->save()) {
                return redirect()->route('admin.countries.index')->with('success', 'Success! Country created.');
            } else {
                return redirect()->back()->with('error', 'Error! Country not created.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error! Something went wrong.');
        }
    }
    public function postSummernote($details)
    {
        if ($details != '') {
            $dom = new \DomDocument();

            // this will  escape the unescaped-xml
            //<w:View>Normal</w:View>
            //&lt;w:View&gt;Normal&lt;/w:View&gt;
            $details = preg_replace('/<(\w+):(\w+)>/', '&lt;\1:\2&gt;', $details);
            $details = preg_replace('/<\/(\w+):(\w+)>/', '&lt;/\1:\2&gt;', $details);

            libxml_use_internal_errors(true);
            $dom->loadHtml('<meta http-equiv="Content-Type" content="charset=utf-8" />' . $details);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            // foreach <img> in the submited message
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                $src = str_replace('http://127.0.0.1:8000/', 'http://127.0.0.1:8000/', $src);
                $img->removeAttribute('src');
                $img->setAttribute('src', $src);

                // if the img source is 'data-url'
                if (preg_match('/data:image/', $src)) {
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];
                    // dd($mimetype);
                    // Generating a random filename
                    $filename = uniqid();
                    $filepath = 'uploads/content/' . $filename . '.' . $mimetype;
                    // $filepath = 'assets/uploads/content/' . $filename . '.' . $mimetype;
                    // $filepath = str_replace('/', DIRECTORY_SEPARATOR, $filepath);

                    // dd($filepath);
                    // $filepath = public_path('assets/uploads/content/') . $filename;

                    // dd(public_path());
                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                        // resize if required
                        //->resize(300, 200)
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save(public_path($filepath));
                    // dd($image);
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                }
            }
            // dd('abc');
            $html_cut = preg_replace('~<(?:!DOCTYPE|/?(?:html|body|head|meta))[^>]>\s~i', '', $dom->saveHTML());
            return $html_cut;
        } else {
            return $details;
        }
    }

}