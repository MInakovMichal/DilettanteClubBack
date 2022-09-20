<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => '\Modules\Question\Http\Api\Controllers', 'middleware' => 'auth:sanctum'], function () {
    Route::post('questions/create', 'QuestionController@addQuestion');
    Route::get('questions', 'QuestionController@getAllQuestions');
});
