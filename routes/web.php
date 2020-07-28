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
Route::get('/artikel', function () {
    return view('artikel');
});
Route::get('/kerajaan', function () {
    return view('kerajaan');
});
Route::get('/tentang-kami', function () {
    return view('tentang');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
