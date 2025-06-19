<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/education', function () {
//     return view('education'); // will look for resources/views/education.blade.php
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/work', function () {
    return view('work');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/lp1', function () {
    return view('lp1');
});