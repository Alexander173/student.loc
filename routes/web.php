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

Route::get('/', function(){
    return view('welcome');
})->name('home');
Route::group(['prefix'=>'student'],function(){
        Route::get('show','StudentsController@show')->name('students');
        Route::post('create','StudentsController@create')->name('createStudent');
        Route::delete('delete/{id}', 'StudentsController@delete')->name('deleteStudent');
        Route::put('update/{id}','StudentsController@update')->name('updateStudent');
});
Route::group(['prefix'=>'groups'], function(){
    Route::get('/','GroupController@show')->name('groups');
    Route::post('create', 'GroupController@create')->name('createGroup');
    Route::delete('delete/{id}', 'GroupController@delete')->name('deleteGroup');
    Route::put('update/{id}','GroupController@update')->name('updateGroup');
});
Route::group(['prefix'=>'subjects'],function(){
    Route::get('/','SubjectController@show')->name('subjects');
    Route::delete('delete/{id}', 'SubjectController@delete')->name('deleteSubject');
    Route::put('update/{id}','SubjectController@update')->name('updateSubject');
    Route::post('create', 'SubjectController@create')->name('createSubject');
});

Route::group(['prefix'=>'assessment'],function(){
        Route::get('student/{id}', 'AssessmentController@showStudent')->name('showStudent');
        Route::get('group/{id}', 'GroupController@showGroup')->name('showGroup');
        Route::put('createOrUpdate/{id}','AssessmentController@editAssessment')->name('editAssessment');
        Route::delete('delete/{id}', 'AssessmentController@deleteAssessment')->name('deleteAssessment');
});
Route::post('getImage/{id}','ImageController@getImage')->name('getImage');
Route::post('updateImage/{id}','ImageController@updateImage')->name('updateImage');
