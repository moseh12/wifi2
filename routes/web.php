<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UserMessageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/{any}', [FrontendController::class, 'index'])->where('any', '.*');
Route::get('/{any}/{any1}', [FrontendController::class, 'index'])->where(['any' => '.*', 'any1' => '.*']);

// Admin Panel Routes
Route::prefix('admin/panel/')->group(function() {
    Auth::routes();
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [AdminController::class, 'index'])->name('home');

    Route::resource('slider', SliderController::class)->only(['index', 'store', 'edit', 'update']);
    Route::get('slider/{slider}', [SliderController::class, 'destroy'])->name('slider.delete');

    Route::resource('service', ServiceController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('service/show/{service}', [ServiceController::class, 'show'])->name('service.view');
    Route::get('service/{service}', [ServiceController::class, 'destroy'])->name('service.delete');

    Route::resource('package', PackageController::class);
    Route::get('package/{package}', [PackageController::class, 'destroy'])->name('package.delete');
    Route::get('package/{package}/show', [PackageController::class, 'show'])->name('package.show');

    Route::resource('teamMember', TeamMemberController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('teamMember/{teamMember}', [TeamMemberController::class, 'destroy'])->name('teamMember.delete');

    Route::resource('gallery', GalleryController::class)->only(['index', 'store']);
    Route::get('gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.delete');

    Route::get('welcome_note', [GeneralController::class, 'welcome_note_page'])->name('welcome.note');
    Route::get('company_profile', [GeneralController::class, 'company_profile_page'])->name('company.profile');
    Route::get('aboutUs', [GeneralController::class, 'about_us_page'])->name('aboutUs');
    Route::get('coverage', [GeneralController::class, 'coverage_page'])->name('coverage');
    Route::get('corporate', [GeneralController::class, 'corporate_page'])->name('corporate');
    Route::get('billing', [GeneralController::class, 'billing_page'])->name('billing');
    Route::get('support', [GeneralController::class, 'support_page'])->name('support');
    Route::post('general/store', [GeneralController::class, 'store'])->name('general.store');

    Route::get('contact', [ContactUsController::class, 'index'])->name('contactUs.index');
    Route::post('contact', [ContactUsController::class, 'store'])->name('contactUs.store');
    Route::get('contact/create', [ContactUsController::class, 'create'])->name('contactUs.create');
    Route::get('contact/edit/{contact}', [ContactUsController::class, 'edit'])->name('contactUs.edit');
    Route::get('contact/show/{contact}', [ContactUsController::class, 'show'])->name('contactUs.show');
    Route::post('contact/{contact}', [ContactUsController::class, 'update'])->name('contactUs.update');
    Route::get('contact/{contact}', [ContactUsController::class, 'destroy'])->name('contactUs.delete');

    Route::get('user-message', [UserMessageController::class, 'index'])->name('user.message');
});
