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

//Room
//tampil semua data
Route::get('kamar', 'API\RoomController@index');//->middleware('auth:api'); cara 1
//tampil data dari id
Route::get('kamar/{id}', 'API\RoomController@show' );
//tambah
Route::post('kamar', 'API\RoomController@store');
//hapus
Route::delete('kamar/{id}', 'API\RoomController@destroy');
//update
Route::patch('kamar/{id}', 'API\RoomController@update');


//Type
//tampil semua data
Route::get('tipe', 'API\TypeController@index'); 
//tampil data dari id
Route::get('tipe/{id}', 'API\TypeController@show' );
//tambah
Route::post('tipe', 'API\TypeController@store');
//hapus
Route::delete('tipe/{id}', 'API\TypeController@destroy');
//update
Route::patch('tipe/{id}', 'API\TypeController@update');

//membuat password
Route::get('password', function () {
    return bcrypt('andika');
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    //membuat token
    Route::post('login', 'AuthController@login');
    //menghapus token
    Route::post('logout', 'AuthController@logout');
    //memperbaharui token
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});