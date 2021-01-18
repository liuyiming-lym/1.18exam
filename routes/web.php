<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','ImageController@create')->name('create');
Route::post('save','ImageController@save')->name('save')->middleware('image');
Route::post('upload','ImageController@upload')->name('upload');
Route::get('show','ImageController@show')->name('show');
Route::delete('delete/{id}','ImageController@delete')->name('delete');
