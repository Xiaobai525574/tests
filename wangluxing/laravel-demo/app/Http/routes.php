<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('student/index',['uses'=>'StudentControllers@index']);
Route::any('student/create',['uses'=>'StudentControllers@create']);
Route::any('student/save',['uses'=>'StudentControllers@save']);
Route::any('student/update/{id}',['uses'=>'StudentControllers@update']);
Route::any('student/detail/{id}',['uses'=>'StudentControllers@detail']);
Route::any('student/delete/{id}',['uses'=>'StudentControllers@delete']);