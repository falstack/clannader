<?php

use Illuminate\Http\Request;
use Laravist\GeeCaptcha\GeeCaptcha;


Route::group(['prefix' => '/','middleware' => ['auth:api']], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['prefix' => '/'], function () {

    Route::get('/captcha', function () {
        $captcha = new GeeCaptcha(env('CAPCHA_ID'), env('CAPCHA_KEY'));

        return $captcha->GTServerIsNormal();
    });
});