<?php

use Illuminate\Http\Request;


Route::group(['prefix' => '/','middleware' => ['auth:api']], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['prefix' => '/'], function () {

    Route::group(['prefix' => '/post'], function () {

        Route::get('/news', 'PostController@news');
    });
});