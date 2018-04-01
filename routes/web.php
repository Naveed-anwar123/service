<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'api/v1'],function($router){

    // End points for Posts

    $router->group(['prefix'=>'posts' , 'middleware' => 'auth'],function($router){
        $router->post('add','PostController@createPost');
        $router->get('view/{id}','PostController@viewPost');
        $router->put('edit/{id}','PostController@updatePost');
        $router->delete('delete/{id}','PostController@deletePost');
        $router->get('index','PostController@index');
    });


    // End points for Users

    $router->group(['prefix'=>'users'],function($router){
        $router->post('add','UserController@addUser');
        $router->get('view/{id}','UserController@viewUser');
        $router->put('edit/{id}','UserController@updateUser');
        $router->delete('delete/{id}','UserController@deleteUser');
        $router->get('index','UserController@index');
    });






});


