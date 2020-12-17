<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');

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
    Route::delete('/announcement/{id}', 'ClassController@destroy');
    Route::get('/profiles', 'UserController@index');
});
