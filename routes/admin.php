<?php
Route::get('/', 'HomeController@index')->name('dashboard');

Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::resource('kerajaan','KerajaanController');
Route::resource('raja','RajaController');
Route::resource('timeline','TimelineController');
Route::resource('galeri','GaleriController');
Route::resource('manuskrip','ManuskripController');
Route::resource('kategori','KategoriController');
Route::resource('artikel','ArtikelController');
Route::resource('tag','TagsController');
