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
$router->post('/insertestimate', 'estimateController@insertestimate');
$router->get('/showestimate/{rep_id}', [ 'uses' => 'estimateController@showestimate']);
$router->get('/viewagrihis/{ao_id}', [ 'uses' => 'applicationviewsController@viewagrihis']);
$router->get('/viewaihis/{ai_id}', [ 'uses' => 'applicationviewsController@viewaihis']);
$router->get('/viewdohis/{do_id}', [ 'uses' => 'applicationviewsController@viewdohis']);
$router->get('/viewagrireport/{app_id}', [ 'uses' => 'statusController@viewagrireport']);
$router->get('/getobtain/{nic}', [ 'uses' => 'paymentController@getobtain']);
$router->get('/getobtainbyid/{obtain_id}', [ 'uses' => 'paymentController@getobtainbyid']);
//$router->put('/updatepw/{id}', 'FarmerController@updatepw');
//$router->get('/user', [ 'uses' => 'FarmerController@get_user']);

//$app->get('/farmer/{telephone_number}', ['middleware' => 'auth', 'uses' =>  'FarmerController@get_user']);

//$router->post('/register', 'FarmerController@register');


////// For Bank ////

$router->post('/login2', 'Login2Controller@login');


$router->get('/bankDetails2/{bank_id}', 'Bank2Controller@bankDetails');//to retrive bank details using bank id


$router->post('/createLoan2', 'Loan2Controller@createLoan');//to create a new loan scheme from the bank

$router->get('/getLoanDetails2/{loan_id}','Loan2Controller@getLoanDetails');//to retrive all details of relavant loan scheme
$router->post('/updateLoan2/{loan_id}', 'Loan2Controller@updateLoan');//to update existing loan scheme details
//$router->put('/updateLoan/{loan_id}', 'LoanController@updateLoan');//to update existing loan scheme details


$router->get('/getLoans2/{bank_id}','Loan2Controller@getLoans');//retrive all loan schemes from the relavant bank
$router->get('/getApplicationDetails2/{loan_id}', 'Request2Controller@getApplicationDetails');//retrive name & date for view of applicant requests
$router->get('/getFarmerDetails2/{id}','Request2Controller@getFarmerDetails');//retrive farmer details for farmer personal information
$router->get('/getApplicantDetails2/{app_id}', 'Request2Controller@getApplicantDetails');//to retrive every information in a application

$router->get('/getaccounts2/{nic}', [ 'uses' => 'account2Controller@getaccounts']);
$router->get('/getapproveDetailsbyappid2/{application_id}', 'approveloans2Controller@getapproveDetailsbyappid');


$router->get('/getObtainedDetails2/{loan_id}', 'ObtainedLoans2Controller@getObtainedDetails');
$router->get('/getObtainedFarmerDetails2/{id}', 'ObtainedLoans2Controller@getObtainedFarmerDetails');


$router->get('getFarmerLoans2/{nic}/{bank_id}', 'Payment2Controller@getFarmerLoans2');//to obtain loan details using nic and bank id
$router->post('getFarmerLoans2/{nic}/{bank_id}', 'Payment2Controller@getFarmerLoans');//to obtain loan details using nic

$router->get('getPayments2/{obtain_id}', 'Payment2Controller@getPayments');//to retrive farmer payment details to a table

$router->get('/getreports2/{app_id}/{type}', [ 'uses' => 'agrireports2Controller@getreports']);
$router->get('/viewagrirepo2/{app_id}', [ 'uses' => 'agrireports2Controller@viewagrirepo']);

$router->get('/showARloans2/{app_id}', 'Request2Controller@showARloans');
$router->get('/showestimate2/{app_id}', 'Request2Controller@showestimate');
$router->post('/addPayment2', 'Payment2Controller@addPayment');//to add a payment to payments table
$router->post('/approveloan2', 'approveloans2Controller@approveloan');
$router->post('/updateagri2/{app_id}','Request2Controller@updateagri');
$router->post('/rejectloan2', 'approveloans2Controller@rejectloan');
$router->get('/getapproveDetails2/{loan_id}', 'approveloans2Controller@getapproveDetails');
$router->post('/updateapprove2/{approve_id}','approveloans2Controller@updateapprove');
$router->get('/getrejectDetails2/{loan_id}', 'approveloans2Controller@getrejectDetails');
$router->post('/obtainloan2', 'obtainloan2Controller@obtainloan');

$router->get('/getrejectDetailsbyappid2/{application_id}', 'approveloans2Controller@getrejectDetailsbyappid');
$router->get('/getobtainDetails2/{loan_id}', 'obtainloan2Controller@getobtainDetails');
$router->get('/getobtaineddetailsbyappid2/{application_id}', 'obtainloan2Controller@getobtaineddetailsbyappid');
$router->get('/getobtain2/{obtain_id}', 'obtainloan2Controller@getobtain');
$router->get('getPaymentsfi2/{obtain_id}', 'Payment2Controller@getPaymentsfi');
