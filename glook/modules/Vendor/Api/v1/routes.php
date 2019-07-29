<?php

use Dingo\Api\Routing\Router;


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function (Router $api) {

    $api->group(["prefix" => "vendor", "namespace" => 'Glook\Modules\Vendor\Api\v1\Controllers'], function () use ($api) {


        // Api Route for Employees

        $api->post('/create/employee', 'EmployeeController@create'); //route to create employee
        $api->get('/employees/all', "EmployeeController@index");//route to get all employees
        $api->get('/list/employees/{id}', "EmployeeController@getById");//route to get a single employee
        $api->put('/update/employee/{id}', "EmployeeController@update");//route to update an employee
        $api->delete('/delete/employee/{id}', "EmployeeController@delete");//route to delete an employee
        $api->get('/list/vendor/{id}/employees', "EmployeeController@getVendorId");//route to get a particular vendors employee



        // Api Route for Outlets
        $api->post('/create/outlet', 'OutletController@create'); //create an outlet
        $api->get('/outlets/all', "OutletController@index"); //get all outlets
        $api->get('/list/outlet/{id}', "OutletController@getById");//get a single outlet
        $api->put('/update/outlet/{id}', "OutletController@update");//update an outlet
        $api->delete('/delete/outlet/{id}', "OutletController@delete");//delete an outlet
        $api->get('/list/vendor/{id}/outlets', "OutletController@getVendorId");//get all outlets of a particular vendor


        // Api Route for  Services

        $api->post('/create/service', 'ServiceController@create');//create a service
        $api->get('/services/all', "ServiceController@index");//get all services
        $api->get('/list/service/{id}', "ServiceController@getById");//get a single service
        $api->post('/update/service/{id}', "ServiceController@update");//update a service
        $api->delete('/delete/service/{id}', "ServiceController@delete");//delete a service
        $api->get('/list/vendor/{id}/services', "ServiceController@getVendorId");//get services of a particular vendor


        //Api Route for Vendors
        $api->get('/vendors/all', "VendorController@index");//get all vendors
        $api->post('/create/vendor', 'VendorController@create'); //create a vevdor account
        $api->get('/vendors/{id}', 'VendorController@getById');//get a single vendor


        //Api Route for reviews
        $api->post('/vendors/{id}/reviews', "ReviewController@create"); //create a review for a vendor
        $api->get('/vendors/{id}/reviews', "ReviewController@getVendorId"); //get reviews of a vendor
        $api->get('/vendors/reviews/all', "ReviewController@index"); //get all reviews
        $api->get('/vendors/reviews/{id}', "ReviewController@getById"); //get reviews ID


    });
});
