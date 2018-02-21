<?php

namespace App\Http\Controllers\admin2;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FoodPostRequest;
use DB;
use Hash;

class ShopController extends Controller
{

    public function getIndex(Request $request)
    {

        return view('admin2.index');
    }


    /** 财务管理页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMoney()
    {
        $shopname = session('shopname');
        $data = DB::table('shop')
            ->where('shopname', $shopname)
            ->get();
        return view('admin2.money.money', ['data' => $data]);
    }

    /** 食物添加页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFoodadd()
    {

        return view('admin2.food.add');
    }

    /** 菜品添加
     * @param FoodPostRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postFoodinsert(FoodPostRequest $request)
    {
        $data = $request->except(['_token']);
        $data['pic'] = self::upload($request);
        $shopname = session('shopname');
        //dd($shopname);
        $data['shopname'] = $shopname;
        $res = DB::table('food')->insertGetId($data);
        if ($res) {
            return redirect('admin2/foodadd')->with('success', '菜品添加成功');
        } else {
            return back()->withInput();
        }
    }

    /**头像上次
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
            $request->file('pic')->move('./fooduploads/', $name . '.' . $suffix);
            //返回路径
            return '/fooduploads/' . $name . '.' . $suffix;
        }
    }

    /**本店菜品列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFoodlist(Request $request)
    {
        $num = $request->input('num', 5);
        $shopname = session('shopname');

        if ($request->input('keyword')) {
            $data = DB::table('food')
                ->where('name', 'like', '%' . $request->input('keyword') . '%')
                ->paginate($num);
        } else {
            $data = DB::table('food')
                ->where('shopname', $shopname)
                ->paginate($num);

        }
        return view('admin2.food.list', ['data' => $data]);
    }

    /**菜品删除
     * @param Request $request
     */
    public function postFooddelete(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('food')->where('id', $id)->delete();

        echo $res;

    }

    // 跳转菜品修改
    public function getFoodupdate(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('food')->where('id', $id)->get();

        return view('admin2.food.update', ['data' => $data]);

    }

    /** 菜品修改动作
     * @param FoodPostRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postFoodedit(FoodPostRequest $request)
    {
        $id = $request->input('id');
        $data = $request->except(['_token']);
        $data['pic'] = self::upload($request);
        $shopname = session('shopname');
        //dd($shopname);
        $data['shopname'] = $shopname;
        //dd($data);
        $res = DB::table('food')->where('id', $id)->update($data);
        if ($res) {
            return redirect('admin2/foodlist')->with('success', '菜品修改成功');
        } else {
            return back()->withInput();
        }
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
                ->where('shopname', 'like', '%' . $shopname . '%')
                ->where('status', 'like', '%等待商家接单%')
                ->paginate($num);
        } else {

            $data = DB::table('order')
                ->where('shopname', 'like', '%' . $shopname . '%')
                ->where('status', 'like', '%等待商家接单%')
                ->paginate($num);

        }

        return view('admin2.order.list', ['data' => $data]);
    }

    /** 店家接单操作
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getOrderaccept(Request $request)
    {
        $ordernum = $request->all();
        $data = DB::table('order')
            ->where('ordernum', $ordernum)
            ->update(['status' => '派送中']);
        return back();

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
                ->where('shopname', 'like', '%' . $shopname . '%')
                ->where('status', 'like', '%派送中%')
                ->paginate($num);
        } else {

            $data = DB::table('order')
                ->where('shopname', 'like', '%' . $shopname . '%')
                ->where('status', 'like', '%派送中%')
                ->paginate($num);

        }

        return view('admin2.order.list2', ['data' => $data]);
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
                ->where('shopname', 'like', '%' . $shopname . '%')
                ->where('status', 'like', '%已完成%')
                ->paginate($num);
        } else {

            $data = DB::table('order')
                ->where('shopname', 'like', '%' . $shopname . '%')
                ->where('status', 'like', '%已完成%')
                ->paginate($num);

        }

        return view('admin2.order.list3', ['data' => $data]);
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

    /** 店主退款操作
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getOrderrefund(Request $request)
    {
        $ordernum = $request->all();
        $data = DB::table('order')
            ->where('ordernum', $ordernum)
            ->update(['status' => '已退款']);
        return back();
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
                ->where('shopname', 'like', '%' . $shopname . '%')
                ->where('status', 'like', '%退单中%')
                ->orwhere('status', 'like', '%已退款%')
                ->paginate($num);
        } else {

            $data = DB::table('order')
                ->where('shopname', 'like', '%' . $shopname . '%')
                ->where('status', 'like', '%退单中%')
                ->orwhere('status', 'like', '%已退款%')
                ->paginate($num);

        }

        return view('admin2.order.list4', ['data' => $data]);
    }

    /** 订单详情页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrderinfo(Request $request)
    {
        $ordernum = $request->all();
        $shopname = session('shopname');
        $data = DB::table('ordergoods')
            ->where('ordernum', $ordernum)
            ->where('shopname', $shopname)
            ->get();

        return view('admin2.order.orderinfo', ['data' => $data]);
    }

    /** 本店铺评价查询
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEvaluate(Request $request)
    {

        $shopname = session('shopname');
        $data = DB::table('order')
            ->where('shopname', 'like', '%' . $shopname . '%')
            ->where('evaluate','<>',' ')
            ->get();
        // dd($data);
        return view('admin2.evaluate.list', ['data' => $data]);
    }
}
