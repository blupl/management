<?php

use Illuminate\Routing\Router;
use Orchestra\Support\Facades\Foundation;

/*
|--------------------------------------------------------------------------
| Frontend Routing
|--------------------------------------------------------------------------
*/

Foundation::group('blupl/management', 'management', ['namespace' => 'Blupl\Management\Http\Controllers'], function (Router $router) {
    $router->post('printing/pdf/batch', 'PrintingController@batchPrinting');
    $router->get('printing/pdf/{id}', 'PrintingController@pdf');
    $router->get('printing/{id}', 'PrintingController@show');
    $router->get('printing', 'PrintingController@index');

    $router->get('approval/pdf/{id}', 'ApprovalController@pdf');
    $router->get('approval/archive/{id}', 'ApprovalController@archive');
    $router->get('approval/member/{id}', 'ApprovalController@showReporter');
    $router->put('approval/zone/batch', 'ApprovalController@storeBatchApproval');
    $router->post('approval/zone/batch', 'ApprovalController@batchApproval');
    $router->put('approval/zone/{id}', ['as' => 'management.approval.zone', 'uses'=>'ApprovalController@update']);
    $router->get('approval/{id}', 'ApprovalController@show');
    $router->get('approval', 'ApprovalController@index');

    $router->post('member/registration', 'ManagementController@store');
    $router->get('member/registration', 'ManagementController@create');
    $router->get('member', 'ManagementController@index');
    $router->get('/', 'HomeController@index');

});

/*
|--------------------------------------------------------------------------
| Backend Routing
|--------------------------------------------------------------------------
*/

Foundation::namespaced('Blupl\Management\Http\Controllers\Admin', function (Router $router) {
    $router->group(['prefix' => 'management'], function (Router $router) {
        $router->get('/', 'HomeController@index');
        $router->match(['GET', 'HEAD', 'DELETE'], 'profile/{roles}/delete', 'HomeController@delete');

    });
});
