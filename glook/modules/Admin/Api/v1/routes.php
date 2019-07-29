<?php

use Dingo\Api\Routing\Router;


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function (Router $api) {

    $api->group(["prefix"=>"admin","namespace"=>'Glook\Modules\Admin\Api\v1\Controllers'],function () use($api){


         // Api Route for Roles
         $api->post('/create/role','RoleController@create');
         $api->get('/roles/all', "RoleController@index");
         $api->get('/list/role/{id}', "RoleController@getById");
         $api->put('/update/role/{id}', "RoleController@update");
         $api->delete('/delete/role/{id}', "RoleController@delete");
 

         // Api Route for organisations
        //  $api->post('/create/vendor','VendorController@create');
        //  $api->get('/vendors/all', "VendorController@index");
        //  $api->get('/list/organ/{id}', "OrganisationController@getById");
        //  $api->put('/update/organisation/{id}', "OrganisationController@update");
        //  $api->delete('/delete/organisation/{id}', "OrganisationController@delete");


    
   });
});