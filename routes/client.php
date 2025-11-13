<?php

use App\Http\Controllers\Frontend\SupportRequestController;
use Illuminate\Support\Facades\Route;

Route::get('about', function () {
    return view('clients.about-us');
})->name('about');


Route::get('contact', function () {
    return view('clients.contact-us');
})->name('contact');



## Support Request
Route::get('support/request/index',  [SupportRequestController::class, 'index'])->name('support.request.index');
Route::get('support/request/create', [SupportRequestController::class, 'create'])->name('support.request.create');
Route::get('support/request/edit/{id}', [SupportRequestController::class, 'edit'])->name('support.request.edit');
Route::post('support/request/store', [SupportRequestController::class, 'store'])->name('support.request.store');
Route::post('support/request/update/{id}', [SupportRequestController::class, 'update'])->name('support.request.update');
Route::post('support/request/destroy/{id}', [SupportRequestController::class, 'destroy'])->name('support.request.destroy');
Route::get('support/request/status/toggle/{id}', [SupportRequestController::class, 'toggleStatus'])->name('support.request.toggle.status');
Route::post('support/request/{id}/update-role', [SupportRequestController::class, 'updateRole'])->name('support.users.updateRole');
