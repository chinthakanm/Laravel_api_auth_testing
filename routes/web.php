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

Route::post('/add-book','book@store');
Route::get('/get-book/{name}','book@show')->middleware('auth:api');
Route::get('/read-book/{name}','book@show')->middleware('auth:api');

Route::get('/', function () {
    return view('welcome');
});
