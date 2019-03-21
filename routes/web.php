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

route::group(['middleware'=>'auth'],function(){
		Route::get('/','SettingsController@dashboard')->name('dashboard');

					//route for settings
				Route::get('settings', 'SettingsController@setting')->name('settings');
				Route::post('settings', 'SettingsController@setting_save')->name('settings_post');
					//route for settings

					//route for settings
				Route::get('profile', 'SettingsController@profile')->name('profile');
				Route::post('profile', 'SettingsController@profile_save')->name('profile_post');
					//route for settings

					//route for categories
				Route::resource('categories', 'CategoriesController');
					//route for categories


					//route for news
				Route::resource('news', 'NewsController');
				Route::post('upload/image/{pid}','NewsController@upload_file');
 				 route::post('delete/image','NewsController@delete_file');

					//route for news

 				 Route::post('search','SettingsController@searchCat');
 				// Route::post('search','SettingsController@searchnews');



});

Auth::routes();


