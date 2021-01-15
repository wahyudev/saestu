<?php
//Route::get('/','HomeController@index');
Route::get('login','AuthController@index');
Route::post('login','AuthController@checkLogin');
Route::get('logout','AuthController@logout');
Route::resource('rangking','IkuDepanController');
