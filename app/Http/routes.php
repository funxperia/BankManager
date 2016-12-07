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
//首页路由：
Route::get('/',['as' => 'index', 'uses' => 'HomeController@welcome']);

//用户路由：
Route::auth();

//个人信息路由：
Route::get('/selfval',['as' => 'selfval.show', function(){return view('validator/SelfValidation');}]);
Route::post('/self',['as' => 'self.passCheck', 'uses' => 'ProjectController@showSelf']);
Route::get('/self',['as' => 'self.show','middleware' => 'check', 'uses' => 'ProjectController@self']);

//存取款记录路由：
Route::get('/noteval',['as' => 'noteval.show', function(){return view('validator/NoteValidation');}]);
Route::post('/note',['as' => 'note.passCheck', 'uses' => 'ProjectController@showNote']);
Route::get('/note',['as' => 'note.show', 'middleware' => 'check','uses' => 'ProjectController@note']);

//存款路由：
Route::get('/depositval',['as' => 'depositval.show', function(){return view('validator/DepositValidation');}]);
Route::post('/deposit',['as' => 'deposit.passCheck', 'uses' => 'ProjectController@showDeposit']);
Route::group(['middleware' => 'check'], function () {
    Route::get('/deposit/update',[ 'as' => 'deposit.show', function(){ return view('project/deposit');}]);
    Route::post('/deposit/update',[ 'as' => 'deposit.update', 'uses' => 'ProjectController@depositUpdate']);
});
Route::get('/deposit/success',['as' => 'deposit.success', function(){return view('success/depositSuccess');}]);

//取款路由：
Route::get('/drawmoneyval',['as' => 'drawmoney.show', function(){return view('validator/DrawmoneyValidation');}]);
Route::post('/drawmoney',['as' => 'drawmoney.passCheck', 'uses' => 'ProjectController@showDrawmoney']);
Route::group(['middleware' => 'check'], function () {
    Route::get('/drawmoney/update', ['as' => 'drawmoney.show', function () {return view('project/drawmoney');}]);
    Route::post('/drawmoney/update', ['as' => 'drawmoney.update', 'uses' => 'ProjectController@drawmoneyUpdate']);
});
Route::get('/drawmoney/success',['as' => 'drawmoney.success', function(){return view('success/drawmoneySuccess');}]);


