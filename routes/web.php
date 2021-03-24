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

//Admin Panel
Route::get('/admin/index', 'App\Http\Controllers\Admin\AdminController@index')->name("admin.home.index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Order Routes
Route::get('/order/create', 'App\Http\Controllers\OrderController@create')->name("order.create");
Route::delete('/order/delete', 'App\Http\Controllers\OrderController@delete')->name("order.delete");
Route::post('/order/save', 'App\Http\Controllers\OrderController@save')->name("order.save");
Route::get('/order/show/{id}', 'App\Http\Controllers\OrderController@show')->name("order.show");
Route::get('/order/list', 'App\Http\Controllers\OrderController@list')->name("order.list");
/* Routes Moli User - Wishlist */
Route::get('/user/show/{id}', 'App\Http\Controllers\UserController@show')->name("user.show");
Route::get('/user/create', 'App\Http\Controllers\UserController@create')->name("user.create");
Route::get('/user/display', 'App\Http\Controllers\UserController@display')->name("user.display");
Route::post('/user/save', 'App\Http\Controllers\UserController@save')->name("user.save");
Route::post('/user/delete', 'App\Http\Controllers\UserController@delete')->name("user.delete");
