<?php

use Illuminate\Support\Facades\Route;

// Redirect /login to Filament's login page
Route::redirect('/login', '/dashboard/login')->name('login');

// Language switcher route
Route::get('/locale/{locale}', [App\Http\Controllers\LocaleController::class, 'switch'])->name('locale.switch');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
