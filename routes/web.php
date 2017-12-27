<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/* App Routes */

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    if(Auth::check()){
        return view('home');
    }
    else{
        return view('public');    
    }
});


/* Public Routes */



Route::get('/loginok', function(){
    $user = Auth::user();
    return view('loginok')->with('user', $user);
});


/* Lesson Routes */

Route::get('/lesson/index', 'LessonController@index');

Route::get('/lesson/create', 'LessonController@create');

Route::post('/lesson/create', 'LessonController@createLesson');

Route::get('/lesson/testAgent', 'LessonController@testAgent');

Route::get('lesson/{id}', 'LessonController@show');


/* Comment Routes */


/* Admin Routes */

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'name' => 'admin'], function () {
    
    Route::get('', 'AdminController@index')->name('index');
    
    Route::get('addrole/{id_user}', 'AdminController@addrole')->name('addrole');
    
});


/* Auth Routes */

Auth::routes();

Route::get('/meaburro/new', function(){
    return view('proba.newmeaburro');
});



    




