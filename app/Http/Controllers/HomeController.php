<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * 实例化auth中间件
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 调取系统首页
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome(Request $request){
        $request -> session() ->put('passCheck', '0');
        return view('welcome');
    }
}
