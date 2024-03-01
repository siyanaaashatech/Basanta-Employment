<?php

namespace App\Providers;

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
        // $favicon = Favicon::latest()->first();
        // View::share('favicon', $favicon);

        $favicon = Favicon::first();
        // dd($favicon);
        View::share('favicon', $favicon);




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
            $testPreparationPosts = Category::where('title', 'Test Prepration')->first()->posts;
            $livingAbroadPosts = Category::where('title', 'Living Abroad')->first()->posts;


            $view->with('countries', $countries);
            $view->with('testimonials', $testimonials);
            $view->with('courses', $courses);
            $view->with('categories', $categories);
            $view->with('blogpostcategories', $blogpostcategories);
            $view->with('testPreparationPosts', $testPreparationPosts);
            $view->with('livingAbroadPosts', $livingAbroadPosts);
            $view->with('sitesetting', $sitesetting);
        });

        ////Global variable for Footer
        view()->composer('frontend.includes.footer', function ($view) {
            $sitesetting = SiteSetting::first();
            $counsellingCategory = Category::where('title', 'Counselling')->first();
            $counsellingPosts = $counsellingCategory->posts()->take(2)->get();
            $newsCategory = Category::where('title', 'News')->first();
            $livingAbroadPosts = Category::where('title', 'Living Abroad')->first()->posts;
            $services = Service::all();
            $courses = Course::all();
            $siteSettings = SiteSetting::first();


            $view->with('sitesetting', $sitesetting);
            $view->with('counsellingPosts', $counsellingPosts);
            $view->with('newsCategory', $newsCategory);
            $view->with('livingAbroadPosts', $livingAbroadPosts);
            $view->with('services', $services);
            $view->with('courses', $courses);
            $view->with('siteSettings', $siteSettings);
        });
    }

}
