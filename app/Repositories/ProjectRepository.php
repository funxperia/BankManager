<?php
namespace App\Repositories;

use App\User;
use App\Liushui;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProjectRepository{
    /*
   |--------------------------------------------------------------------------
   | 事务逻辑类，包含读取当前用户信息、密码检验、存款、取款、检验用户余额逻辑
   |--------------------------------------------------------------------------
   */

    /**
     *读取当前用户信息
     *
     * @return $user
     */
    public function con(){
        $id = Auth::id();
        $user = User::findOrFail($id);
        return $user;
    }
    /**
     * 密码检验
     *
     * @param $request
     * @return $errors
     */
    public function passCheck($request){
        $user = $this -> con();
        if (Hash::check($request['password'], $user['password'])) {
            $errors = null;
            return $errors;
        }else{
            $errors['password'] = "密码错误";
            return $errors;
        }
    }
    /**
     * 存款逻辑
     *
     * @param  $request
     * @return  void
     */
    public function deposit($request){
        $user = $this -> con();
        $user['balance'] = $user['balance'] + (int)($request['deposit']);
        $user -> save();
        $request -> user() -> liushuis() -> create(['status' => '存款', 'operate' => (int)($request['deposit'])]);
        $request -> session() ->put('passcheck', '0');
    }
    /**
     * 检测用户余额，如果取款数小于等于用户余额，则可以取款，否则不可以取款
     *
     * @param  $request
     * @return  bool
     */
    public function drawcheck($request){
        $user = $this -> con();
        if((int)($request['drawmoney']) <= $user['balance'])
            return true;
        else
            return false;
    }
    /**
     * 取款逻辑
     *
     * @param  $request
     * @return  void
     */
    public function drawmoney($request){
        $user = $this -> con();
        if($this ->drawcheck($request)){
            $user['balance'] = $user['balance'] - (int)($request['drawmoney']);
            $user -> save();
            $request -> user() -> liushuis() -> create(['status' => '取款', 'operate' => (int)($request['drawmoney'])]);
            $request -> session() ->put('passcheck', '0');
            $errors = null;
            return $errors;
        }else{
            $errors['drawmoney'] = "您的存款余额不足！";
            return $errors;
        }
    }
}

