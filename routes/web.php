<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api'], function () use ($router) {
	 $router->post('farmers', ['uses' => 'FarmerController@register']);
	 //$router->post('farmers', ['uses' => 'LoginController@login']);
	 //$router->post('farmerdetails', ['uses' => 'editdetailsController@editDetails']);
});

$router->post('/login', 'LoginController@login');
$router->post('/editDetails', 'editdetailsController@editDetails');
$router->put('/update/{id}', 'editdetailsController@update');
$router->get('/getdetails/{telephone_number}', 'editdetailsController@getdetails');
//$router->put('/updatepw/{id}', 'FarmerController@updatepw');
//$router->get('/user', [ 'uses' => 'FarmerController@get_user']);
//$app->get('/farmer/{telephone_number}', ['middleware' => 'auth', 'uses' =>  'FarmerController@get_user']);

//$router->post('/register', 'FarmerController@register');