<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->prefix('user-management')->name('user-management.')->group(function () {
    Route::view('listing', 'user-management::listing')->middleware(['auth'])->name('listing');
});

