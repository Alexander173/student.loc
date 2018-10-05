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

Route::name('student.')->prefix('student')->group(function() {
    Route::get('', 'StudentsController@index')->name('index');
    Route::get('filter:','StudentsController@filter')->name('filter');
    Route::post('create', 'StudentsController@create')->name('create');

    Route::group(['prefix' => '{id}'], function() {
        Route::get('edit', 'StudentsController@edit')->name('edit');
        Route::put('update', 'StudentsController@update')->name('update');
        Route::delete('delete', 'StudentsController@delete')->name('delete');

        Route::name('assessment.')->prefix('assessment/{aId}/')->group(function() {
            Route::put('update', 'AssessmentController@update')->name('update');
            Route::delete('delete', 'AssessmentController@delete')->name('delete');
        });
    });
});

Route::group(['prefix' => 'groups'], function(){
    Route::get('group/{id}', 'GroupController@showGroup')->name('showGroup');
    Route::get('/', 'GroupController@show')->name('groups');
    Route::post('create', 'GroupController@create')->name('createGroup');
    Route::delete('delete/{id}', 'GroupController@delete')->name('deleteGroup');
    Route::put('update/{id}', 'GroupController@update')->name('updateGroup');
});

Route::group(['prefix' => 'subjects'], function(){
    Route::get('/','SubjectController@show')->name('subjects');
    Route::delete('delete/{id}', 'SubjectController@delete')->name('deleteSubject');
    Route::put('update/{id}', 'SubjectController@update')->name('updateSubject');
    Route::post('create', 'SubjectController@create')->name('createSubject');
});


Route::post('getImage/{id}', 'ImageController@getImage')->name('getImage');
Route::post('updateImage/{id}', 'ImageController@updateImage')->name('updateImage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
