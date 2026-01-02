<?php

use App\Http\Controllers\Backend\ActivitiesController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DonateController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\MemberListController;
use App\Http\Controllers\Backend\MyRoleController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\ReferController;
use App\Http\Controllers\Backend\ReferListController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShopController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SupportRequestController;
use App\Http\Controllers\Backend\VideoController;
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






    ## Refer IDs
    // Route::get('admin/refer/list/{id}', [ReferController::class, 'index'])->name('admin.refer.list');
    // Route::get('admin/refer/details/{id}', [ReferController::class, 'details'])->name('admin.refer.details');
    // Route::get('admin/refer/status/{id}', [ReferController::class, 'toggleStatus'])->name('admin.refer.status');
    // Route::post('admin/refer/destroy/{id}', [ReferController::class, 'destroy'])->name('admin.refer.destroy');










    ## Member
    Route::get('admin/member/list', [MemberController::class, 'index'])->name('admin.member.list');
    Route::get('admin/member/details/{id}', [MemberController::class, 'details'])->name('admin.member.details');
    Route::get('admin/member/status/{id}', [MemberController::class, 'toggleStatus'])->name('admin.member.status');
    Route::post('admin/member/destroy/{id}', [MemberController::class, 'destroy'])->name('admin.member.destroy');
    Route::post('admin/member/changeRole/{id}', [MemberController::class, 'changeRole'])->name('admin.member.changeRole');

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




## Role
Route::get('admin/role/index',  [MyRoleController::class, 'index'])->name('admin.role.index');
Route::get('admin/role/create', [MyRoleController::class, 'create'])->name('admin.role.create');
Route::get('admin/role/edit/{id}', [MyRoleController::class, 'edit'])->name('admin.role.edit');
Route::post('admin/role/store', [MyRoleController::class, 'store'])->name('admin.role.store');
Route::post('admin/role/update/{id}', [MyRoleController::class, 'update'])->name('admin.role.update');
Route::post('admin/role/destroy/{id}', [MyRoleController::class, 'destroy'])->name('admin.role.destroy');
Route::get('admin/role/status/toggle/{id}', [MyRoleController::class, 'toggleStatus'])->name('admin.role.toggle.status');
Route::post('admin/role/{id}/update-role', [MyRoleController::class, 'updateRole'])->name('admin.users.updateRole');


## Support Request
Route::get('admin/support/request/index',  [SupportRequestController::class, 'index'])->name('admin.support.request.index');
Route::get('admin/support/request/create', [SupportRequestController::class, 'create'])->name('admin.support.request.create');
Route::get('admin/support/request/edit/{id}', [SupportRequestController::class, 'edit'])->name('admin.support.request.edit');
Route::post('admin/support/request/store', [SupportRequestController::class, 'store'])->name('admin.support.request.store');
Route::post('admin/support/request/update/{id}', [SupportRequestController::class, 'update'])->name('admin.support.request.update');
Route::post('admin/support/request/destroy/{id}', [SupportRequestController::class, 'destroy'])->name('admin.support.request.destroy');
Route::get('admin/support/request/status/toggle/{id}', [SupportRequestController::class, 'toggleStatus'])->name('admin.support.request.toggle.status');
Route::post('admin/support/request/{id}/update-role', [SupportRequestController::class, 'updateRole'])->name('admin.support.users.updateRole');

## Donate
Route::get('admin/donate/index',  [DonateController::class, 'index'])->name('admin.donate.index');
// Route::get('admin/donate/create', [DonateController::class, 'create'])->name('admin.donate.create');
Route::get('admin/donate/edit/{id}', [DonateController::class, 'edit'])->name('admin.donate.edit');
Route::post('admin/donate/store', [DonateController::class, 'store'])->name('admin.donate.store');
Route::post('admin/donate/update/{id}', [DonateController::class, 'update'])->name('admin.donate.update');
Route::post('admin/donate/destroy/{id}', [DonateController::class, 'destroy'])->name('admin.donate.destroy');
Route::get('admin/donate/status/toggle/{id}', [DonateController::class, 'toggleStatus'])->name('admin.donate.toggle.status');
Route::post('admin/donate/{id}/update-role', [DonateController::class, 'updateRole'])->name('admin.support.users.updateRole');

## Setting
Route::get('admin/payment/setting/index',  [PaymentSettingController::class, 'index'])->name('admin.payment.setting.index');
Route::post('admin/payment/setting/update/{id}', [PaymentSettingController::class, 'update'])->name('admin.payment.setting.donate.update');

## Expense
Route::get('admin/expense/index',  [ExpenseController::class, 'index'])->name('admin.expense.index');
Route::get('admin/expense/create', [ExpenseController::class, 'create'])->name('admin.expense.create');
Route::get('admin/expense/edit/{id}', [ExpenseController::class, 'edit'])->name('admin.expense.edit');
Route::post('admin/expense/store', [ExpenseController::class, 'store'])->name('admin.expense.store');
Route::post('admin/expense/update/{id}', [ExpenseController::class, 'update'])->name('admin.expense.update');
Route::post('admin/expense/destroy/{id}', [ExpenseController::class, 'destroy'])->name('admin.expense.destroy');



## Member List
Route::get('admin/member/list/index',  [MemberListController::class, 'index'])->name('admin.member.list.index');



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













## Photo Gallery
Route::get('admin/photo/gallery/index',  [PhotoController::class, 'index'])->name('admin.photo.gallery.index');
Route::get('admin/photo/gallery/create', [PhotoController::class, 'create'])->name('admin.photo.gallery.create');
Route::get('admin/photo/gallery/edit/{id}', [PhotoController::class, 'edit'])->name('admin.photo.gallery.edit');
Route::post('admin/photo/gallery/store', [PhotoController::class, 'store'])->name('admin.photo.gallery.store');
Route::post('admin/photo/gallery/update/{id}', [PhotoController::class, 'update'])->name('admin.photo.gallery.update');
Route::post('admin/photo/gallery/destroy/{id}', [PhotoController::class, 'destroy'])->name('admin.photo.gallery.destroy');
Route::get('admin/photo/gallery/status/toggle/{id}', [PhotoController::class, 'toggleStatus'])->name('admin.photo.gallery.status');

## Video Gallery
Route::get('admin/video/gallery/index',  [VideoController::class, 'index'])->name('admin.video.gallery.index');
Route::get('admin/video/gallery/create', [VideoController::class, 'create'])->name('admin.video.gallery.create');
Route::get('admin/video/gallery/edit/{id}', [VideoController::class, 'edit'])->name('admin.video.gallery.edit');
Route::post('admin/video/gallery/store', [VideoController::class, 'store'])->name('admin.video.gallery.store');
Route::post('admin/video/gallery/update/{id}', [VideoController::class, 'update'])->name('admin.video.gallery.update');
Route::post('admin/video/gallery/destroy/{id}', [VideoController::class, 'destroy'])->name('admin.video.gallery.destroy');
Route::get('admin/video/gallery/status/toggle/{id}', [VideoController::class, 'toggleStatus'])->name('admin.video.gallery.status');
