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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// SOAL REST API

// Soal
Route::resource('soal', 'Api\Soal\SoalController')->except([
    'create', 'edit'
]);

// User
Route::resource('user', 'Api\User\UserController')->except([
    'create', 'edit'
]);

// Peraturan

Route::get('pengaturan', 'Api\Pengaturan\PengaturanController@index');

Route::put('pengaturan/{id}', 'Api\Pengaturan\PengaturanController@update');