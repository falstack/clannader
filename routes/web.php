<?php

Route::get('/', function () {
    Auth::logout();

    return view('welcome');
});

Route::get('/foo', function () {
    return view('welcome');
});

Route::get('/bar', function () {
    return view('welcome');
});
