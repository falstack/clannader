<?php

Route::group(['prefix' => '/', 'middleware' => ['throttle']], function () {

    Route::get('/', 'DoorController@index');

    Route::group(['prefix' => '/post'], function () {

        Route::get('/{id}', 'DoorController@index');
    });
});

Route::group(['prefix' => '/door', 'middleware' => ['throttle:5,3']], function () {

    Route::post('/login', 'DoorController@login');

    Route::post('/register', 'DoorController@register');

    Route::get('/captcha', 'DoorController@captcha');

    Route::get('/logout', 'DoorController@logout');
});