<?php

use App\Http\Controllers\Web\Auth\SignInController;
use App\Http\Controllers\Web\Auth\SignOutController;
use App\Http\Controllers\Web\Auth\SignUpController;
use App\Http\Controllers\Web\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('.auth')->group(
    function () {
        Route::post('/sign-out', SignOutController::class)->name('.signOut');
        Route::post('/sign-up', SignUpController::class)->name('.signUp');
        Route::post('/sign-in', SignInController::class)->name('.signIn');
    }
);

Route::prefix('home')->name('.home')->group(
    function () {
        Route::get('/', HomeController::class)->name('.home');
    }
);

