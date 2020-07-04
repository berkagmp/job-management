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

Route::middleware('guest')->group(function () {
    Route::get('login', 'AuthController@loginForm')->name('login.form');
    Route::post('login', 'AuthController@login')->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::post('/addjob', 'JobController@create')->name('job.add');
    Route::post('/updatejob', 'JobController@update')->name('job.update');
    Route::post('/deletejob', 'JobController@delete')->name('job.delete');
});
