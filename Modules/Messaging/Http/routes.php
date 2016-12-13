<?php

Route::group(['middleware' => 'web', 'prefix' => 'messaging', 'namespace' => 'Modules\Messaging\Http\Controllers'], function()
{
    Route::get('/', [
    	'as' => 'route.sms' ,
    	'uses' => 'MessagingController@index'
    ]);

    Route::get('/message/{id}' , [
    	'as' => 'route.sms.message' ,
    	'uses' => 'MessagingController@form'
    ]);

    Route::post('/message/send' , [
    	'as' => 'route.sms.send' ,
    	'uses' => 'MessagingController@send'
    ]);
});
