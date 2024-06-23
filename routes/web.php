<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\LoginMiddleware;



Route::get('/', [UserController::class, 'login']);

Route::middleware(LoginMiddleware::class)->group(function () {

     Route::resource('categories', CategoryController::class);

     Route::resource('tags', TagController::class);

     Route::resource('posts', PostController::class);

     Route::resource('users', UserController::class);
});

