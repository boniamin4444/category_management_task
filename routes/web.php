<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('welcome');
});

//Category Route
Route::resource('categories', CategoryController::class);

// Products Route
Route::resource('products', ProductController::class);
Route::get('/', [ProductController::class, 'welcome']); // Add this line