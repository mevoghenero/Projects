<?php

use Dingo\Api\Routing\Router;


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function (Router $api) {

    $api->group(["prefix"=>"account","namespace"=>'Glook\Modules\Account\Api\v1\Controllers'],function () use($api){
        
        // Api Route for Users
        $api->post('/register','UserController@register');
        $api->post('/login','UserController@login');
        $api->get('/list/users/all', "UserController@index");
        $api->get('/list/user/{id}', "UserController@getById");
        $api->put('/update/user/{id}', "UserController@update");
        $api->delete('/delete/user/{id}', "UserController@delete");


        // Api Route for Schedules
        $api->post('/create/schedule','ScheduleController@create');
        $api->get('/schedules/all', "ScheduleController@index");
        $api->get('/list/schedule/{id}', "ScheduleController@getById");
        $api->post('/update/schedule/{id}', "ScheduleController@update");
        $api->delete('/delete/schedule/{id}', "ScheduleController@delete");


        // Api Route for Profile
        $api->get('/profiles/all', "ProfileController@index");
        $api->get('/list/profile/{id}', "ProfileController@getById");


        // Api Route for Review
        // $api->post('/create/review','ReviewController@create');
        // $api->get('/reviews/all', "ReviewController@index");
        // $api->get('/list/review/{id}', "ReviewController@getById");
        // $api->put('/update/review/{id}', "ReviewController@update");
        // $api->delete('/delete/review/{id}', "ReviewController@delete");

        // Api Route for Payment
        $api->post('/create/payment','PaymentController@create');
        $api->get('/payments/all', "PaymentController@index");
        $api->get('/list/payment/{id}', "PaymentController@getById");

        //  Api route for paystack integration
        $api->post('/pay', 'PaymentController@redirectToGateway')->name('pay');
        $api->get('/payment/callback', 'PaymentController@handleGatewayCallback');

    });

});
