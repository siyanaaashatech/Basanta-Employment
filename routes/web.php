<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\CoverImageController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VisitorBookController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\StudentDetailController;

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

// Frontend route for SingleController
// Route::get('/', [FrontViewController::class, 'index'])->name('index');
Route::get('/index', [FrontViewController::class, 'index'])->name('index');
Route::get('contactpage', [SingleController::class, 'render_contact'])->name('Contact');

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/contactpage', [ContactController::class, 'store'])->name('Contact.store');
// Route::get('admin/contact/index', [App\Http\Controllers\ContactController::class, 'index'])->name('Contact.index');


Route::get('/', function () {
    return redirect()->route('login');
});


//Backend routes with prefix and middleware
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

    //For Country
    Route::resource('countries', CountryController::class);

    //For University
    Route::resource('universities', UniversityController::class);

    //For Course
    Route::resource('courses', CourseController::class);

    //For Testimonial
    Route::resource('testimonials', TestimonialController::class);

    //For Visitor Books
    Route::resource('visitors-book', VisitorBookController::class);

    //For Students Detail
    Route::resource('student-details', StudentDetailController::class);

    //For Contact
    Route::resource('contacts', ContactController::class);




});