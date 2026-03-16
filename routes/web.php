<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('pages.home.index');
})->name('home');

Route::resource('/projects', ProjectController::class);

Route::get('/about', function () {
    return view('pages.about.index');
})->name('about');

Route::resource('/blog', BlogController::class);
Route::resource('/contact', ContactController::class);
