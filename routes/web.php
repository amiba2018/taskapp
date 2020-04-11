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
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/authchart', 'QuestionsController@show');
    Route::get('/chart', 'QuestionsController@selfShow');
    Route::post('/chart/{id}', 'QuestionsController@storeFavorite');
    Route::delete('/chart/{question_id}/{answer_id}', 'QuestionsController@delete');
    Route::delete('/chart/{id}','QuestionsController@destroyFavorite');
    Route::get('/question/edit/{id}', 'QuestionsController@edit');
    Route::put('/question/edit/{id}', 'QuestionsController@update');
    Route::get('/question/create', 'QuestionsController@create');
    Route::post('/question/create', 'QuestionsController@store');
    Route::get('/favorites/{id}', 'QuestionsController@favoriteQuestion');
    Route::post('/favorites/{id}/answer', 'QuestionsController@favoriteAnswer');
    Route::get('/questions/{id}', 'QuestionsController@question');
    Route::post('/questions/{id}/answer', 'QuestionsController@answer');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

