<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('front-learning.index');
});
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
Route::get('/waiting-verified', 'AuthController@waitingVerified');
Route::post('/waiting-verified', 'AuthController@storeWaitingVerified');
Route::post('/resend-code-otp', 'AuthController@resendCodeOtp');


Route::group(['middleware' => 'accountVerified'], function () {

    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::get('announcements', 'AnnouncementController@index');
    Route::get('announcement/create', 'AnnouncementController@create');
    Route::post('announcement/create', 'AnnouncementController@store');
    Route::get('/announcement/search', 'AnnouncementController@getSlug');
    Route::get('announcement/{id}', 'AnnouncementController@show');
    Route::delete('/announcement/{id}', 'AnnouncementController@destroy');


    Route::get('class', 'ClassController@index');
    Route::get('class/create', 'ClassController@create');
    Route::post('class/create', 'ClassController@store');
    Route::get('class/edit/{id}', 'ClassController@edit');
    Route::post('class/edit/{id}', 'ClassController@update');
    Route::get('/profiles', 'UserController@index');
    Route::post('/profiles', 'UserController@changeProfilePicture');
    
    Route::post('/profile/update-password', 'UserController@updatePassword');

    Route::get('students', 'StudentController@index');
    Route::get('student/edit/{id}', 'StudentController@edit');
    Route::post('student/edit/{id}', 'StudentController@update');
    Route::get('student/{id}', 'StudentController@show');

    Route::get('teachers', 'TeacherController@index');
    Route::get('teacher/edit/{id}', 'TeacherController@edit');
    Route::post('teacher/edit/{id}', 'TeacherController@update');
    Route::get('teacher/{id}', 'TeacherController@show');
});
