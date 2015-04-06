<?php

Route::get('/signup', ['as' => 'signup', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('/signup', ['as' => 'signup', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::get('/users/confirm/{token}', ['as' => 'users.confirm', 'uses' => 'Auth\AuthController@confirm']);

Route::controllers([
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', 'HomeController@index');

    Route::get('/keys', ['as' => 'keys.index', 'uses' => 'ApiKeysController@index']);
    Route::post('/keys', ['as' => 'keys.store', 'uses' => 'ApiKeysController@store']);
    Route::post('/keys/toggle', ['as' => 'keys.toggle', 'uses' => 'ApiKeysController@toggle']);

    Route::get('/users/profile', ['as' => 'users.profile', 'uses' => 'Auth\AuthController@getProfile']);
    Route::post('/users/profile', ['as' => 'users.profile', 'uses' => 'Auth\AuthController@postProfile']);
});

Route::group(['namespace' => 'Api\v1', 'prefix' => 'api/v1', 'middleware' => 'api.key'], function()
{
    Route::get('/email/{email}', ['as' => 'api.v1.email', 'uses' => "ApiController@show"]);
});

Route::post('stripe/webhook', 'Laravel\Cashier\WebhookController@handleWebhook');