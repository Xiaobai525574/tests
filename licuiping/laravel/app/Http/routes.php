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






    Route::get('student/index',['uses'=>'StudentController@index']);
    Route::any('student/create',['uses'=>'StudentController@create']);
    Route::any('student/save',['uses'=>'StudentController@save']);
    Route::any('student/update/{id}',['uses'=>'StudentController@update']);
    Route::any('student/detail/{id}',['uses'=>'StudentController@detail']);
    Route::any('student/delete/{id}',['uses'=>'StudentController@delete']);
