<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')
    ->group(function () {

        Route::get('/register', [RegisterController::class, 'create'])
            ->name('register');
        Route::post('/register', [RegisterController::class, 'store'])
            ->middleware('check.data');

        Route::get('/login', [LoginController::class, 'create'])
            ->name('login');
        Route::post('/login', [LoginController::class, 'store'])
            ->middleware('check.data');

        Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
            ->name('password.request');

        Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
            ->name('password.email');

        Route::get('/reset-password', [ResetPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('/reset-password', [ResetPasswordController::class, 'store'])
            ->name('password.update');
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('/logout', [LoginController::class, 'destroy'])
            ->name('logout');

        Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
            ->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('verification.send');
    });
