<?php

Route::get('/', function () {
    Auth::loginUsingId(1);

    return view('welcome');
});

Route::get('/foo', function () {
    return view('welcome');
});
