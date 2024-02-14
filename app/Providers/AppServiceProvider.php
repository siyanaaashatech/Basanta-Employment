<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Course;
use App\Models\Favicon;
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
            $view->with('countries', $countries);
        });

        View::composer('frontend.includes.navbar', function ($view) {
            $universities = University::all();
            $view->with('universities', $universities);
        });

        View::composer('frontend.includes.navbar', function ($view) {
            $courses = Course::all();
            $view->with('courses', $courses);
        });
    }

}
