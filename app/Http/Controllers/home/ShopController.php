<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class ShopController extends Controller
{

    /** 主页查询
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getSearch(Request $request)
    {

        $city = $request->input('city');
        $city = strstr($city, '-');
        $city = ltrim($city, '-');
        session(['city' => $city]);
        $search = $request->input('search');
        $type = $request->input('type');
        // dd($type);
        // 判断分类类型是否传过来,传过来走分类,没穿走主页分类搜索
        if ($type) {

            $data = DB::table('shop')
                ->where('pos', 'like', '%' . $city . $search . '%')
                ->where('type', $type)
                ->where('status', "上线")
                ->get();
        } else {
            if ($request->input('search')) {

                $data = DB::table('shop')
                    ->where('pos', 'like', '%' . $city . $search . '%')
                    ->where('status', "上线")
                    ->get();
                if (!$data) {
                    return back()->with('error', '未搜索到相关店家,请确认城市和区域');
                }

            } else {

                return back();


            }
        }

        // 轮播数据
        $ad = DB::table('food')
            ->where('ad', '已加入')
            ->get();
        return view('home.menu', ['data' => $data, 'city' => $city, 'search' => $search, 'ad' => $ad]);

    }

    /** 底部全部查询
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postCate(Request $request)
    {
        $search = $request->input('cate');
        $city = $request->input('city');

        $data = DB::table('shop')
            ->where('pos', 'like', '%' . $search . '%')
            ->orwhere('shopname', 'like', '%' . $search . '%')
            ->orwhere('type', 'like', '%' . $search . '%')
            ->get();

        // 轮播数据
        $ad = DB::table('food')
            ->where('ad', '已加入')
            ->get();
        return view('home.menu', ['data' => $data, 'city' => $city, 'search' => $search, 'ad' => $ad]);
    }


    /** 食物菜单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFoodmenu(Request $request)
    {
        $shopname = $request->input('shopname');

        $desc = $request->input('desc');

        $data = DB::table('food')
            ->orderby('price', $desc)
            ->where('shopname', $shopname)
            ->get();
        return view('home.products', ['data' => $data, 'shopname' => $shopname]);
    }

    /** 食物分类查询
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFoodcate(Request $request)
    {
        $type = $request->input('type');
        $shopname = $request->input('shopname');
        $data = DB::table('food')
            ->where('type', $type)
            ->get();

        return view('home.products', ['data' => $data, 'shopname' => $shopname]);
    }

    /** 该店铺评价查询
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEvaluate(Request $request)
    {

        $shopname = $request->input('shopname');
        $data = DB::table('order')
            ->where('shopname', 'like', '%' . $shopname . '%')
	    ->where('evaluate','<>',' ')
            ->get();
        // dd($data);
        return view('home.evaluate', ['data' => $data, 'shopname' => $shopname]);
    }


}
