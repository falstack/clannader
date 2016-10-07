<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['namespace' => 'App\Http\Controllers', 'middleware' => ['throttle:30']], function ($api) {

        $api->group(['prefix' => '/post'], function ($api) {

            $api->get('/news', 'PostController@news');

            $api->post('/show', 'PostController@show');
        });

        $api->group(['prefix' => '/comment'], function ($api) {

            $api->post('/list', 'RelationController@list');

            $api->post('/store', 'RelationController@store')->middleware('jwt.auth');

            $api->post('/agree', 'RelationController@agree')->middleware('jwt.auth');

            $api->group(['prefix' => '/reply'], function ($api) {

                $api->post('/list', 'RelationController@replyList');

                $api->post('/store', 'RelationController@replyStore')->middleware('jwt.auth');
            });
        });
    });

});