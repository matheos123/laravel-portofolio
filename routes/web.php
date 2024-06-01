<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\PortofolioItem;
use App\Http\Controllers\Admin\PortofolioItemController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\FrontEnd\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/blog', function () {
    return view('frontend.blog');
});
Route::get('/blogdetails', function () {
    return view('frontend.blogdetails');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

require __DIR__ . '/auth.php';

Route::get('portfolio-details/{id}',[HomeController::class,'showPortfolio'])->name('show.portfolio');


// admin  routes
Route::group(
    ['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        Route::resource('hero',HeroController::class);
        Route::resource('typer-title',TyperTitleController::class);
        Route::resource('service',ServiceController::class);

        // About Resource
        Route::get('resume/download',[AboutController::class,'resumeDownload'])->name('resume.download');
        Route::resource('about',AboutController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('portofolio-item', PortofolioItemController::class);
        
        Route::resource('portfolio-section-setting',PortfolioSectionSettingController::class);

        // Skill Section Route
        Route::resource('skill-section-setting',SkillSectionSettingController::class);
        Route::resource('skill-item',SkillItemController::class);
        Route::resource('experience',ExperienceController::class);
    }
);
