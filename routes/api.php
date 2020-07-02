<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('jobs')->group(function () {
    Route::get('/', 'JobController@list')->name('job.list');
    Route::get('/{job_id}', 'JobController@get')->name('job.get');
    Route::post('/', 'JobController@create')->name('job.create');
    Route::put('/{job_id}', 'JobController@update')->name('job.update');
    Route::delete('/{job_id}', 'JobController@delete')->name('job.delete');
});
