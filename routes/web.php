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

Auth::routes();

//Route::get('/films', 'HomeController@index')->name('home');

Route::get('/', function(){
	return redirect()->route('films.index');
});

Route::resource('films', 'FilmController')->middleware('auth');

Route::post('comment', 'CommentController@save')->name('savecomment')->middleware('auth');