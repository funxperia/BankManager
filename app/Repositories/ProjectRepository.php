<?php
namespace App\Repositories;

use App\User;
use App\Liushui;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProjectRepository{

    public function con(){
        $id = Auth::id();
        $user = User::findOrFail($id);
        return $user;
    }

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

    public function deposit($request){
        $user = $this -> con();
        $user['balance'] = $user['balance'] + (int)($request['deposit']);
        $user -> save();
        $request -> user() -> liushuis() -> create(['status' => '存款', 'operate' => (int)($request['deposit'])]);
        $request -> session() ->put('passcheck', '0');
    }

    public function drawcheck($request){
        $user = $this -> con();
        if((int)($request['drawmoney']) <= $user['balance'])
            return true;
        else
            return false;
    }
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

