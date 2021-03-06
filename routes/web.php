<?php

use App\Http\Controllers\Admin\Api\PostGallerySessionController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackPageController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MainHeaderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostGalleryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LanguageHomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController as AdminController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::as('user.')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/{language:code}/home', [LanguageHomeController::class, 'index'])->name('language.home');
    Route::get('/{language:code}/category/{category:slug}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category');
    Route::get('/{language:code}/category/{category:slug}/projects/{post:slug}', [ProjectController::class, 'show'])->name('post.show');
    Route::get('/{language:code}/projects', [ProjectController::class, 'index'])->name('our-projects');
    Route::get('/{language:code}/contacts', [\App\Http\Controllers\ContactController::class, 'show'])->name('contacts');
    Route::get('/{language:code}/feedback', [\App\Http\Controllers\FeedbackController::class, 'show'])->name('feedback');
    Route::post('/feedback', [\App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');
});


Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

/* Routes for Administrative Management */
// Admins without Authentication
Route::prefix('/admin')->as('admin.')->namespace('Admin')->group(function(){
    //Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// Admins with Authentication
Route::prefix('/admin')->as('admin.')->middleware('auth:admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::namespace('Api')->group(function (){
        Route::post('/post-gallery', [PostGallerySessionController::class, 'store']);
    });
    Route::resource('static/banners', BannerController::class)->except(['edit', 'create']);
    Route::resource('categories', CategoryController::class)->except(['edit', 'create']);
    Route::resource('static/contacts', ContactController::class)->except(['edit', 'create']);
    Route::resource('feedbacks', FeedbackController::class)->except(['create, edit', 'store']);
    Route::resource('static/page-feedback', FeedbackPageController::class)->except(['create', 'edit']);
    Route::resource('static/main/footer', FooterController::class)->except(['edit', 'create']);
    Route::resource('languages', LanguageController::class)->except(['edit', 'create', 'show']);
    Route::resource('static/main/header', MainHeaderController::class)->except(['edit', 'create']);
    Route::resource('posts', PostController::class)->except(['edit', 'create']);
    Route::resource('posts/gallery', PostGalleryController::class)->except(['index', 'edit', 'create', 'show', 'update']);
    Route::resource('users', UserController::class)->except(['edit', 'create']);
});
