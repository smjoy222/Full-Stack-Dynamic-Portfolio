<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

// Portfolio routes with database integration
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/work', [PortfolioController::class, 'work'])->name('work');
Route::get('/project', [PortfolioController::class, 'projects'])->name('projects');

// API routes for AJAX requests
Route::prefix('api')->group(function () {
    Route::get('/projects', [PortfolioController::class, 'apiProjects']);
    Route::get('/skills', [PortfolioController::class, 'apiSkills']);
    Route::get('/education', [PortfolioController::class, 'apiEducation']);
    Route::get('/experiences', [PortfolioController::class, 'apiExperiences']);
    Route::get('/achievements', [PortfolioController::class, 'apiAchievements']);
});

// Keep the original lp1 route if needed
Route::get('/lp1', function () {
    return view('lp1');
});