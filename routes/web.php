<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route bawaan Laravel Breeze untuk login, register, dll
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/export-pdf', [PostController::class, 'exportPDF'])->name('profile.export-pdf');
    Route::resource('posts', PostController::class);
});


// Semua route Vue diarahkan ke layout SPA
Route::get('/{any}', function () {
    return view('layout'); // <== ini blade yg isinya mount Vue
})->where('any', '.*');
