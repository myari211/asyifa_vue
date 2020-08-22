<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/akun', 'AkunController@index');
Route::post('/akun/add', 'AkunController@add');
Route::put('/akun/edit/{id}', 'AkunController@edit');
Route::get('/akun/show/{id}', 'AkunController@show');
Route::delete('/akun/delete/{id}', 'AkunController@delete');