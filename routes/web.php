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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'QuestionsController@index');
    Route::delete('/{Qid}/{Aid}', 'QuestionsController@delete');
    Route::get('/edit/{id}', 'QuestionsController@edit');
    Route::put('/edit/{id}', 'QuestionsController@update');
    Route::get('/create', 'QuestionsController@create');
    Route::post('/create', 'QuestionsController@store');
});
Route::get('/questions/{id}', 'QuestionsController@question');
Route::post('/questions/{id}/answer', 'QuestionsController@answer');


// Route::get('/sass', function () {
//     return view('sass');
// });
// Route::get('/hello', 'HelloController@getData');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
