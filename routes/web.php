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

Route::post('/vue/search/store', [
	'as' => 'search.store',
	'uses' => 'SearchController@store'
]);

Auth::routes();

Route::get('/home', function(){
	return redirect()->route('home');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');