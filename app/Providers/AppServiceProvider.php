<?php

namespace App\Providers;

use App\Models\BlogPostsCategory;
use App\Models\Course;
use App\Models\Country;
use App\Models\Favicon;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\University;
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
        // $favicon = Favicon::latest()->get()->take(1);
        // // dd($favicon);
        // View::share('favicon', $favicon);
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
        });

        view()->composer('frontend.includes.footer', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }

}
