<?php


Route::get('/', function () {
    return view('student.login');
})->name('welcome');
Route::resource("students", 'StudentController');
Route::get('/load-students', 'StudentController@loadstudents')->name('load_students');



