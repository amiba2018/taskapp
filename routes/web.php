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

// Route::get('/question', 'QuestionController@index');
Route::get('/question', 'QuestionController@allAnswer');
// Route::get('/show', 'QuestionController@show');
// Route::get('/sass', function () {
//     return view('sass');
// });
// Route::get('/hello', 'HelloController@getData');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
