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


Route::group(['middleware'=>['web']],function (){
    Route::any('student/index',['uses'=>'StudentController@index']);
    Route::any('student/create',['uses'=>'StudentController@create']);
    Route::any('student/save',['uses'=>'StudentController@save']);
});


