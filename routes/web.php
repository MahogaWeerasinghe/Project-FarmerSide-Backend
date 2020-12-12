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
//$router->post('/test', 'LoginController@test');
$router->post('/editDetails', 'editdetailsController@editDetails');
//$router->put('/update/{id}', 'editdetailsController@update');
$router->get('/getdetails/{nic}', 'editdetailsController@getdetails');
$router->get('/getloans/{bank_id}', 'LoanController@getloans');
$router->get('/bankdetails', 'BankController@bankdetails');
$router->get('/getloandetails/{loan_id}', 'LoanController@getloandetails');
$router->post('/submitloan', 'applicationController@submitloan');
$router->post('/updatedetails/{nic}', 'editdetailsController@updatedetails');
$router->get('/getappdetails/{nic}', 'applicationController@getappdetails');
$router->post('/insertaccount', 'accountController@insertaccount');
$router->post('/submitAgrireports', 'agrireportsController@submitAgrireports');
$router->get('/showapplyloan/{nic}', 'applyloanController@showapplyloan');
$router->get('/insertagain/{loan_id}/{app_id}/{nic}/{date}', 'applicationviewsController@insertagain');
$router->get('/getapplicantdetails/{app_id}', [ 'uses' => 'applyloanController@getapplicantdetails']);
$router->get('/getreports/{app_id}/{type}', [ 'uses' => 'agrireportsController@getreports']);
$router->get('/getaccounts/{nic}', [ 'uses' => 'accountController@getaccounts']);
$router->get('/showrejectloan/{nic}', [ 'uses' => 'rejectloansController@showrejectloan']);
$router->get('/showrejectloandata/{application_id}', [ 'uses' => 'rejectloansController@showrejectloandata']);
$router->get('/showapproveloan/{nic}', [ 'uses' => 'approveloasController@showapproveloan']);
$router->get('/showapproveloandata/{application_id}', [ 'uses' => 'approveloasController@showapproveloandata']);

$router->get('/showpayments/{nic}', [ 'uses' => 'paymentController@showpayments']);
$router->get('/showpaymentdetails/{obtain_id}', [ 'uses' => 'paymentController@showpaymentdetails']);
$router->get('/showpaymentdetailslatest/{obtain_id}', [ 'uses' => 'paymentController@showpaymentdetails']);
$router->post('/loginofficer', 'officerloginController@loginofficer');
$router->get('/getAODetails/{nic}', [ 'uses' => 'officersdetailsController@getAODetails']);
$router->get('/getAIDetails/{nic}', [ 'uses' => 'officersdetailsController@getAIDetails']);
$router->get('/viewagri/{GN_No}', [ 'uses' => 'applicationviewsController@viewagri']);
$router->get('/getpers/{rep_id}', [ 'uses' => 'applicationviewsController@getpers']);
$router->post('/updateagri/{rep_id}','applicationviewsController@updateagri');
$router->post('/createagriloan','agriloansController@createagriloan');
$router->post('/createreport', 'applicationviewsController@createreport');
$router->get('/viewai/{GN_No}', [ 'uses' => 'applicationviewsController@viewai']);
$router->get('/updateagrio/{nic}', [ 'uses' => 'officersdetailsController@updateagrio']);
$router->get('/getDODetails/{nic}', [ 'uses' => 'officersdetailsController@getDODetails']);
$router->get('/viewdo/{Agr_service_dev}', [ 'uses' => 'applicationviewsController@viewdo']);
$router->get('/showstatus/{nic}', [ 'uses' => 'statusController@showstatus']);
$router->get('/showAO/{rep_id}', [ 'uses' => 'statusController@showAO']);
$router->get('/showAI/{rep_id}', [ 'uses' => 'statusController@showAI']);
$router->get('/showDO/{rep_id}', [ 'uses' => 'statusController@showDO']);
$router->get('/showAR/{rep_id}', [ 'uses' => 'applicationviewsController@showAR']);
$router->get('/showARloans/{rep_id}', [ 'uses' => 'applicationviewsController@showARloans']);
$router->get('/dltloans/{rep_id}', [ 'uses' => 'agriloansController@dltloans']);
//$router->put('/updatepw/{id}', 'FarmerController@updatepw');
//$router->get('/user', [ 'uses' => 'FarmerController@get_user']);

//$app->get('/farmer/{telephone_number}', ['middleware' => 'auth', 'uses' =>  'FarmerController@get_user']);

//$router->post('/register', 'FarmerController@register');

