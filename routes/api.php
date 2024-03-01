<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CategoryController;



Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::get('/channels', [ChannelController::class, 'index']);

Route::get('/channels/{channel}', [ChannelController::class, 'show']);
