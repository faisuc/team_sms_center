<?php

Route::group(['middleware' => 'web', 'prefix' => 'auth', 'namespace' => 'Modules\Auth\Http\Controllers'], function()
{

    Route::get('/', 'AuthController@index')->middleware('isLogin');

    Route::get('/signup' , [
    	'as'	=> 'route.auth.signup' ,
    	'uses' 	=> 'RegisterController@index'
    ])->middleware('isLogin'); 

    Route::get('/logout' , [
    	'as'	=> 'route.auth.logout' ,
    	'uses'	=> 'AuthController@logout_user'
    ]);

    Route::post('/login' , [
		'as'    => 'route.auth.login' ,
		'uses'  => 'AuthController@authenticate_user'
	]);

    Route::post('/register' , [
    	'as'	=> 'route.auth.register' ,
    	'uses'	=> 'RegisterController@register_user'
    ]);

});
