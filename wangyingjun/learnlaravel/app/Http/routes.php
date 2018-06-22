<?php



Route::get('/', function () {
    return view('welcome');
});



    Route::get('student/index' , ['uses' => 'StudentController@index']);
    Route::any('student/create' , ['uses' => 'StudentController@create']);
    Route::any('student/save' , ['uses' => 'StudentController@save']);
    Route::any('student/update/{id}' , ['uses' => 'StudentController@update']);
    Route::any('student/detail/{id}' , ['uses' => 'StudentController@detail']);
    Route::any('student/delete/{id}' , ['uses' => 'StudentController@delete']);

