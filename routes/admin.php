<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ShopController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\ProfileController;
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
