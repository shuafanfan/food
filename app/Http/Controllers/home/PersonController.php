<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use DB;

class PersonController extends Controller
{
    /** 订单评价
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEvaluate(Request $request)
    {
        if (!$request->input('evaluate')) {
            return back()->with('error', '提交内容为空');
        }
        $evaluate = $request->only('evaluate');


        $ordernum = $request->only('ordernum');

        $data = DB::table('order')
            ->where('ordernum', $ordernum)
            ->update($evaluate);
        return back()->with('success', '订单评价成功');

    }

    /** 订单详情
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder(Request $request)
    {
        $ordernum = $request->all();
        $data = DB::table('ordergoods')
            ->where('ordernum', $ordernum)
            ->get();

        return view('home.person.order', ['data' => $data]);
    }

    /** 未完成订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder1(Request $request)
    {

        $num = $request->input('num', 5);
        $phone = \Auth::user()['phone'];
        if ($request->input('keyword')) {
            $data1 = DB::table('order')
                ->where('creat_time', 'like', '%' . $request->input('keyword') . '%')
                ->where(['phone'=>$phone,'status'=>'派送中'])
                ->orwhere(['phone'=>$phone,'status'=>'等待商家接单'])
                ->paginate($num);
        } else {
            $data1 = DB::table('order')
                ->where(['phone'=>$phone,'status'=>'派送中'])
                ->orwhere(['phone'=>$phone,'status'=>'等待商家接单'])  
                ->paginate($num);

        }

        return view('home.person.order1', ['data1' => $data1]);
    }

    /** 已完成订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder2(Request $request)
    {
        $num = $request->input('num', 5);
        $phone = \Auth::user()['phone'];
        if ($request->input('keyword')) {
            $data1 = DB::table('order')
                ->where('creat_time', 'like', '%' . $request->input('keyword') . '%')
                ->where('phone', $phone)
                ->where('status', 'like', '%已完成%')
                ->paginate($num);
        } else {
            $data1 = DB::table('order')
                ->where('phone', $phone)
                ->where('status', 'like', '%已完成%')
                ->paginate($num);

        }

        return view('home.person.order2', ['data1' => $data1]);
    }

    /** 待评价订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder3(Request $request)
    {
        $num = $request->input('num', 5);
        $phone = \Auth::user()['phone'];
        if ($request->input('keyword')) {
            $data1 = DB::table('order')
                ->where('creat_time', 'like', '%' . $request->input('keyword') . '%')
                ->where('phone', $phone)
                ->where('status', 'like', '%已完成%')
                ->where('evaluate', null)
                ->paginate($num);
        } else {
            $data1 = DB::table('order')
                ->where('phone', $phone)
                ->where('status', 'like', '%已完成%')
                ->where('evaluate', null)
                ->paginate($num);

        }

        return view('home.person.order3', ['data1' => $data1]);
    }

    /** 退款订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder4(Request $request)
    {
        $num = $request->input('num', 5);
        $phone = \Auth::user()['phone'];
        if ($request->input('keyword')) {
            $data1 = DB::table('order')
                ->where('creat_time', 'like', '%' . $request->input('keyword') . '%')
                
                ->where(['phone'=>$phone,'status'=>'退单中'])
                ->orwhere(['phone'=>$phone,'status'=>'已退款'])
                ->paginate($num);
        } else {
            $data1 = DB::table('order')
                ->where(['phone'=>$phone,'status'=>'退单中'])
                ->orwhere(['phone'=>$phone,'status'=>'已退款'])
                ->paginate($num);

        }
        return view('home.person.order4', ['data1' => $data1]);
    }

    /**账户资产页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder5()
    {
        return view('home.person.order5');
    }

    /**用户资料页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder6()
    {
        $id = \Auth::user()['id'];
        // $res= DB::table('userinfo')->where('uid',$id)->first();
        // if(!$res){
        //   DB::table('userinfo')->insert(['uid'=>$id]);
        // }

        $data = DB::table('userinfo')->where('uid', '=', $id)->
        leftJoin('users', 'users.id', '=', 'userinfo.uid')->get();
        // dd($data);
        return view('home.person.order6', ['users' => $data]);

    }

    /**用户地址页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder7()
    {
        $id = \Auth::user()['id'];
        //  $res= DB::table('userpos')->where('uid',$id)->first();
        //  if(!$res){
        //   DB::table('userpos')->insert(['uid'=>$id]);
        // }
        $data = DB::table('userpos')->where('uid', '=', $id)->get();
        // dd($data);
        return view('home.person.order7', ['users' => $data]);


    }

    /**安全中心
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder8(Request $request)
    {
        // $id = \Auth::user()['id'];
        // $data = DB::table('userpos')->where('uid','=',$id)->get();

        return view('home.person.order8');
    }


}
