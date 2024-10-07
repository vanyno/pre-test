<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\DrinkController;

Route::resource('foods', FoodController::class);
Route::resource('drinks', DrinkController::class);





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/