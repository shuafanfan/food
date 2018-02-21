<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class PageController extends Controller
{


    /**访问主页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {

        return view('home.index');
    }

    /**访问登录页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {

        return view('auth.Login');
    }

    /**访问注册页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegister()
    {
        return view('auth.Register');
    }

    /**访问个人中心
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPerson()
    {
        return view('home.person');
    }


    /**访问店铺列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMenu()
    {

        return view('home.menu');
    }

    /**访问菜品页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProducts()
    {
        return view('home.products');
    }

    /**访问帮助页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHelp()
    {
        return view('home.help');
    }

    /**访问本站大概页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout()
    {
        return view('home.link.about');
    }

    /**访问联系我们页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact()
    {
        return view('home.link.contact');
    }

    /**访问加入我们页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getJoinus()
    {
        return view('home.link.joinus');
    }
}
