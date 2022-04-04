<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::group(['as' => 'user.','prefix' => 'akun'], function () {
    Route::get('{id}/show', '\App\Http\Controllers\UserController@show')->name('show');
    Route::get('{id}/edit', '\App\Http\Controllers\UserController@edit')->name('edit');
    Route::post('{id}/edit', '\App\Http\Controllers\UserController@update')->name('update');
    Route::get('{id}/ganti-password', '\App\Http\Controllers\UserController@passEdit')->name('passEdit');
    Route::post('{id}/ganti-password', '\App\Http\Controllers\UserController@passUpdate')->name('passUpdate');
});

// Product
Route::group(['as' => 'katalog.','prefix' => 'produk'], function () {
    Route::get('/', '\App\Http\Controllers\KatalogController@index')->name('index')->middleware('is_admin');
    Route::get('/create', '\App\Http\Controllers\KatalogController@create')->name('create')->middleware('is_admin');
    Route::post('/create', '\App\Http\Controllers\KatalogController@store')->name('store')->middleware('is_admin');
    Route::get('{id}/show', '\App\Http\Controllers\KatalogController@show')->name('show');
    Route::get('{id}/edit', '\App\Http\Controllers\KatalogController@edit')->name('edit')->middleware('is_admin');
    Route::post('{id}/edit', '\App\Http\Controllers\KatalogController@update')->name('update')->middleware('is_admin');
});

Route::group(['as' => 'cabang.','prefix' => 'cabang'], function () {
    Route::get('/', '\App\Http\Controllers\CabangController@index')->name('index')->middleware('is_admin');
    Route::get('{id}/show', '\App\Http\Controllers\CabangController@show')->name('show')->middleware('is_admin');
});

Route::get('admin/stokBarang', [HomeController::class, 'stokBarang'])->name('stok.barang')->middleware('is_admin');
