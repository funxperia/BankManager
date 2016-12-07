<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\ProjectRepository;

use App\Http\Requests\DepositRequest;

class ProjectController extends Controller
{

    protected $val;
    public function __construct(ProjectRepository $val){
        $this -> val = $val;
    }


    public function showDepositVal(){
        return view('validator/DepositValidation');
    }
    public function showDrawmoneyVal(){
        return view('validator/DrawmoneyValidation');
    }
    public function showSelfVal(){
        return view('validator/SelfValidation');
    }
    public function showNoteVal(){
        return view('validator/NoteValidation');
    }

    public function showDeposit(Request $request){
        if($this -> val -> passCheck($request)){
            return view('project/deposit');
        }else{
            $errors['password'] = "密码错误";
            return view('validator/DepositValidation',compact('errors'));
        }
    }
    public function showDrawmoney(Request $request){
        if($this -> val -> passCheck($request)){
            return view('project/drawmoney');
        }else{
            $errors['password'] = "密码错误";
            return view('validator/DrawmoneyValidation',compact('errors'));
        }
    }
    public function showSelf(Request $request){
        if($this -> val -> passCheck($request)){
            return view('project/self');
        }else{
            $errors['password'] = "密码错误";
            return view('validator/SelfValidation',compact('errors'));
        }
    }
    public function showNote(Request $request){
        if($this -> val -> passCheck($request)){
            return view('project/note');
        }else{
            $errors['password'] = "密码错误";
            return view('validator/NoteValidation',compact('errors'));
        }
    }

    public function depositUpdate(DepositRequest $request){
        $this -> val -> deposit($request);
        return Redirect::back();
    }
/*    public function drawmoneyUpdate(Request $request){
        if($this -> val ->drawmoney($request))
            return;
        else{
            $errors['drawmoney'] = "您的存款余额不足！";
            return view('project/drawmoney',compact('errors'));
        }
    }*/
    public function self(){

    }
    public function note(){

    }
}
