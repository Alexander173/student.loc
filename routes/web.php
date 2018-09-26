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
Route::get('/students','StudentsController@show')->name('students');
Route::get('/groups','GroupController@show')->name('groups');
Route::get('/subjects','SubjectController@show')->name('subjects');
// Route::get('/assessments','AssessmentController@show')->name('assessments');

//Created route
Route::post('/students/create','StudentsController@create')->name('createStudent');
Route::post('/groups/create', 'GroupController@create')->name('createGroup');
Route::post('/subjects/create', 'SubjectController@create')->name('createSubject');


//Deleted route
Route::delete('students/delete/{id}', 'StudentsController@delete')->name('deleteStudent');
Route::delete('groups/delete/{id}', 'GroupController@delete')->name('deleteGroup');
Route::delete('subjects/delete/{id}', 'SubjectController@delete')->name('deleteSubject');
Route::delete('assessments/delete/{id}', 'AssessmentController@deleteAssessment')->name('deleteAssessment');

//Updated route
Route::put('students/update/{id}','StudentsController@update')->name('updateStudent');
Route::put('groups/update/{id}','GroupController@update')->name('updateGroup');
Route::put('subjects/update/{id}','SubjectController@update')->name('updateSubject');
Route::put('assessments/createOrUpdate{id}','AssessmentController@editAssessment')->name('editAssessment');

//Group info
Route::get('groups/group{id}', 'GroupController@showGroup')->name('showGroup');

//Student info
Route::get('assessments/student{id}', 'AssessmentController@showStudent')->name('showStudent');


