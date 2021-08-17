<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', [Controllers\ListingController::class, 'index'])
    ->name('listings.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/{listing}', [Controllers\ListingController::class, 'show'])
    ->name('listings.show');

Route::get('/{listing}/apply', [Controllers\ListingController::class, 'apply'])
    ->name('listings.apply');
