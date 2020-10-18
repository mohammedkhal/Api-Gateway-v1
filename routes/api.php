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
$router->group(['middleware' => 'auth'], function () use ($router) {
/**
 *   Student Micro-service
 */
$router->group(['namespace' => 'V1\Student', 'prefix' => 'gateway/students'], function () use ($router) {
    $router->get('', 'IndexController@index');
    $router->post('', 'CreateController@store');
    $router->get('/{student_uuid}', 'IndexController@show');
    $router->put('/{student_uuid}', 'EditController@update');
    $router->delete('/{student_uuid}', 'EditController@destroy');
});

/**
 *   Lecturer Micro-service
 */
$router->group(['namespace' => 'V1\Lecturer', 'prefix' => 'gateway/lecturers'], function () use ($router) {
    $router->get('', 'IndexController@index');
    $router->post('', 'CreateController@store');
    $router->get('/{lecturer_uuid}', 'IndexController@show');
    $router->put('/{lecturer_uuid}', 'EditController@update');
    $router->delete('/{lecturer_uuid}', 'EditController@destroy');
});
});
/**
 *   User Gate Way The Kernal
 */
$router->group(['namespace' => 'V1\User', 'prefix' => 'gateway/users'], function () use ($router) {
    $router->post('/sign-in', 'Auth\AuthController@signIn');
    $router->get('', 'IndexController@index');
    $router->post('', 'CreateController@store');
    $router->get('/{user_uuid}', 'IndexController@show');
    $router->put('/{user_uuid}', 'EditController@update');
    $router->delete('/{user_uuid}', 'EditController@destroy');
});
