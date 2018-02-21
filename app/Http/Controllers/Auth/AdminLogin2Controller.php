<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminLogin2Controller extends Controller
{

    /**店家登录页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin(Request $request)
    {
        $request->session()->forget('shopname');
        return view('admin2.login');
    }

    /**店家登录控制
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLog(Request $request)
    {
        $data = $request->except('_token');

        $res = DB::table('shop')->where('phone', $data['phone'])->first();
        // dd($res->password);
        if (!empty($res)) {
            $pass = Hash::check($data['password'], $res->password);
            // 判断用户输入密码与数据库密码一致
            if ($pass) {
                $res1 = $res->shopname;
                // dd($res1);
                session(['shopname' => $res1]);

                return redirect('admin2/index')->with('success', '恭喜，登录成功');
            } else {
                // 密码不正确区间
                return back()->withInput()->with('error', '密码错误，请检查');
            }

        } else {
            // 用户名不存在区间
            return back()->withInput()->with('error', '账号不存在');

        }
    }
}
