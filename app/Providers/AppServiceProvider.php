<?php

namespace App\Providers;

use App\Models\Favicon;
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
    }
}
