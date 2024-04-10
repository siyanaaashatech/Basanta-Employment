<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Course;
use App\Models\Country;
use App\Models\Favicon;
use App\Models\Service;
use App\Models\Category;
use App\Models\University;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\BlogPostsCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $favicon = Favicon::latest()->first();
        View::share('favicon', $favicon);


        $favicon = Favicon::first();
        View::share('favicon', $favicon);

  
        $sitesetting = SiteSetting::first();
        View::share('sitesetting', $sitesetting);




        View::composer('frontend.includes.topnav', function ($view) {
            $sitesetting = SiteSetting::first();

            $view->with('sitesetting', $sitesetting);

        });




        //Global variable for Navbar
        View::composer('frontend.includes.navbar', function ($view) {
            $countries = Country::all();
            $testimonials = Testimonial::all();
            $courses = Course::all();
            $categories = Category::all();
            $blogpostcategories = BlogPostsCategory::all();
            // $livingAbroadPosts = Category::where('title', 'Living Abroad')->first()->posts;
            $sitesetting = SiteSetting::first();

            $view->with('countries', $countries);
            $view->with('testimonials', $testimonials);
            $view->with('courses', $courses);
            $view->with('categories', $categories);
            $view->with('blogpostcategories', $blogpostcategories);
            // $view->with('livingAbroadPosts', $livingAbroadPosts);
            $view->with('sitesetting', $sitesetting);
        });

        ////Global variable for Footer
        view()->composer('frontend.includes.footer', function ($view) {
            $sitesetting = SiteSetting::first();

            $services = Service::all();
            $categories = Category::all();
            $courses = Course::all();
            $siteSettings = SiteSetting::first();
            $about = About::first();


            $view->with('sitesetting', $sitesetting);

            // $view->with('livingAbroadPosts', $livingAbroadPosts);
            $view->with('services', $services);
            $view->with('courses', $courses);
            $view->with('siteSettings', $siteSettings);
            $view->with('categories', $categories);
            $view->with('about', $about);
        });
    }

}
