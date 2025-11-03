<?php

use App\Http\Controllers\Backend\ActivitiesController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\ShopController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;


## Protected Route @ Admin Dashboard Home
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

### Protected Route @ Admin Profile & Password Pages Start
Route::middleware(['auth'])->group(function () {

    ## Profile & Password Pages
    Route::get('admin/profile/page', [AdminController::class, 'AdminProfilePage'])->name('admin.profile.page');
    Route::get('admin/password/change/page', [AdminController::class, 'AdminPasswordChangePage'])->name('admin.password.change.page');

    ## Profile & Password Update
    Route::post('admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
    Route::post('admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    ## New Memember Registration
    Route::get('admin/register/page', [AdminController::class, 'RegisterNewMember'])->name('admin.register.page');
    Route::post('admin/register/store', [AdminController::class, 'store'])->name('admin.register.store');

    Route::get('admin/status/toggle/{id}', [AdminController::class, 'toggleStatus'])->name('admin.toggle.status');

    ## Category
    Route::get('admin/category/index',  [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');

    Route::post('admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::post('admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('admin/category/status/toggle/{id}', [CategoryController::class, 'toggleStatus'])->name('admin.category.toggle.status');


















    ## Member
    Route::get('admin/member/list', [MemberController::class, 'index'])->name('admin.member.list');
    Route::get('admin/member/details/{id}', [MemberController::class, 'details'])->name('admin.member.details');
    Route::get('admin/member/status/{id}', [MemberController::class, 'toggleStatus'])->name('admin.member.status');
    Route::post('admin/member/destroy/{id}', [MemberController::class, 'destroy'])->name('admin.member.destroy');


    ## Slider
    Route::get('admin/slider/index',  [SliderController::class, 'index'])->name('admin.slider.index');
    Route::get('admin/slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
    Route::get('admin/slider/edit/{id}', [SliderController::class, 'edit'])->name('admin.slider.edit');
    Route::post('admin/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::post('admin/slider/update/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
    Route::post('admin/slider/destroy/{id}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
    Route::get('admin/slider/status/toggle/{id}', [SliderController::class, 'toggleStatus'])->name('admin.slider.toggle.status');


    ## Activities
    Route::get('admin/activities/index',  [ActivitiesController::class, 'index'])->name('admin.activities.index');
    Route::get('admin/activities/create', [ActivitiesController::class, 'create'])->name('admin.activities.create');
    Route::get('admin/activities/edit/{id}', [ActivitiesController::class, 'edit'])->name('admin.activities.edit');
    Route::post('admin/activities/store', [ActivitiesController::class, 'store'])->name('admin.activities.store');
    Route::post('admin/activities/update/{id}', [ActivitiesController::class, 'update'])->name('admin.activities.update');
    Route::post('admin/activities/destroy/{id}', [ActivitiesController::class, 'destroy'])->name('admin.activities.destroy');
    Route::get('admin/activities/status/toggle/{id}', [ActivitiesController::class, 'toggleStatus'])->name('admin.activities.toggle.status');
});
### Protected Route Admin Profile & Password Pages End



## Shop
Route::get('admin/shop/index',  [ShopController::class, 'index'])->name('admin.shop.index');
Route::get('admin/shop/create', [ShopController::class, 'create'])->name('admin.shop.create');
Route::get('admin/shop/edit/{id}', [ShopController::class, 'edit'])->name('admin.shop.edit');

Route::post('admin/shop/store', [ShopController::class, 'store'])->name('admin.shop.store');
Route::post('admin/shop/update/{id}', [ShopController::class, 'update'])->name('admin.shop.update');
Route::post('admin/shop/destroy/{id}', [ShopController::class, 'destroy'])->name('admin.shop.destroy');

Route::get('admin/shop/status/toggle/{id}', [ShopController::class, 'toggleStatus'])->name('admin.shop.toggle.status');














###################### Frontend Route
###################### Frontend Route
###################### Frontend Route



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';




###################### Admin Route
###################### Admin Route
###################### Admin Route

## SiteSetting
Route::get('/settings/create', [SiteSettingController::class, 'create'])->name('settings.create');
Route::post('/settings/update', [SiteSettingController::class, 'update'])->name('settings.update');


Route::get('/locations/{type}/{id?}', [LocationController::class, 'getData']);
