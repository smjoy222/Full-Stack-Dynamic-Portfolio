<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\EducationAdminController;
use App\Http\Controllers\Admin\SkillAdminController;
use App\Http\Controllers\Admin\ProjectAdminController;
use App\Http\Controllers\Admin\ExperienceAdminController;
use App\Http\Controllers\Admin\AchievementAdminController;
use App\Http\Controllers\Admin\InfoAdminController;
use App\Http\Controllers\Admin\PersonalDetailAdminController;
use App\Http\Controllers\Admin\ProfileController;

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

Route::get('/skills', [SkillsController::class, 'scrollToSkills'])->name('skills');

Route::get('/edu', [EducationController::class, 'index']);

Route::get('/experience', [ExperienceController::class, 'index'])->name('experience');

Route::get('/achievement', [AchievementController::class, 'index'])->name('achievement');

Route::get('/project', [ProjectController::class, 'index'])->name('project');

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthenticationController::class, 'login'])->name('login.attempt');

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    // Admin profile routes
    Route::get('/admin/profile', [ProfileController::class, 'show'])->name('admin.profile');
    Route::put('/admin/profile', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
    Route::put('/admin/profile/password', [ProfileController::class, 'updatePassword'])->name('admin.profile.password');
    // Admin CRUD routes
    Route::resource('/admin/education', EducationAdminController::class)
        ->parameters(['education' => 'education'])->names('education');
    Route::resource('/admin/skills', SkillAdminController::class)
        ->parameters(['skills' => 'skill'])->names('skills');
    Route::resource('/admin/projects', ProjectAdminController::class)
        ->parameters(['projects' => 'project'])->names('projects');
    Route::resource('/admin/experiences', ExperienceAdminController::class)
        ->parameters(['experiences' => 'experience'])->names('experiences');
    Route::resource('/admin/achievements', AchievementAdminController::class)
        ->parameters(['achievements' => 'achievement'])->names('achievements');
    Route::resource('/admin/infos', InfoAdminController::class)
        ->parameters(['infos' => 'info'])->names('infos');
    Route::resource('/admin/personal-details', PersonalDetailAdminController::class)
        ->parameters(['personal-details' => 'personal_detail'])->names('personal_details');
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});
