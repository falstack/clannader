<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/foo', function () {
    return view('welcome');
});

Route::get('/bar', function () {
    return view('welcome');
});

Route::group(['prefix' => '/'], function () {

    Route::group(['prefix' => '/door', 'middleware' => ['throttle:5,3']], function () {

        Route::post('/login', 'DoorController@login');

        Route::post('/register', 'DoorController@register');

        Route::get('/captcha', 'DoorController@captcha');

        Route::get('/logout', 'DoorController@logout');
    });
});