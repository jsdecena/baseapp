<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->to('admin');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'] ], function () {
    
    Route::resource('/',                       'Admin\AdminController');

    Route::group(['middleware' => ['role:admin']], function()
    {
        Route::resource('user',                       'Admin\UserController');
        Route::resource('role',                       'Admin\RoleController');
    });
});

Route::group(['prefix' => 'api/v1' ], function () {
    
    Route::resource('authenticate', 'Api\AuthenticateController');

    Route::group(['middleware' => ['jwt.auth']], function(){
        Route::resource('user',                       'Api\UserApiController');
    });
});

Route::controllers(['auth' => 'Auth\AuthController']);