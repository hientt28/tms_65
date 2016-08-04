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
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('trainees', 'TraineeController');

        Route::group(['namespace' => 'Admin'], function () {
            Route::resource('subjects', 'SubjectController');

            Route::post('subjects/delete_multi', [
                'as' => 'subjects/delete_multi',
                'uses' => 'SubjectController@deleteMulti'
            ]);
        });
    });

    Route::resource('courses', 'CourseController');

    Route::get('courses/search', [
        'as' => 'search',
        'uses' => 'CourseController@search'
    ]);

    Route::post('courses/destroySelected', [
        'as' => 'destroySelected',
        'uses' => 'CourseController@destroySelected'
    ]);

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
