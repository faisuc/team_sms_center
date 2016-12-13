<?php

Route::group(['middleware' => 'web', 'prefix' => 'phonebook', 'namespace' => 'Modules\Phonebook\Http\Controllers'], function()
{
    Route::get('/', [
    	'as' => 'route.phonebook' ,
    	'uses' => 'PhonebookController@index'
    ]);
});
