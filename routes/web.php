<?php

use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminPesanController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeBlogController;
use App\Http\Controllers\HomeContactController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/services', [HomeController::class, 'service']);

Route::get('/blog', [HomeBlogController::class, 'index']);
Route::get('/blog/show/{id}', [HomeBlogController::class, 'show']);

Route::get('/contact', [HomeContactController::class, 'index']);
Route::post('/contact/send', [HomeContactController::class, 'send']);

Route::get('/login',[AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do',[AdminAuthController::class, 'dologin']);

// =====ADMIN====
Route::prefix('/admin')->middleware('auth')->group(function() {

    Route::get('/logout',[AdminAuthController::class,'logout']);

    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    Route::get('/about', [AdminAboutController::class, 'index']);
    Route::put('/about/update', [AdminAboutController::class, 'update']);

    Route::resource('/posts/blog', AdminBlogController ::class);
    Route::resource('/posts/kategori', AdminKategoriController ::class);


    Route::resource('/pesan', AdminPesanController::class);
    Route::resource('/service', AdminServiceController::class);
    Route::resource('/banner', AdminBannerController::class);
    Route::resource('/user', AdminUserController::class);
});
