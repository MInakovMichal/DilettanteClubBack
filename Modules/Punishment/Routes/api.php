<?php

use Illuminate\Http\Request;

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

Route::group(['namespace' => '\Modules\Punishment\Http\Api\Controllers', 'middleware' => 'auth:sanctum'], function () {
    Route::post('punishments/create', 'PunishmentController@addPunishment');
    Route::get('punishments', 'PunishmentController@getAllPunishments');
});
