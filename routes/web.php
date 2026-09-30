<?php

use Illuminate\Support\Facades\Route;

Route::name('backend.')->group(function () {
    Route::controller(\App\Http\Controllers\AuthController::class)->name('auth.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('login', 'login')->name('login');
        Route::get('forgot-password', 'forgotPassword')->name('forgot-password');
        Route::post('forgot-password', 'sendResetLink')->name('forgot-password.send');
        Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset-password');
        Route::post('reset-password/{token}', 'createPassword')->name('reset-password.update');
        Route::get('logout', 'logout')->name('logout');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');

        Route::resource('users', App\Http\Controllers\UserController::class)->except('show');
        Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::post('/profile/{id}', 'updateProfile')->name('profile.update');
            Route::get('/change-password', 'changePassword')->name('password.change');
            Route::post('/update-password/{id}', 'updatePassword')->name('password.update');
        });
        Route::controller(\App\Http\Controllers\PermissionController::class)->prefix('/users')->name('permissions.')->group(function () {
            Route::get('/{id}/permissions', 'index')->name('index');
            Route::post('/update-permission/{id}', 'update')->name('update');
        });

        Route::controller(\App\Http\Controllers\SettingController::class)->prefix('/settings')->name('settings.')->group(function () {
            Route::get('/{type}', 'index')->name('index');
            Route::post('/update/{type}', 'update')->name('update');
        });
    });
});
