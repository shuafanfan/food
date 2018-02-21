<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use DB;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserSafeRequest;
use Ucpaas;

class PersondoController extends Controller
{
    /** 用户资料修改
     * @param UserPostRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postUpdate(UserPostRequest $request)
    {
        $id = \Auth::user()['id'];
        $data = $request->except(['_token', 'phone']);
        $data['pic'] = $this->upload($request);


        $data2 = $request->only('phone');

        $res = DB::table('userinfo')->where('uid', $id)->update($data);
        $res2 = DB::table('users')->where('id', $id)->update($data2);
        if ($res) {
            return redirect('/home-person/order6')->with('success', '用户修改成功');
        } else {
            return back()->withInput();
        }
    }

    /** 头像上传
     * @param $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function upload($request)
    {
        //判断是否有文件上传
        if ($request->hasFile('pic')) {
            //随机文件名
            $name = md5(time() + rand(1, 999999));
            //获取文件的后缀名
            $suffix = $request->file('pic')->getClientOriginalExtension();
            $arr = ['png', 'jpeg', 'gif', 'jpg'];
            if (!in_array($suffix, $arr)) {
                return back()->with('error', '上传文件格式不正确');
            }
            $request->file('pic')->move('./uploads/', $name . '.' . $suffix);
            //返回路径
            return '/uploads/' . $name . '.' . $suffix;
        }
    }

    /** 资料页用户位置修改
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postUpdate2(Request $request)
    {
        $id = \Auth::user()['id'];
        $data = $request->except(['_token']);
        $res = DB::table('userpos')->where('uid', $id)->update($data);

        if ($res) {
            return redirect('/home-person/order7')->with('success', '用户修改成功');
        } else {
            return back()->withInput();
        }
    }

    /** 结算页用户位置修改
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postUpdate3(Request $request)
    {
        $id = \Auth::user()['id'];
        $data = $request->except(['_token']);

        $res = DB::table('userpos')->where('uid', $id)->update($data);

        if ($res) {
            return back()->with('success', '用户修改成功');
        } else {
            return back()->withInput();
        }
    }

    /** 支付完成
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postPay(Request $request)
    {
        // 订单状态


        $data = $request->all();

        $data1 = $request->only('nickname', 'nickphone', 'pos', 'creat_time', 'sum', 'remark');
        $sum = $request->input('sum');
        $phone = \Auth::user()['phone'];
        $id = \Auth::user()['id'];
        $Checkout = $request->input('Checkout');
        $ordernum = rand(10000, 99999);
        $data1['phone'] = $phone;
        $data1['pay_id'] = $Checkout['pay_id'];
        $data1['best_time'] = $Checkout['best_time'];
        $data1['ordernum'] = $ordernum;
        $shopname = $request->input('shopname');
        $shopname3 = array_unique($shopname);

        $shopname1 = implode(" ", $shopname3);

        $data1['shopname'] = $shopname1;
        $res1 = DB::table("order")->insert($data1);

        // 订单商品详情
        $shopname = $request->input('shopname');
        $name = $request->input('name');
        $price = $request->input('price');
        $num = $request->input('num');


        foreach ($shopname as $k => $v) {
            $data3[$k]['shopname'] = $v;
        }
        foreach ($name as $k => $v) {
            $data3[$k]['name'] = $v;
        }
        foreach ($price as $k => $v) {
            $data3[$k]['price'] = $v;
        }
        foreach ($num as $k => $v) {
            $data3[$k]['num'] = $v;
        }

        foreach ($data3 as $k => $v) {

            $v['ordernum'] = $ordernum;
            $res2 = DB::table("ordergoods")->insert($v);
            $bool4 = DB::table('shop')
                ->where('shopname', 'like', '%' . $v['shopname'] . '%')
                ->increment("money", ($v['price'] * $v['num']));
        }

        // 食客订单数量递增和消费累加
        $bool = DB::table("userinfo")->where('uid', $id)->increment("count");
        $bool2 = DB::table("userinfo")->where('uid', $id)->increment("pay", $sum);
        // 店铺订单数量递增和消费累加
        foreach ($shopname3 as $k => $v) {
            $bool3 = DB::table("shop")->where('shopname', $v)->increment("count");
        }

        return view('home.end', ['ordernum' => $ordernum, 'data1' => $data1]);
    }


    /** 用户密码修改
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postUpdatekey(Request $request)
    {
        $oldpassword = $request->input('oldpassword');
        $password = $request->input('password');
        $data = $request->all();
        $rules = [
            'oldpassword' => 'required|between:6,20',
            'password' => 'required|between:6,20|confirmed',
        ];
        $messages = [
            'required' => '密码不能为空o',
            'between' => '密码必须是6~20位之间',
            'confirmed' => '新密码和确认密码不匹配'
        ];
        $validator = Validator::make($data, $rules, $messages);
        $user = Auth::user();
        $validator->after(function ($validator) use ($oldpassword, $user) {
            if (!\Hash::check($oldpassword, $user->password)) {
                $validator->errors()->add('oldpassword', '原密码错误');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator);  //返回一次性错误
        }
        $user->password = bcrypt($password);
        $user->save();
        Auth::logout();  //更改完这次密码后，退出这个用户
        return redirect('/login');
    }

    /**支付密码验证
     * @param Request $request
     */
    public function postMessage(Request $request)
    {
        $data = $request->input('phone');

        //require_once('/app/Library/Ucpaas.class.php');
        $options['accountsid'] = '7e01be14cb286e07fb6c096575c4b837';
        $options['token'] = '4e890c9c1af1a0e8ba9cdb439f292bca';
        $ucpass = new Ucpaas($options);
        echo $ucpass->getDevinfo('json');
        $appId = "60ec2aa8082a406a81d1691dcb65c3fa";
        $to = $data;
        $templateId = "40019";
        $code = rand(1000, 9999);
        $param = $code;
        session(['code' => $code]);
        echo $ucpass->templateSMS($appId, $to, $templateId, $param);

    }

    /** 短信验证码是否正确
     * @param Request $request
     * @return int
     */
    public function postCode(Request $request)
    {
        $code = $request->input('code');
        if (empty($code)) {
            return 3;
        }
        if ($code == session('code')) {
            return 1;
        } else {
            return 2;
        }
    }

    /** 购物车跳到结算页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAccounts(Request $request)
    {   
        // 接收购物车的信息
        $data = $request->all();
        $data = array_chunk($data, 5);
        $aa = array_pop($data);
        //dd($data);
        foreach ($data as $k => $v) {
            $arr = explode('->', $v[1]);

            $shopname = $arr[0];
            $name = $arr[1];

            $res[] = DB::table('food')
                ->where('name', $name)
                ->where('shopname', $shopname)
                ->get();
            //dd($res);
            $res[$k][0]->num = $data[$k][0];
        }
        //dd($res);
        // 个人信息遍历
        $id = \Auth::user()['id'];

        $data2 = DB::table('userpos')
            ->where('uid', $id)
            ->get();

        //dd($data2);
        return view('home.accounts', ['data' => $res, 'data2' => $data2]);
    }

    /** 顾客收餐操作
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getOrderarrive(Request $request)
    {
        $ordernum = $request->all();
        $data = DB::table('order')
            ->where('ordernum', $ordernum)
            ->update(['status' => '已完成']);
        return back();

    }

    /** 顾客退单操作
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getOrdercancel(Request $request)
    {
        $ordernum = $request->all();
        $data = DB::table('order')
            ->where('ordernum', $ordernum)
            ->update(['status' => '退单中']);
        return back();
    }

}
