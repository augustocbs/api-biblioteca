<?php

use App\Http\Controllers\Web\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('home')->name('.home')->group(
    function () {
        Route::get('/', HomeController::class);
    }
);

