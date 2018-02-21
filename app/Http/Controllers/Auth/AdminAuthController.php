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

class AdminAuthController extends Controller
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
    protected $redirectAfterLogout = '/admin/index';
    protected $username = 'phone';
    protected $redirectPath = '/admin/userlist';
    
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
        ],[
             'phone.required' => '手机号码不能为空',
        	 'phone.regex' => '请输入11位手机号码',
            // 'email' => 'required|email|max:255|unique:users',
            'password.required' => '密码必须是6~20位数字或字母',
             'remember_token' =>'请先同意条款',	
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
