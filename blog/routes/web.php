<?php

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

//Route::get('/music', "MusicController@index")->name('music');

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/music/search', 'MusicController@search')->name('music.search');

Route::resource('music', 'MusicController');

//Route::post('/music', "MusicController@store")->name('music.upload');
//Route::delete('/music', "MusicController@delete")->name('music.delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
