<?php

use App\Http\Controllers\FaviconController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VideoGalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoverImageController;
use App\Http\Controllers\SiteSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});


Route::prefix('/admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // For Sitesetting
    Route::resource('site-settings', SiteSettingController::class);

    // For Cover Image
    Route::resource('cover-images', CoverImageController::class);
    // Route::get('cover-images', [CoverImageController::class, 'index'])->name('cover-images.index');
    // Route::get('cover-images/create', [CoverImageController::class, 'create'])->name('cover-images.create');
    // Route::post('cover-images', [CoverImageController::class, 'store'])->name('cover-images.store');
    // Route::get('cover-images/{id}', [CoverImageController::class, 'show'])->name('cover-images.show');
    // Route::get('cover-images/{id}/edit', [CoverImageController::class, 'edit'])->name('cover-images.edit');
    // Route::put('cover-images/{id}', [CoverImageController::class, 'update'])->name('cover-images.update');
    // Route::delete('cover-images/{id}', [CoverImageController::class, 'destroy'])->name('cover-images.destroy');

    // For About
    Route::resource('about-us', AboutController::class);

    // For Services
    Route::resource('services', ServiceController::class);

    // For Favicon
    Route::resource('favicons', FaviconController::class);

    // For Gallery
    Route::resource('photo-galleries', PhotoGalleryController::class);
    Route::resource('video-galleries', VideoGalleryController::class);
});