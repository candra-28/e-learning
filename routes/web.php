<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
Route::get('/forgot-password', 'AuthController@forgotPassword');
Route::post('/forgot-password', 'AuthController@storeForgotPassword');
Route::get('reset-password/{token}/{userID}', 'AuthController@verifyTokenForgotPassword');
Route::post('reset-password', 'AuthController@storeResetPassword');

Route::group(['middleware' => ['accountVerified', 'auth']], function () {

    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::get('announcements', 'AnnouncementController@index');
    Route::get('announcement/create', 'AnnouncementController@create');
    Route::post('announcement/create', 'AnnouncementController@store');
    Route::get('/announcement/search', 'AnnouncementController@getSlug');
    Route::get('announcement/{id}', 'AnnouncementController@show');
    Route::delete('/announcement/{id}', 'AnnouncementController@destroy');

    Route::get('majors', 'MajorController@index');
    Route::get('major/create', 'MajorController@create');
    Route::post('major/create', 'MajorController@store');
    Route::get('major/edit/{majorID}', 'MajorController@edit');
    Route::post('major/edit/{majorID}', 'MajorController@update');
    Route::get('major/{majorID}', 'MajorController@show');
    Route::post('major/edit-status/{majorID}', 'MajorController@updateStatusMajor');

    Route::get('classes', 'ClassController@index');
    Route::get('class/create', 'ClassController@create');
    Route::post('class/create', 'ClassController@store');
    Route::get('class/edit/{id}', 'ClassController@edit');
    Route::post('class/edit/{id}', 'ClassController@update');
    Route::post('class/edit-status/{classID}', 'ClassController@updateStatusClass');

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
