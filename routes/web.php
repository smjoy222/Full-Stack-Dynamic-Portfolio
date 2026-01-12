<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Static Portfolio Website
|--------------------------------------------------------------------------
|
| All routes now serve static views. No database, no admin panel.
|
*/

// Main pages
Route::get('/', function () {
    return view('welcome');
});

Route::get('/skills', function () {
    return redirect('/#skills');
})->name('skills');

Route::get('/edu', function () {
    return view('edu');
});

Route::get('/experience', function () {
    return view('experience');
})->name('experience');

Route::get('/achievement', function () {
    return view('achievement');
})->name('achievement');

Route::get('/project', function () {
    return view('project');
})->name('project');

Route::get('/about', function () {
    return view('about');
});
