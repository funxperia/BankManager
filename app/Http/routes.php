<?php

/*
|--------------------------------------------------------------------------
| 系统路由模块
|--------------------------------------------------------------------------
本系统中，采用中间件检测方法来防止跨URL进行具体事务页面调取以跳过密码验证的行为。
*/

/**
 *首页路由
 */
Route::get('/',['as' => 'index', 'uses' => 'HomeController@welcome']);

/**
 *登录登出注册路由
 */
Route::auth();

/**
 *个人信息路由
 */
Route::get('/selfval',['as' => 'selfval.show', function(){return view('validator/selfValidation');}]); //调取验证页面
Route::post('/self',['as' => 'self.passCheck', 'uses' => 'ProjectController@valSelf']); //进行密码检测
Route::get('/self',['as' => 'self.show','middleware' => 'check', 'uses' => 'ProjectController@self']); //调取信息页面

/**
 *存取款记录路由
 */
Route::get('/noteval',['as' => 'noteval.show', function(){return view('validator/noteValidation');}]); //调取验证页面
Route::post('/note',['as' => 'note.passCheck', 'uses' => 'ProjectController@valNote']);//进行密码检测
Route::get('/note',['as' => 'note.show', 'middleware' => 'check','uses' => 'ProjectController@note']); //调取信息页面

/**
 *存款路由
 */
Route::get('/depositval',['as' => 'depositval.show', function(){return view('validator/depositValidation');}]);//调取验证页面
Route::post('/deposit',['as' => 'deposit.passCheck', 'uses' => 'ProjectController@valDeposit']);//进行密码检测
Route::group(['middleware' => 'check'], function () {
    Route::get('/deposit/update',[ 'as' => 'deposit.show', function(){ return view('project/deposit');}]); //调取存款页面
    Route::post('/deposit/update',[ 'as' => 'deposit.update', 'uses' => 'ProjectController@depositUpdate']); //进行存款
});
Route::get('/deposit/success',['as' => 'deposit.success', function(){return view('success/depositSuccess');}]); //调取存款成功页面

/**
 *取款路由
 */
Route::get('/drawmoneyval',['as' => 'drawmoney.show', function(){return view('validator/drawMoneyValidation');}]);//调取验证页面
Route::post('/drawmoney',['as' => 'drawmoney.passCheck', 'uses' => 'ProjectController@valDrawMoney']);//进行密码检测
Route::group(['middleware' => 'check'], function () {
    Route::get('/drawmoney/update', ['as' => 'drawMoney.show', function () {return view('project/drawMoney');}]);//调取存款页面
    Route::post('/drawmoney/update', ['as' => 'drawMoney.update', 'uses' => 'ProjectController@drawMoneyUpdate']);//进行存款
});
Route::get('/drawmoney/success',['as' => 'drawmoney.success', function(){return view('success/drawMoneySuccess');}]);//调取存款成功页面
