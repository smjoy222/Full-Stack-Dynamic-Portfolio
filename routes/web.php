<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/edu', [EducationController::class, 'index']);

Route::get('/project', function () {
    return view('project');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return redirect()->route('voyager.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/login', [AuthenticationController::class, 'login']);

Route::post('/register', [AuthenticationController::class, 'register']);

Route::middleware('auth')->group(function(){
    Route::get('/admin/dashboard', function(){
        return redirect()->route('voyager.dashboard');
    })->name('admin.dashboard');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
