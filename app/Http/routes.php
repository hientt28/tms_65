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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'web'], function () {
    Route::get('/' , ['as' =>'home', 'uses' => 'HomeController@index']);
    Route::resource('users', 'UserController');
    Route::group([ 'prefix' => 'admin'], function () {
        Route::resource('trainees', 'TraineeController');
//        Route::get('/',[
//            'as' => 'admin',
//            'uses' => 'AdminController@index',
//        ]);

        Route::get('{id}',[
            'as' => 'admin',
            'uses' => 'AdminController@show',
        ]);

        Route::put('{id}', [
            'as' => 'admin.update',
            'uses' => 'AdminController@update',
        ]);

        Route::get('{id}/profile/', [
            'as' => 'admin.profile',
            'uses' => 'AdminController@profile',
        ]);
    });

    Route::group(['prefix' => 'login'], function () {
        Route::get('social/{network}', [
            'as' => 'loginSocialNetwork',
            'uses' => 'SocialNetworkController@callback',
        ]);

        Route::get('{accountSocial}/redirect', [
            'as' => 'redirectSocialNetwork',
            'uses' => 'SocialNetworkController@redirect',
        ]);
    });
});
