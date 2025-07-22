<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

// routes/web.php
Route::get('/hello', [ExampleController::class, 'sayHello']);
Route::get('/user', [UserController::class, 'index'])->middleware('auth.login');

Route::get('/profile/export-pdf', [PostController::class, 'exportPDF'])->name('profile.export-pdf');

Route::resource('posts', PostController::class);

Route::get('/{any}', function () {
    return view('layout'); // satu-satunya Blade yang digunakan
})->where('any', '.*');