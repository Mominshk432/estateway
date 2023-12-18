<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AboutSettingsController;
use App\Http\Controllers\Admin\GlobalController as AdminGlobalController;
use App\Http\Controllers\BlogsController as WebBlogsController;
use App\Http\Controllers\Admin\TestimonialsController as AdminTestimonialController;
use App\Http\Controllers\Admin\SeoSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [GlobalController::class, 'homepage'])->name('homepage');
Route::get('/about-us', [GlobalController::class, 'about'])->name('about');
Route::get('/sitemap', [GlobalController::class, 'sitemap'])->name('sitemap');
Route::get('/contact-us', [GlobalController::class, 'contact'])->name('contact');
Route::get('/privacy-policy',function () {
    return view('frontend.privacy-policy');
})->name('privacy-policy');
Route::post('/contact-us-post', [GlobalController::class, 'contactPost'])->name('contact.post');
Route::post('/site-visit-post', [GlobalController::class, 'storeSiteVisit'])->name('site.visit.post');
Route::post('/global-search', [GlobalController::class, 'global_search'])->name('global.search');

Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'projects'])->name('projects');
    Route::get('/{projectSlug}', [ProjectController::class, 'project_single'])->name('project.single');
});

Route::prefix('blogs')->group(function () {
    Route::get('/', [WebBlogsController::class, 'blogs'])->name('blogs');
    Route::get('/{blogSlug}', [WebBlogsController::class, 'blog_single'])->name('blogs.single');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('admin.dashboard');
    Route::get('/site-visits', [AdminGlobalController   ::class, 'site_visits'])->name('admin.site_visits');
    Route::post('/save-seo-setting', [SeoSettingsController::class, 'saveSeoSetting'])->name('admin.saveSeoSetting');

    Route::prefix('homepage')->group(function () {
        Route::get('/slider-settings', [HomepageController::class, 'getSliderSettings'])->name('admin.homepageSliderSettings');
        Route::post('/store-slider', [HomepageController::class, 'storeSlider'])->name('admin.storeSlider');
        Route::post('/update-slider', [HomepageController::class, 'updateSlider'])->name('admin.updateSlider');
        Route::post('/delete-slider', [HomepageController::class, 'deleteSlider'])->name('admin.deleteSlider');
        Route::get('/seo-settings', [HomepageController::class, 'getHomePageSeoSettings'])->name('admin.homepage.seo');
    });

    Route::prefix('testimonials')->group(function () {
        Route::get('/', [AdminTestimonialController::class, 'testimonials'])->name('admin.testimonials');
        Route::post('/add', [AdminTestimonialController::class, 'add'])->name('admin.testimonial.add');
        Route::post('/update', [AdminTestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::post('/delete', [AdminTestimonialController::class, 'delete'])->name('admin.testimonial.delete');
    });

    Route::prefix('footer')->group(function () {
        Route::get('/', [AdminGlobalController::class, 'getFooterSettings'])->name('admin.footer_settings');
        Route::post('/save', [AdminGlobalController::class, 'saveFooterSettings'])->name('admin.footer_settings.save');
    });

    Route::prefix('contact')->group(function () {
        Route::get('/', [AdminGlobalController::class, 'get_contact_setting'])->name('admin.contact_settings');
        Route::post('/save', [AdminGlobalController::class, 'save_contact_settings'])->name('admin.contact_settings.save');
    });

    Route::prefix('blogs')->group(function () {
        Route::get('/add', [BlogsController::class, 'add'])->name('admin.blogs.add');
        Route::post('/store', [BlogsController::class, 'store'])->name('admin.blogs.store');
        Route::get('/list', [BlogsController::class, 'list'])->name('admin.blogs.list');
        Route::get('/edit/{slug}', [BlogsController::class, 'edit'])->name('admin.blogs.edit');
        Route::post('/update', [BlogsController::class, 'update'])->name('admin.blogs.update');
        Route::post('/delete', [BlogsController::class, 'delete'])->name('admin.blogs.delete');
        Route::get('/seo-settings', [BlogsController::class, 'getBlogPageSeoSettings'])->name('admin.blogs.seo');
    });

    Route::prefix('projects')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('/list', [CategoryController::class, 'list'])->name('admin.category.list');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::post('/update', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::post('/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
        });

        Route::get('/add', [ProjectsController::class, 'add'])->name('admin.project.add');
        Route::post('/store', [ProjectsController::class, 'store'])->name('admin.project.store');
        Route::get('/list', [ProjectsController::class, 'list'])->name('admin.project.list');
        Route::get('/edit/{slug}', [ProjectsController::class, 'edit'])->name('admin.project.edit');
        Route::post('/update', [ProjectsController::class, 'update'])->name('admin.project.update');
        Route::post('/delete', [ProjectsController::class, 'delete'])->name('admin.project.delete');
        Route::get('/seo-settings', [ProjectsController::class, 'getProjectsPageSeo'])->name('admin.project.seo');
        Route::get('/statuses', [ProjectsController::class, 'statusList'])->name('admin.project.statuses');
        Route::post('/add-status', [ProjectsController::class, 'addStatus'])->name('admin.project.statuses.add');
        Route::post('/update-status', [ProjectsController::class, 'updateStatus'])->name('admin.project.statuses.update');
        Route::post('/delete-status', [ProjectsController::class, 'deleteStatus'])->name('admin.project.statuses.delete');

    });

    Route::prefix('my-profile')->group(function () {
        Route::get('/', [ProfileController::class, 'getMyProfile'])->name('admin.profile');
        Route::post('/update', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('admin.profile.changePassword');
    });

    Route::prefix('about-us')->group(function () {
        Route::get('/', [AboutSettingsController::class, 'aboutSettings'])->name('admin.about');
        Route::post('/update', [AboutSettingsController::class, 'update_about_us'])->name('admin.aboutUs.update');
        Route::post('/update/director-message', [AboutSettingsController::class, 'update_director_message'])->name('admin.directorMsg.update');
        Route::post('/update/why-choose-us', [AboutSettingsController::class, 'update_why_choose_us'])->name('admin.whyChoseUs.update');
        Route::post('/update/our-moto', [AboutSettingsController::class, 'update_our_moto'])->name('admin.our_moto.update');
    });
});
