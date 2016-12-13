<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('/', 'UserController@index');

    Route::get('/update/{id}' , [
    	'as' => 'route.user.update' ,
    	'uses' => 'UserController@update_user'
    ]);

    Route::get('/delete/{id}' , [
    	'as' => 'route.user.delete' ,
    	'uses' => 'UserController@delete_user'
    ]);

    Route::get('/add' , [
    	'as' => 'route.user.addview' ,
    	'uses' => 'UserController@addview_user'
    ]);

    Route::post('/add' , [
    	'as' => 'route.user.add' ,
    	'uses' => 'UserController@add_user'
    ]);

    Route::get('/profile' , [
        'as' => 'route.user.profile' ,
        'uses' => 'UserController@profileview'
    ]);
});
