<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/', WebsiteController::class)
    ->name('website');

Route::get('search', [WebsiteController::class, 'search'])
    ->name('search');

Route::get('category/{slug}', [WebsiteController::class, 'getByCategory'])
    ->name('posts.category');

Route::get('post/{slug}', [WebsiteController::class, 'single'])
    ->name('posts.single');
