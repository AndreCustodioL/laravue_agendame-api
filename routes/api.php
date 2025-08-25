<?php

use App\Events\UserRegistered;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\MeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::post('login', LoginController::class)->name('auth.login');
Route::post('register', RegisterController::class);


Route::middleware('auth:sanctum')->prefix('me')->group(function () {
    Route::get('/', [MeController::class, 'show']);
});
