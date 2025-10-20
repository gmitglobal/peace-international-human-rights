<?php

use Illuminate\Support\Facades\Route;

Route::get('about', function () {
    return view('clients.about-us');
})->name('about');


Route::get('contact', function () {
    return view('clients.contact-us');
})->name('contact');