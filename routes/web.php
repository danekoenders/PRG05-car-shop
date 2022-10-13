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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', 'App\Http\Controllers\HelloController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cars', carController::class);

Route::get('/carController', [App\Http\Controllers\carController::class, 'index'])->name('carController');
Route::get('/create', [App\Http\Controllers\carController::class, 'create'])->name('create');
Route::post('/create', [App\Http\Controllers\carController::class, 'postCreate'])->name('create.post');
Route::get('/delete/{id}', [App\Http\Controllers\carController::class, 'deleteProduct'])->name('car.destroy');
Route::get('/edit/{id}', [App\Http\Controllers\carController::class, 'editProduct'])->name('edit.product');
Route::post('/edit/{id}', [App\Http\Controllers\carController::class, 'postProduct'])->name('post.product');
