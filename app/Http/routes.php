<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@welcome');

Route::auth();

Route::get('/depositval','ProjectController@showDepositVal');
Route::get('/drawmoneyval','ProjectController@showDrawmoneyVal');
Route::get('/selfval','ProjectController@showSelfVal');
Route::get('/noteval','ProjectController@showNoteVal');

Route::post('/deposit','ProjectController@showDeposit');
Route::post('/drawmoney','ProjectController@showDrawmoney');
Route::post('/self','ProjectController@showSelf');
Route::post('/note','ProjectController@showNote');

Route::patch('/deposit/update',[ 'as' => 'deposit.update', 'uses' => 'ProjectController@depositUpdate']);
/*Route::post('/drawmoney/update','ProjectController@drawmoeyUpdate');*/
