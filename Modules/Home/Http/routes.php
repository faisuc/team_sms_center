<?php

Route::group(['middleware' => ['web' , 'authVerify'] , 'prefix' => 'home', 'namespace' => 'Modules\Home\Http\Controllers'], function()
{
    Route::get('/', [
    	'as' => 'route.home' ,
    	'uses' => 'HomeController@index'
    ]);


});
