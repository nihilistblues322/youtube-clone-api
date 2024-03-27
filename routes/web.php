<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::delete('/delete-account', [RegisteredUserController::class, 'destroy'])->middleware('auth');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
