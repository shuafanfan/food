<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    protected $redirectAfterLogout = '/home';
    protected $username = 'phone';
    protected $redirectPath = '/home/person';
    protected $loginPath='/home/login';
    //protected $username = 'name';
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'phone' => 'required|min:11|max:11|unique:users',
            // 'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8|max:20',
            'remember_token' =>'required',
            'code'=>'required|min:4|max:4',
        ],[
             'phone.required' => '手机号码不能为空',
             'phone.unique'=>'该号码已被注册',
             'phone.min' => '请输入11位手机号码',
        	 'phone.max' => '请输入11位手机号码',
             'code.required' => '验证码不正确',
             
             'code.min' => '验证码不正确',
             'code.max' => '验证码不正确',
            // 'email' => 'required|email|max:255|unique:users',
            'password.min' => '密码须是8~20位数字或字母',
            'password.max' => '密码须是8~20位数字或字母',
            'password.required' => '请设置您的密码',
            'password.confirmed' => '两次密码不一致',
            'remember_token.required' =>'请先同意条款',	
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // $res= User::create([
        //     'phone' => $data['phone'],
        //     // 'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        //      'remember_token' => bcrypt($data['remember_token']),
        // ]);
        return User::create([
            'phone' => $data['phone'],
            // 'email' => $data['email'],
            'password' => bcrypt($data['password']),
             'remember_token' => bcrypt($data['remember_token']),
        ]);

    }

    //  public function postLogin(Request $request)
    // {

    //     $data=$request->all();
    //     // 尝试登录
    //     if (Auth::attempt(['name' => $data['name'], 'password' => $data['password']])) {
    //         // 认证通过...
    //         return redirect()->intended('dashboard');
    //     }
    // }
    public function __destruct()
    {
        $id = \Auth::user()['id'];
        if(!empty($id)){
        $res= DB::table('userinfo')->where('uid',$id)->first();
          if(!$res){
            DB::table('userinfo')->insert(['uid'=>$id]);
            DB::table('userpos')->insert(['uid'=>$id]);
          }
        }
    }
}
