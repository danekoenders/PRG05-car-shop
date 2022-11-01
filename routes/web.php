<?php

use App\Http\Controllers\carController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('cars', carController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::put('/status', [App\Http\Controllers\AdminController::class, 'status'])->name('admin.status');

Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::put('/profile/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('/filter', '\App\Http\Controllers\carController@filter');
Route::get('/search', '\App\Http\Controllers\carController@search');


