<?php

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['namespace' => 'Api\v1', 'prefix' => 'api/v1'], function()
{
    Route::get('/email/{email}', ['as' => 'api.v1.email', 'uses' => "ApiController@show"]);
});
