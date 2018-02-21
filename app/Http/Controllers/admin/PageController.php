<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\ShopPostRequest;
use App\Http\Requests\ShopPostRequest2;

class PageController extends Controller
{
    /**跳转到主页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {

        return view('admin.index');
    }


    /** 跳转到食客列表页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserlist(Request $request)
    {

        $num = $request->input('num', 5);

        if ($request->input('keyword')) {
            $data = DB::table('users')
                ->orderBy('created_at', 'asc')
                ->leftJoin('userinfo', 'userinfo.uid', '=', 'users.id')
                ->where('phone', 'like', '%' . $request->input('keyword') . '%')
                ->where('auth', 1)
                ->paginate($num);
        } else {
            $data = DB::table('users')
                ->orderBy('created_at', 'asc')
                ->leftJoin('userinfo', 'userinfo.uid', '=', 'users.id')
                ->where('auth', 1)
                ->paginate($num);
            //dd($data);
        }


        return view('admin.user.list', ['users' => $data]);
    }


    /** 跳转到食客添加页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUseradd()
    {

        return view('admin.user.add');
    }

    /** 食客删除
     * @param Request $request
     */
    public function postUserdelete(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('users')->where('id', $id)->delete();
        $res2 = DB::table('userinfo')->where('uid', $id)->delete();
        $res3 = DB::table('userpos')->where('uid', $id)->delete();
        echo $res;

    }

    /** 食客放入黑名单
     * @param Request $request
     */
    public function postUserblack(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('users')
            ->where('id', $id)
            ->update(['auth' => 3]);

        echo $res;

    }

    /**黑名单显示
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserblack(Request $request)
    {
        $num = $request->input('num', 5);

        if ($request->input('keyword')) {
            $data = DB::table('users')
                ->orderBy('created_at', 'asc')
                ->leftJoin('userinfo', 'userinfo.uid', '=', 'users.id')
                ->where('phone', 'like', '%' . $request->input('keyword') . '%')
                ->where('auth', 3)
                ->paginate($num);
        } else {
            $data = DB::table('users')
                ->orderBy('created_at', 'asc')
                ->leftJoin('userinfo', 'userinfo.uid', '=', 'users.id')
                ->where('auth', 3)
                ->paginate($num);
            //dd($data);
        }


        return view('admin.user.blacklist', ['users' => $data]);

    }

    /** 食客恢复白名单
     * @param Request $request
     */
    public function postUserwhite(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('users')
            ->where('id', $id)
            ->update(['auth' => 1]);

        echo $res;

    }

    /** 跳转到店家添加页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShopadd()
    {

        return view('admin.shop.add');
    }


    /** 执行店家添加
     * @param ShopPostRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postShopinsert(ShopPostRequest $request)
    {
        $data = $request->except(['_token']);
        $data['pic'] = self::upload($request);
        $data['password'] = Hash::make($data['password']);

        $res = DB::table('shop')->insertGetId($data);
        if ($res) {
            return redirect('admin/shopadd')->with('success', '用户添加成功');
        } else {
            return back()->withInput();
        }

    }


    /** 店家logo上传
     * @param $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    static public function upload($request)
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
            $request->file('pic')->move('./shopuploads/', $name . '.' . $suffix);
            //返回路径
            return '/shopuploads/' . $name . '.' . $suffix;
        }
    }

    /** 店家用户列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShoplist(Request $request)
    {
        $num = $request->input('num', 5);

        if ($request->input('keyword')) {
            $data = DB::table('shop')
                ->where('phone', 'like', '%' . $request->input('keyword') . '%')
                ->where('auth', 1)
                ->orwhere('shopname', 'like', '%' . $request->input('keyword') . '%')
                ->orwhere('pos', 'like', '%' . $request->input('keyword') . '%')
                ->paginate($num);
        } else {
            $data = DB::table('shop')
                ->where('auth', 1)
                ->paginate($num);

        }
        return view('admin.shop.list', ['data' => $data]);
    }

    /** 店家删除
     * @param Request $request
     */
    public function postShopdelete(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('shop')->where('id', $id)->delete();

        echo $res;

    }

    /** 跳转到店家修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShopupdate(Request $request)
    {
        $data = $request->except(['_token']);
        $id = $request->input('id');
        $data = DB::table('shop')->where('id', $id)->get();

        return view('admin.shop.update', ['data' => $data]);

    }

    /** 店家修改动作
     * @param ShopPostRequest2 $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postShopedit(ShopPostRequest2 $request)
    {
        $id = $request->input('id');
        $data = $request->except(['_token']);
        $data['pic'] = self::upload($request);
        $data['password'] = Hash::make($data['password']);
        //dd($data);
        $res = DB::table('shop')->where('id', $id)->update($data);

        if ($res) {
            return redirect('admin/shoplist')->with('success', '店铺修改成功');
        } else {
            return back()->withInput();
        }
    }

    /** 店家上下线
     * @param Request $request
     */
    public function postShopchange(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        $res = DB::table('shop')
            ->where('id', $id)
            ->update(['status' => $status]);

        echo $res;
    }

    /** 订单详情页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrderinfo(Request $request)
    {
        $ordernum = $request->all();

        $data = DB::table('ordergoods')
            ->where('ordernum', $ordernum)
            ->get();

        return view('admin.order.orderinfo', ['data' => $data]);
    }


    /** 未接订单列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrderlist(Request $request)
    {

        $num = $request->input('num', 5);
        $shopname = session('shopname');
        if ($request->input('keyword')) {
            $data = DB::table('order')
                ->where('creat_time', 'like', '%' . $request->input('keyword') . '%')
                ->where('status', 'like', '%等待商家接单%')
                ->paginate($num);
        } else {

            $data = DB::table('order')
                ->where('status', 'like', '%等待商家接单%')
                ->paginate($num);

        }

        return view('admin.order.list', ['data' => $data]);
    }

    /** 派送订单列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrderlist2(Request $request)
    {

        $num = $request->input('num', 5);
        $shopname = session('shopname');
        if ($request->input('keyword')) {
            $data = DB::table('order')
                ->where('creat_time', 'like', '%' . $request->input('keyword') . '%')
                ->where('status', 'like', '%派送中%')
                ->paginate($num);
        } else {

            $data = DB::table('order')
                ->where('status', 'like', '%派送中%')
                ->paginate($num);

        }

        return view('admin.order.list2', ['data' => $data]);
    }

    /** 已完成订单列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrderlist3(Request $request)
    {

        $num = $request->input('num', 5);
        $shopname = session('shopname');
        if ($request->input('keyword')) {
            $data = DB::table('order')
                ->where('creat_time', 'like', '%' . $request->input('keyword') . '%')
                ->where('status', 'like', '%已完成%')
                ->paginate($num);
        } else {

            $data = DB::table('order')
                ->where('status', 'like', '%已完成%')
                ->paginate($num);

        }

        return view('admin.order.list3', ['data' => $data]);
    }

    /** 退单订单列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrderlist4(Request $request)
    {

        $num = $request->input('num', 5);
        $shopname = session('shopname');
        if ($request->input('keyword')) {
            $data = DB::table('order')
                ->where('creat_time', 'like', '%' . $request->input('keyword') . '%')
                ->where('status', 'like', '%退款中%')
                ->orwhere('status', 'like', '%已退款%')
                ->paginate($num);
        } else {

            $data = DB::table('order')
                ->where('status', 'like', '%退款中%')
                ->orwhere('status', 'like', '%已退款%')
                ->paginate($num);

        }

        return view('admin.order.list4', ['data' => $data]);
    }

    /** 订单评价查询
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEvaluate(Request $request)
    {
        $num = $request->input('num', 5);
        $shopname = session('shopname');

        if ($request->input('keyword')) {
            $data = DB::table('order')
                ->orwhere('phone', 'like', '%' . $request->input('keyword') . '%')
                ->orwhere('evaluate', 'like', '%' . $request->input('keyword') . '%')
                ->paginate($num);
        } else {

            $data = DB::table('order')
                ->where('evaluate','<>',' ')
                ->paginate($num);

        }

        // dd($data);
        return view('admin.evaluate.list', ['data' => $data]);
    }

    /** 删除订单评价
     * @param Request $request
     */
    public function postEvaluatedelete(Request $request)
    {
        $id = $request->input('id');

        $res = DB::table('order')
            ->where('id', $id)
            ->update(['evaluate' => " "]);

        echo $res;
    }

    /** 跳到友情链接添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLinkadd()
    {
        return view('admin.link.add');
    }

    /** 友情链接添加动作
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLinkinsert(Request $request)
    {

        $data = $request->except(['_token']);
        //dd($data);
        $res = DB::table('link')->insertGetId($data);
        if ($res) {
            return redirect('admin/linklist')->with('success', '链接添加成功');
        } else {
            return back()->withInput();
        }

    }

    /** 跳到友情链接列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLinklist(Request $request)
    {
        $num = $request->input('num', 5);


        if ($request->input('keyword')) {
            $data = DB::table('link')
                ->where('name', 'like', '%' . $request->input('keyword') . '%')
                ->orwhere('url', 'like', '%' . $request->input('keyword') . '%')
                ->paginate($num);
        } else {

            $data = DB::table('link')
                ->paginate($num);

        }

        // dd($data);

        return view('admin.link.list', ['data' => $data]);
    }

    /** 删除友情链接
     * @param Request $request
     */
    public function postLinkdelete(Request $request)
    {
        $id = $request->input('id');

        $res = DB::table('link')
            ->where('id', $id)
            ->delete();

        echo $res;
    }

    /** 跳转到友情链接修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLinkupdate(Request $request)
    {
        $id = $request->input('id');

        $data = DB::table('link')
            ->where('id', $id)
            ->get();

        return view('admin.link.edit', ['data' => $data]);
    }

    /**友情链接修改动作
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLinkedit(Request $request)
    {
        $id = $request->input('id');
        $data = $request->only('name', 'url');
        $res = DB::table('link')
            ->where('id', $id)
            ->update($data);


        if ($res) {
            return redirect('admin/linklist')->with('success', '友情链接修改成功');
        } else {
            return back()->withInput();
        }

    }

    /** 跳到广告列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdlist(Request $request)
    {
        $num = $request->input('num', 10);
        if ($request->input('keyword')) {
            $data = DB::table('food')
                ->where('name', 'like', '%' . $request->input('keyword') . '%')
                ->orwhere('shopname', 'like', '%' . $request->input('keyword') . '%')
                ->orwhere('ad', 'like', '%' . $request->input('keyword') . '%')
                ->paginate($num);
        } else {
            $data = DB::table('food')
                ->orderby('ad', 'desc')
                ->paginate($num);
        }
        return view('admin.ad.list', ['data' => $data]);
    }

    /**广告修改动作
     * @param Request $request
     */
    public function postAdedit(Request $request)
    {
        $id = $request->input('id');
        $data = $request->only('ad');
        $res = DB::table('food')
            ->where('id', $id)
            ->update($data);

        echo $res;


    }
}
