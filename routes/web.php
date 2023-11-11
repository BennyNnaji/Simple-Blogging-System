<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Admin Controllers Start
Route::middleware('auth', 'admin' )->group(function () {

// Admin Dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Pages
//Route::get('/admin/pages/about', [PagesController::class, 'index'])->name('admin.about.index');
Route::get('/admin/pages/about', [PagesController::class, 'about_edit'])->name('admin.about');
Route::put('/admin/pages/about', [PagesController::class, 'about_update'])->name('admin.about.update');
Route::get('/admin/pages/contact', [PagesController::class, 'contact_edit'])->name('admin.contact');
Route::post('/admin/pages/contact', [PagesController::class, 'contact_update'])->name('admin.contact.update');
Route::get('/admin/pages/terms', [PagesController::class, 'terms_edit'])->name('admin.terms');
Route::post('/admin/pages/terms', [PagesController::class, 'terms_update'])->name('admin.terms.update');
Route::get('/admin/pages/privacy', [PagesController::class, 'privacy_edit'])->name('admin.privacy');
Route::post('/admin/pages/privacy', [PagesController::class, 'privacy_update'])->name('admin.privacy.update');


//category
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/create', [CategoryController::class, 'store'])->name('admin.categories.create');
Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

//Posts
Route::get('/admin/posts', [BlogController::class, 'index'])->name('admin.posts');
Route::get('/admin/posts/create', [BlogController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/posts/create', [BlogController::class, 'store'])->name('admin.posts.store');
Route::get('/admin/posts/{id}/edit', [BlogController::class, 'edit'])->name('admin.posts.edit');
Route::put('/admin/posts/{blog}', [BlogController::class, 'update'])->name('admin.posts.update');
//Route::delete('/admin/posts/{id}', [BlogController::class, 'destroy'])->name('admin.posts.destroy');
Route::delete('/admin/posts/{id}', [BlogController::class, 'destroy'])->name('admin.posts.destroy');

});



require __DIR__.'/auth.php';


// Front page
//Route::get('/{frontpage}', [BlogController::class, 'frontpage'])->name('frontpage');
Route::get('/', [FrontPageController::class, 'index'])->name('frontpage');
Route::get('/posts/{slug}', [BlogController::class, 'show'])->name('blog.details');
Route::post('/posts/{slug}', [CommentController::class, 'store'])->name('comment');
Route::get('/categories/{category}', [FrontPageController::class, 'category'])->name('front-cate');
Route::get('/search', [FrontPageController::class, 'search'])->name('search');
Route::get('/about', [FrontPageController::class, 'about'])->name('about');
Route::get('/contact', [FrontPageController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontPageController::class, 'sendMail'])->name('sendMail');
Route::get('/terms', [FrontPageController::class, 'terms'])->name('terms');
Route::get('/privacy', [FrontPageController::class, 'privacy'])->name('privacy');

//Auth::routes();


