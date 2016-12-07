<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\ProjectRepository;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\DrawmoneyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{

    protected $val;
    public function __construct(ProjectRepository $val){
        $this -> val = $val;
    }

    //四种事务前置密码验证：
    public function showDeposit(Request $request){
        $errors = $this -> val -> passCheck($request);
        if(empty($errors)){
            $request -> session() ->put('passcheck', '1');
            return redirect('/deposit/update');
        }else{
            return redirect('/depositval') -> withErrors($errors) -> withInput();
        }
    }
    public function showDrawmoney(Request $request){
        $errors = $this -> val -> passCheck($request);
        if(empty($errors)){
            $request -> session() ->put('passcheck', '1');
            return redirect('/drawmoney/update');
        }else{
            return redirect('/drawmoneyval') -> withErrors($errors) -> withInput();
        }
    }
    public function showSelf(Request $request){
        $errors = $this -> val -> passCheck($request);
        if(empty($errors)){
            $request -> session() ->put('passcheck', '1');
            return redirect('/self');
        }else{
            return redirect('/selfval') -> withErrors($errors) -> withInput();
        }
    }
    public function showNote(Request $request){
        $errors = $this -> val -> passCheck($request);
        if(empty($errors)){
            $request -> session() ->put('passcheck', '1');
            return redirect('/note');
        }else{
            return redirect('/noteval') -> withErrors($errors) -> withInput();
        }
    }

    //存款：
    public function depositUpdate(DepositRequest $request){
        $this -> val -> deposit($request);
        return redirect('/deposit/success');
    }

    //取款：
    public function drawmoneyUpdate(DrawmoneyRequest $request){
        $errors = $this -> val ->drawmoney($request);
        if(empty($errors))
            return redirect() -> route('drawmoney.success');
        else
            return Redirect::back() -> withErrors($errors) -> withInput();
    }

    //个人信息：
    public function self(Request $request){
        $user = Auth::user() -> get();
        $request -> session() ->put('passcheck', '0');
        return view('project/self', compact('user'));
    }

    //存取记录：
    public function note(Request $request){
        $liushui = Auth::user() -> liushuis() -> get();
        $request -> session() ->put('passcheck', '0');
        return view('project/note',compact('liushui'));
    }
}
