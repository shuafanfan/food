<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminLoginController extends Controller
{
    /**管理员登录页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin(Request $request)
    {
        $request->session()->forget('sid');
        return view('admin.login');

    }

    /**管理员登录控制
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLog(Request $request)
    {
        $data = $request->except('_token');

        $res = DB::table('shop')
            ->where('phone', $data['phone'])
            ->where('auth', 2)
            ->first();

        if (!empty($res)) {
            $pass = Hash::check($data['password'], $res->password);
            // 判断用户输入密码与数据库密码一致
            if ($pass) {
                $res1 = $res->id;
                // dd($res1);
                session(['sid' => $res1]);

                return redirect('admin/index')->with('success', '恭喜，登录成功');
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
