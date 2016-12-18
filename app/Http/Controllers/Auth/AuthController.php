<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 注册和登录登出控制器
    |--------------------------------------------------------------------------
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * 用户注册后或登陆后跳转到那个页面。
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * 验证部分，对注册时提交的数据在后台服务器进行验证，以防止前台js不可用时无法验证
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|digits:6|confirmed',
            'pincodes' => 'digits:18|unique:users',
            'phone' => 'digits:11|unique:users',
        ], $messages = [
            'name.required' => '用户名不可为空！',
            'name.max' => '用户名过长！',
            'email.required' => '邮箱不可为空！',
            'email.email' => '必须是邮箱！',
            'email.max' => '邮箱过长！',
            'email.unique' => '邮箱已被注册！！',
            'password.required' => '密码不可为空！',
            'password.digits' => '密码必须是6位数字！',
            'password.confirmed' => '两次密码必须一致！',
            'pincodes.digits' => '请输入正确的身份证号码！',
            'pincodes.unique' => '身份证已被注册！',
            'phone.digits' => '请输入正确的手机号！',
            'phone.unique' => '手机号已被注册！',
        ]);
    }

    /**
     * 在经过验证器验证之后创建新用户
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'pincodes' => $data['pincodes'],
            'phone' => $data['phone'],
        ]);
    }
}
