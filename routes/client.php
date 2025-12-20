<?php

use App\Http\Controllers\Frontend\DonateController;
use App\Http\Controllers\Frontend\SupportRequestController;
use App\Http\Controllers\Frontend\PhotoGalleryController;
use App\Http\Controllers\Frontend\VideoGalleryController;
use Illuminate\Support\Facades\Route;

Route::get('about', function () {
    return view('clients.about-us');
})->name('about');


Route::get('contact', function () {
    return view('clients.contact-us');
})->name('contact');



## Support Request
Route::get('support/request/index',  [SupportRequestController::class, 'index'])->name('support.request.index');
Route::post('support/request/store', [SupportRequestController::class, 'store'])->name('support.request.store');

Route::get('donate/index', [DonateController::class, 'index'])->name('donate.index');


## Photo Gallery
Route::get('photo/gallery/index',  [PhotoGalleryController::class, 'index'])->name('clients.photo-gallery.photo-gallery');
Route::get('video/gallery/index',  [VideoGalleryController::class, 'index'])->name('clients.video-gallery.video-gallery');
