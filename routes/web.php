<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\CoverImageController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VisitorBookController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\StudentDetailController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\BlogPostsCategoryController;

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

// Frontend routes
Route::get('/index', [FrontViewController::class, 'index'])->name('index');
Route::post('/contactpage', [ContactController::class, 'store'])->name('Contact.store');
Route::get('/services', [FrontViewController::class, 'render_services'])->name('services');

// Authentication routes
Auth::routes();

// Backend routes with prefix and middleware
Route::prefix('/admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Site settings
    Route::resource('site-settings', SiteSettingController::class);

    // Cover images
    Route::resource('cover-images', CoverImageController::class);

    // About us
    Route::resource('about-us', AboutController::class);

    // Services
    Route::resource('services', ServiceController::class);

    // Categories
    Route::resource('categories', CategoryController::class);

    // Posts
    Route::resource('posts', PostController::class);

    // Photo galleries
    Route::resource('photo-galleries', PhotoGalleryController::class);

    // Video galleries
    Route::resource('video-galleries', VideoGalleryController::class);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class);

    // Visitor books
    Route::resource('visitors-book', VisitorBookController::class);

    // Blog posts categories
    Route::resource('blog-posts-categories', BlogPostsCategoryController::class);

    // Courses
    Route::resource('courses', CourseController::class);

    // Teams
    Route::resource('teams', TeamController::class);

    // FAQs
    Route::resource('faqs', FaqController::class);

    // Countries
    Route::resource('countries', CountryController::class);

    // Universities
    Route::resource('universities', UniversityController::class);

    // Student details
    Route::resource('student-details', StudentDetailController::class);

    // Contact
    Route::resource('contacts', ContactController::class);

    // Favicon controller
    Route::resource('favicons', FaviconController::class);

});

    Route::get('/blogs', [FrontViewController::class, 'blogs'])->name('blogs.index');

    Route::get('/news', [FrontViewController::class, 'news'])->name('news.index');





