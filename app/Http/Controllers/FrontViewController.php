<?php

namespace App\Http\Controllers;

use App\Models\Mvc;
use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Client;
use App\Models\Advisor;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use App\Models\Welcome;
use App\Models\Category;
use App\Models\BackImage;
use App\Models\CoverImage;
use App\Models\Sitesetting;
use App\Models\Testimonial;

// use App\Http\Controllers\PostController;
// use App\Http\Controllers\CategoryController;


use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Models\InstagramPost;

class FrontViewController extends Controller
{

    public function index()
    {
        // dd('fav');
        $backimages = PhotoGallery::latest()->get();
        $categories = Category::latest()->get()->take(10);
        $coverimages = CoverImage::latest()->get()->take(5);
        $photogallerys = PhotoGallery::latest()->get()->take(6);
        $posts = Post::with('getCategories')->latest()->get()->take(6);
        $categorieson = Category::with([
            'getPosts' => function ($query) {
                $query->latest()->take(6);
            }
        ])->whereIn('id', [1])->get();
        $categoriesone = Category::with([
            'getPosts' => function ($query) {
                $query->latest()->take(6);
            }
        ])->whereIn('id', [2])->get();


        $about = About::first();
        $services = Service::latest()->get()->take(6);

        // $sitesetting = SiteSetting::first();


        // Get the established year from the site setting
        // $establishedYear = $sitesetting->year;

        // Get the current year
        $currentYear = date('Y');

        // Calculate the number of years passed
        // $yearsPassed = $currentYear - $establishedYear;




        // $teams = Team::first()->get()->take(3);
        $testimonials = Testimonial::latest()->get()->take(15);

        $teams = Team::get()->take(6);


        $teamcount = Team::count();



        // Count Clients
        // $clientCount = Client::count();

        // Count Testimonials
        $testimonialCount = Testimonial::count();

        // Combine counts
        // $totalCount = $clientCount + $testimonialCount;

        // // Alternatively, you can use union to combine counts in a single query
        // $totalCount = Client::selectRaw('count(*) as count')
        //     ->union(Testimonial::selectRaw('count(*) as count'))
        //     ->sum('count');

        // $totalProject = $clientCount + $testimonialCount + $projectcount;




        return view('frontend.index', [
            'backimages' => $backimages,
            'categories' => $categories,
            'categorieson' => $categorieson,
            'categoriesone' => $categoriesone,

            'coverimages' => $coverimages,
            'photogallerys' => $photogallerys,
            'posts' => $posts,


            'about' => $about,
            'services' => $services,
            // 'sitesetting' => $sitesetting,

            'testimonials' => $testimonials,

            'teams' => $teams,
            'teamcount' => $teamcount,
            // 'projectcount' => $projectcount,
            // 'clientcount' => $clientcount,
            // 'totalCount' => $totalCount,

            // 'totalProject' => $totalProject,
            // 'yearsPassed' => $yearsPassed,
        ]);
    }

    // public function postByCategory($id)
    // {
    //     $category = Category::where('id', $category_id)->first();
    //     if ($category) {
    //         $post = Post::where('category_id', $category->id)->get();
    //         return view('index');
    //     } else {
    //         return redirect('/');
    //     }
    //     $posts = $category->posts;
    //     return $posts;
    // }

    // public function categoryByPost($id)
    // {
    //     $post = Post::find($id);
    //     $categories = $post->categories;
    //     return $categories;
    // }


}