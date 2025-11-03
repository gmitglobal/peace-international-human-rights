<?php

use App\Http\Controllers\ProfileController;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $sliders = Slider::where('status', '=', 1)->get();
    return view('clients.home.index', compact('sliders'));
})->name('home');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


## All Admin Routes
include('admin.php');

## All Client Routes
include('client.php');
