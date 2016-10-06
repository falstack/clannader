<?php

use Illuminate\Http\Request;


Route::group(['prefix' => '/','middleware' => ['auth:api']], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});