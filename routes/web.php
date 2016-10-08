<?php

Route::group(['prefix' => '/', 'middleware' => ['throttle']], function () {

    Route::get('/', 'DoorController@index');

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

Route::group(['prefix' => '/door', 'middleware' => ['throttle:5,3']], function () {

    Route::post('/login', 'DoorController@login');

    Route::post('/register', 'DoorController@register');

    Route::get('/captcha', 'DoorController@captcha');

    Route::get('/logout', 'DoorController@logout');

    Route::get('/404', 'DoorController@index');
});