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

Route::get('/',['as'=>'home','uses'=>'frontend\homeController@home']);
Route::group(['prefix'=>'admin'],function(){
	Route::get('/','admin\\dashboardController@index')->name('dashboard');
	Route::resource('category','admin\\categoryController',['parameters' => [
		'*' => 'type',
	]]);
	Route::get('category/delete/{id?}','admin\\categoryController@delete')->name('category.delete');
	Route::get('category/deleteall/{id?}','admin\\categoryController@deleteAll')->name('category.deleteall');
	Route::resource('post','admin\\postController',['parameters' => [
		'*' => 'type',
	]]);
});