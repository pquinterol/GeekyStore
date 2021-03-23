<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name("home.index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Routes Moli User - Wishlist */
Route::get('/user/show/{id}', 'App\Http\Controllers\UserController@show')->name("user.show");
Route::get('/user/create', 'App\Http\Controllers\UserController@create')->name("user.create");
Route::get('/user/display', 'App\Http\Controllers\UserController@display')->name("user.display");
Route::post('/user/save', 'App\Http\Controllers\UserController@save')->name("user.save");
Route::post('/user/delete', 'App\Http\Controllers\UserController@delete')->name("user.delete");
