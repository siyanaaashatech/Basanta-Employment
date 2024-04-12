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

    // Check if Laravel is running in the console
    if (!app()->runningInConsole()) {
        $favicon = Favicon::latest()->first();
        View::share('favicon', $favicon);

        $sitesetting = SiteSetting::first();
        View::share('sitesetting', $sitesetting);

        // Other view composers can be added here in the same way
        View::composer('frontend.includes.navbar', function ($view) {
            $countries = Country::all();
            $testimonials = Testimonial::all();
            $courses = Course::all();
            $categories = Category::all();
            $blogpostcategories = BlogPostsCategory::all();
            $sitesetting = SiteSetting::first();

            $view->with([
                'countries' => $countries,
                'testimonials' => $testimonials,
                'courses' => $courses,
                'categories' => $categories,
                'blogpostcategories' => $blogpostcategories,
                'sitesetting' => $sitesetting
            ]);
        });

        view()->composer('frontend.includes.footer', function ($view) {
            $services = Service::all();
            $categories = Category::all();
            $courses = Course::all();
            $siteSettings = SiteSetting::first();
            $about = About::first();

            $view->with([
                'services' => $services,
                'courses' => $courses,
                'siteSettings' => $siteSettings,
                'categories' => $categories,
                'about' => $about,
                'sitesetting' => SiteSetting::first(),
            ]);
        });
    }
    }

}
