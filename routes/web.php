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

    Route::get('roles', 'RoleController@index');
    Route::post('role/create', 'RoleController@store');

    Route::get('announcements', 'AnnouncementController@index');
    Route::get('announcement/create', 'AnnouncementController@create');
    Route::post('announcement/create', 'AnnouncementController@store');
    Route::get('/announcement/search', 'AnnouncementController@getSlug');
    Route::get('announcement/{id}', 'AnnouncementController@show');
    Route::delete('/announcement/{id}', 'AnnouncementController@destroy');
});
