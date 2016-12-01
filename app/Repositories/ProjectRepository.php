<?php
namespace App\Repositories;

use App\User;
use App\Liushui;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProjectRepository{

    public function con(){
        $id = Auth::id();
        $user = User::findOrFail($id);
        return $user;
    }

    public function passCheck($request){
        $user = $this -> con();
        if (Hash::check($request['password'], $user['password'])) {
            return true;
        }else{
            return false;
        }
    }
    public function drawcheck($request){
        $user = $this -> con();
        if($request['drawmoney'] > $user['balance'])
            return false;
        else
            return true;
    }

    public function deposit($request){
        $user = $this -> con();
        $user['balance'] = $user['balance'] + (int)($request['deposit']);
        $user -> save();
    }
    public function drawmoney($request){
        $user = $this -> con();
        if($this ->drawcheck($request)){
            $user['balance'] = $user['balance'] - (int)($request['drawmoney']);
            $user -> save();
            return true;
        }else{
            return false;
        }
    }
}

