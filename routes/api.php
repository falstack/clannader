<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['namespace' => 'App\Http\Controllers', 'middleware' => ['throttle:30']], function ($api) {

        $api->get('/background', 'OtherController@backgroundShow');

        $api->post('/uptoken', 'OtherController@uptoken')->middleware('jwt.auth');

        $api->post('/like', 'RelationController@agree')->middleware('jwt.auth');

        $api->group(['prefix' => '/query'], function ($api) {

            $api->get('/index', 'QueryController@index');
        });

        $api->group(['prefix' => '/bangumi'], function ($api) {

            $api->post('/info', 'BangumiController@info');
        });

        $api->group(['prefix' => '/people'], function ($api) {

            $api->post('/info', 'PeopleController@info');
        });

        $api->group(['prefix' => '/post'], function ($api) {

            $api->get('/all', 'PostController@all');

            $api->post('/show', 'PostController@show');
        });

        $api->group(['prefix' => '/comment'], function ($api) {

            $api->post('/list', 'RelationController@list');

            $api->post('/store', 'RelationController@store')->middleware('jwt.auth');

            $api->post('/delete', 'RelationController@delete')->middleware('jwt.auth');

            $api->post('/reply', 'RelationController@reply')->middleware('jwt.auth');
        });
    });

});