<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Redirect /login to Filament's login page
Route::redirect('/login', '/dashboard/login')->name('login');
