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
// $name = app()->make('myName');

// dd($name); 
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/chart', 'QuestionsController@index');
    Route::post('/chart/{id}', 'QuestionsController@storeFavorite');
    Route::delete('/chart/{Qid}/{Aid}', 'QuestionsController@delete');
    Route::delete('/chart/{id}','QuestionsController@destroyFavorite');
    Route::get('/edit/{id}', 'QuestionsController@edit');
    Route::put('/edit/{id}', 'QuestionsController@update');
    Route::get('/create', 'QuestionsController@create');
    Route::post('/create', 'QuestionsController@store');
});
Route::get('/questions/{id}', 'QuestionsController@question');
Route::post('/questions/{id}/answer', 'QuestionsController@answer');

Route::get('/favorites/{id}', 'QuestionsController@favoriteQ');
Route::post('/favorites/{id}/answer', 'QuestionsController@favoriteA');
Route::get('/home', 'HomeController@index')->name('home');

