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

$router->get('/',  ['uses' => 'HomeController@home']);

$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('numberOfDays/{first_datetime}/{second_datetime}[/{type}]',  ['uses' => 'DateTimeController@numberOfDays']);
  $router->get('numberOfWeekdays/{first_datetime}/{second_datetime}[/{type}]',  ['uses' => 'DateTimeController@numberOfWeekdays']);
  $router->get('numberOfWeeks/{first_datetime}/{second_datetime}[/{type}]',  ['uses' => 'DateTimeController@numberOfWeeks']);
});
