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

Route::group(['middleware'=>'guestAdmin'],function(){
	Route::get('admin/login','admin\\authController@login')->name('login');
	Route::post('admin/login','admin\\authController@postLogin')->name('postLogin');
	Route::get('admin/forgot','admin\\authController@forgot')->name('forgot');
	Route::get('admin/reset/{token?}','admin\\authController@reset')->name('reset');
});
Route::get('admin/logout','admin\\authController@getLogout')->name('logout');

Route::get('/',['as'=>'home','uses'=>'frontend\homeController@home']);
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	Route::get('/','admin\\dashboardController@index')->name('dashboard');
	Route::resource('category','admin\\categoryController',['parameters' => [
		'*' => 'type',
	]]);
	Route::get('category/delete/{id?}','admin\\categoryController@delete')->name('category.delete');
	Route::get('category/deleteall/{id?}','admin\\categoryController@deleteAll')->name('category.deleteall');
	Route::resource('post','admin\\postController',['parameters' => [
		'*' => 'type',
	]]);
	Route::post('ajaxCreateTags','admin\\ajaxController@createTags')->name('createTag');
	Route::get('post/delete/{id?}','admin\\postController@delete')->name('post.delete');
	Route::get('post/deleteall/{id?}','admin\\postController@deleteAll')->name('post.deleteall');
	
});
Route::get('/home', 'HomeController@index')->name('home');
