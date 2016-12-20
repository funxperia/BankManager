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
     /*
    |--------------------------------------------------------------------------
    | 事务控制器，控制存款取款，密码验证，查询信息事务代码的调配。
    |--------------------------------------------------------------------------
    */

    /**
     * 使用魔术方法实例化事务逻辑类
     *
     * @param  ProjectRepository $val
     * @return  $this -> val
     */
    protected $val;
    public function __construct(ProjectRepository $val){
        $this -> val = $val;
    }
    /**
     *存款时密码检测
     *
     * @param Request $request
     * @return Redirect
     */
    public function valDeposit(Request $request){
        $errors = $this -> val -> passCheck($request);
        if(empty($errors)){
            $request -> session() ->put('passCheck', '1');
            return redirect('/deposit/update');
        }else{
            return redirect('/depositval') -> withErrors($errors) -> withInput();
        }
    }
    /**
     *取款时密码检测
     *
     * @param Request $request
     * @return Redirect
     */
    public function valDrawMoney(Request $request){
        $errors = $this -> val -> passCheck($request);
        if(empty($errors)){
            $request -> session() ->put('passCheck', '1');
            return redirect('/drawmoney/update');
        }else{
            return redirect('/drawmoneyval') -> withErrors($errors) -> withInput();
        }
    }
    /**
     *查询个人信息时密码检测
     *
     * @param Request $request
     * @return Redirect
     */
    public function valSelf(Request $request){
        $errors = $this -> val -> passCheck($request);
        if(empty($errors)){
            $request -> session() ->put('passCheck', '1');
            return redirect('/self');
        }else{
            return redirect('/selfval') -> withErrors($errors) -> withInput();
        }
    }
    /**
     *查询存取款记录时密码检测
     *
     * @param Request $request
     * @return Redirect
     */
    public function valNote(Request $request){
        $errors = $this -> val -> passCheck($request);
        if(empty($errors)){
            $request -> session() ->put('passCheck', '1');
            return redirect('/note');
        }else{
            return redirect('/noteval') -> withErrors($errors) -> withInput();
        }
    }
    /**
     * 进行存款
     *
     * @param DepositRequest $request
     * @return Redirect
    */
    public function depositUpdate(DepositRequest $request){
        $this -> val -> deposit($request);
        return redirect('/deposit/success');
    }
    /**
     * 进行存款
     *
     * @param DrawmoneyRequest $request
     * @return Redirect
     */
    public function drawMoneyUpdate(DrawmoneyRequest $request)
    {
        $errors = $this->val->drawMoney($request);
        if (empty($errors))
            return redirect()->route('drawmoney.success');
        else
            return Redirect::back()->withErrors($errors)->withInput();
    }
    /**
     * 进行个人信息查询
     *
     * @param Request $request
     * @return view
     */
    public function self(Request $request){
        $user = Auth::user() -> get();
        $request -> session() ->put('passCheck', '0');
        return view('project/self', compact('user'));
    }
    /**
     * 进行存取款记录查询
     *
     * @param Request $request
     * @return view
     */
    public function note(Request $request){
        $liuShui = Auth::user() -> liuShuis() -> get();
        $request -> session() ->put('passCheck', '0');
        return view('project/note',compact('liuShui'));
    }
}
