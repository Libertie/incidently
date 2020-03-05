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

Route::get('/', function () {
    return view('welcome');
});

//Route::group(['middleware' => 'auth'], function() {
    Route::get('/incidents', 'IncidentController@index')
        ->name('incidents.index');
    Route::get('/incidents/create', 'IncidentController@create')
        ->name('incidents.create');
    Route::get('/incidents/{incident}', 'IncidentController@show')
        ->name('incidents.show');
    Route::get('/incidents/{incident}/edit', 'IncidentController@edit')
        ->name('incidents.edit');
    Route::get('incidents/{incident}/delete', 'IncidentController@destroy')
        ->name('incidents.destroy');
    Route::delete('/incidents/{incident}/photos/{photo}/delete', 'PhotoController@destroy')
        ->name('photos.destroy');

    Route::post('/incidents', 'IncidentController@store')
        ->name('incidents.store');
    Route::post('/incidents/{incident}/photos', 'PhotoController@store')
        ->name('photos.store');

    Route::patch('/incidents/{incident}', 'IncidentController@update')
        ->name('incidents.update');
    //Route::patch('/incidents/{project}/types/{type}', 'ProjectTypeController@update');

    //Route::get('/home', 'HomeController@index')->name('home');
//});

//Auth::routes();
