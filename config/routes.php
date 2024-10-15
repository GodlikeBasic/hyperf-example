<?php

declare(strict_types=1);


use Hyperf\HttpServer\Router\Router;

Router::get('/swagger', 'App\Controller\SwaggerController@index');
Router::addRoute(['GET', 'POST'],'/swagger/api', 'App\Controller\SwaggerController@api');

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');



Router::addGroup('/guest/', function () {
    Router::get('{id}', 'App\Controller\IndexController@getGuest');
    Router::post('store', 'App\Controller\IndexController@addGuest');
    Router::post('{id}', 'App\Controller\IndexController@updateGuest');
    Router::delete('{id}', 'App\Controller\IndexController@deleteGuest');
});

