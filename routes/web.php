<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

Route::get('language/{lang}', function ($lang) {
    if (!in_array($lang, ['en', 'ar'])) {
        abort(400);
    }
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return Redirect::back();
})->name('setlocale');

include('route/users.php');
include('route/notifications.php');
include('route/settings.php');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'active.user'])->name('dashboard');

Route::resource('visitors', 'App\Http\Controllers\VisitorController')->middleware(['auth', 'active.user']);
Route::resource('nationalities', 'App\Http\Controllers\NationalityController')->middleware(['auth', 'active.user']);
Route::resource('guns', 'App\Http\Controllers\GunController')->middleware(['auth', 'active.user']);
Route::resource('components', 'App\Http\Controllers\ComponentController')->middleware(['auth', 'active.user']);
Route::resource('transactions', 'App\Http\Controllers\TransactionController')->middleware(['auth', 'active.user']);



Route::get('/not-active-user', function () {
    return Inertia::render('Auth/NotActive');
})->name('not-active-user');

Route::get('/offline', function () {
    return Inertia::render('Offline');
})->name('offline');




require __DIR__ . '/auth.php';
