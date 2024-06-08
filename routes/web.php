<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSettingController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\PortofolioItem;
use App\Http\Controllers\Admin\PortofolioItemController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Models\ContactSectionSetting;
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
Route::get('blog-details/{id}',[HomeController::class,'showBlog'])->name('show.blog');
Route::get('blogs',[HomeController::class,'blog'])->name('blog');
Route::post('contact',[HomeController::class,'contact'])->name('contact');
Route::get('resume/download',[AboutController::class,'resumeDownload'])->name('resume.download');

// admin  routes
Route::group(
    ['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        Route::resource('hero',HeroController::class);
        Route::resource('typer-title',TyperTitleController::class);
        Route::resource('service',ServiceController::class);
        Route::resource('about',AboutController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('portofolio-item', PortofolioItemController::class);
        Route::resource('portfolio-section-setting',PortfolioSectionSettingController::class);
        Route::resource('skill-section-setting',SkillSectionSettingController::class);
        Route::resource('skill-item',SkillItemController::class);
        Route::resource('experience',ExperienceController::class);
        Route::resource('feedback',FeedbackController::class);
        Route::resource('feedback-setting',FeedbackSettingController::class);
        Route::resource('blog-category',BlogCategoryController::class);
        Route::resource('blog',BlogController::class);
        Route::resource('blog-section-setting',BlogSectionSettingController::class);
        Route::resource('contact-section-setting',ContactSectionSettingController::class);
        Route::resource('footer-social',FooterSocialLinkController::class);
        Route::resource('footer-info',FooterInfoController::class);
        Route::resource('footer-contact-info',FooterContactInfoController::class);
        Route::resource('footer-useful-link',FooterUsefulLinkController::class);
        Route::get('setting',SettingController::class)->name('setting.index');
        Route::resource('general-setting',GeneralSettingController::class);
        Route::resource('seo-setting',SeoSettingController::class);


    }
);
