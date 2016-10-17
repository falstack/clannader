<?php

Route::group(['prefix' => '/', 'middleware' => ['throttle']], function () {

    Route::get('/', 'DoorController@index');

    Route::get('/dollars', 'DoorController@index');

    Route::get('/posts', 'DoorController@index');

    Route::get('/post/{id}', 'DoorController@index');

    Route::group(['prefix' => '/bangumi'], function () {

        Route::get('/{id}', 'DoorController@index');
    });

    Route::group(['prefix' => '/people/{id}'], function () {

        Route::get('/{name?}', 'DoorController@index')
            ->where('name', '(post|bangumi|net|inbox|edit)');
    });
});

Route::group(['prefix' => '/door'], function () {

    Route::post('/login', 'DoorController@login')->middleware('throttle:5,3');

    Route::post('/register', 'DoorController@register')->middleware('throttle:5,3');

    Route::get('/captcha', 'DoorController@captcha')->middleware('throttle:5,3');

    Route::get('/logout', 'DoorController@logout')->middleware('throttle:5,3');

    Route::get('/404', 'DoorController@index')->middleware('throttle:30');

    Route::get('/star', 'DoorController@index')->middleware('throttle:30');
});