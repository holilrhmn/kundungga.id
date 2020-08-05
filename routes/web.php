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


Route::get('/', 'Frontend\KerajaanController@home')->name('landing.page');

Route::get('/tentang-kami', function () {
    return view('tentang');
});

Route::post('newsletter','NewsletterController@store')->name('newsletter');

Route::get('/linimasa', 'Frontend\TimelineController@index')->name('linimasa');
Route::get('/article', 'Frontend\ArtikelController@index')->name('artikel');
Route::get('/article/{slug}', 'Frontend\ArtikelController@show')->name('artikel.show');

Route::get('/empire', 'Frontend\KerajaanController@index')->name('kerajaan.index');
Route::get('/empire/{slug}', 'Frontend\KerajaanController@show')->name('kerajaan.show');
Route::get('/galery', 'Frontend\GaleriController@index')->name('galeri');
Route::get('/galery/{slug}', 'Frontend\GaleriController@show')->name('galeri.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
