@extends('home.layout.index')
@section('title','饿了么结算')
@section('con')
        <!-- 商品详情 -->
<style>
    * {
        margin: 0;
        padding: 0
    }

    a {
        text-decoration: none;
    }

    #wrapper {
        max-width: 640px;
        min-width: 320px;
        font-size: 12px;
        font-family: "微软雅黑";
        height: 370px;
        margin: 50px auto;
    }

    #wrapper #content {
        width: 100%;
        float: left;
    }

    #wrapper #content .goods_lists {
        width: 100%;
        float: left;
    }

    #wrapper #content .goods_lists .list {
        width: 96%;
        padding: 0 2%;
    }

    #wrapper #content .goods_lists .list li {
        width: 100%;
        height: 100px;
        border: 1px solid #c7000a;
        margin-top: 15px;
        float: left;
        background: #fffefe;
    }

    .goods_lists .list li .checkbox {
        width: 20px;
        height: 20px;
        position: relative;
        border: 0px solid #999;
        float: left;
        margin-top: 45px;
        margin-left: 2%;
        z-index: 1
    }

    .goods_lists .list li .checkbox .c_xz {
        position: absolute;
        top: -1px;
        left: 0px;
        width: 22px;
        height: 22px;
        display: none;
    }

    .goods_lists .list li .door {
        float: left;
        width: 74px;
        height: 50px;
        margin: 22px 0 0 3%;
        border: 1px solid #999;
    }

    .goods_lists .list li .l_right {
        width: 62%;
        height: 74px;
        float: left;
        margin-top: 22px;
        padding-left: 2%
    }

    .goods_lists .list li .l_right .l_r_desc {
        max-width: 100%;
        overflow: hidden;
        color: #555;
        line-height: 22px;
        height: 22px;
    }

    .goods_lists .list li .l_right .price {
        color: #555;
    }

    .goods_lists .list li .l_right .price span {
        color: #c7000a;
    }

    .goods_lists .list li .l_right .old_price {
        text-decoration: line-through;
        float: left;
        width: 100%;
        color: #555
    }

    .goods_lists .list li .l_right .l_bot {
        width: 66%;
        height: 20px;
        float: right;
        color: #555;
    }

    .goods_lists .list li .l_right .l_bot p {
        float: left;
        padding-top: 2px;
    }

    .goods_lists .list li .l_right .l_bot input {
        float: left;
        width: 17%;
        height: 14px;
        text-align: center;
        border: 1px solid #999;
        margin-top: 6px;
    }

    .goods_lists .list li .l_right .l_bot a {
        float: left;
        margin: 3px 3%;
    }

    .goods_lists .list li .l_right .l_bot .rubbish {
        margin-left: 5%;
    }

    #wrapper #content .checkout {
        float: left;
        width: 100%;
        height: 50px;
        background: #fffefe;
        border-top: 1px solid #999;
        border-bottom: 1px solid #999;
        margin-top: 20px;
    }

    #wrapper #content .checkout .c_left {
        float: left;
        width: 47%;
        height: 35px;
        font-size: 12px;
        color: #555;
        padding-left: 3%;
        line-height: 50px;
    }

    #wrapper #content .checkout .c_left span {
        color: #c7000a;
    }

    #wrapper #content .checkout .c_right {
        float: left;
        width: 50%;
        height: 50px;
        background: #c7000a;
        color: #fefdfd;
        text-align: center;
        font-size: 14px;
        line-height: 50px;
    }

</style>
<!-- 商品详情 -->

<!-- 收货地址清单 -->
<link href="/css/public.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="/css/base.css"/>

<link rel="stylesheet" type="text/css" href="/css/checkOut.css"/>
<div class="border_top_cart">
    <script type="text/javascript">
        var checkoutConfig = {
            addressMatch: 'common',
            addressMatchVarName: 'data',
            hasPresales: false,
            hasBigTv: false,
            hasAir: false,
            hasScales: false,
            hasGiftcard: false,
            totalPrice: 244.00,
            postage: 10,//运费
            postFree: true,//活动是否免邮了
            bcPrice: 150,//计算界值
            activityDiscountMoney: 0.00,//活动优惠
            showCouponBox: 0,
            invoice: {
                NA: "0",
                personal: "1",
                company: "2",
                electronic: "4"
            }
        };
        var miniCartDisable = true;
    </script>

    <div class="container">
        <div class="checkout-box">


            <div class="checkout-box-bd">
                <!-- 地址状态 0：默认选择；1：新增地址；2：修改地址 -->
                <input type="hidden" name="Checkout[addressState]" id="addrState" value="0"/>
                <!-- 收货地址 -->
                <div class="xm-box">
                    <div class="box-hd ">
                        <h2 class="title">收货地址</h2>
                        <!---->
                    </div>
                    <div class="box-bd">
                        <div class="clearfix xm-address-list" id="checkoutAddrList">
                            <dl class="item selected">
                                <form action="{{url('/persondo/update3')}}" method="post">
                                    {{ csrf_field() }}

                                    <dt>
                                        <input class="form-control" placeholder="姓名" style="border:0px" type="text"
                                               value="{{$data2[0]->nickname1}}" name="nickname1">
                                    </dt>
                                    <dd>
                                        <input class="form-control" placeholder="电话" style="border:0px" type="text"
                                               value="{{$data2[0]->nickphone1}}" name="nickphone1">
                                        <input class="form-control" placeholder="地址" style="border:0px" type="text"
                                               value="{{$data2[0]->pos1}}" name="pos1">
                                        <input type="submit" value="修改">
                                    </dd>

                                </form>
                            </dl>
                            <dl class="item">
                                <form action="{{url('/persondo/update3')}}" method="post">
                                    {{ csrf_field() }}

                                    <dt>
                                        <input class="form-control" placeholder="姓名" style="border:0px" type="text"
                                               value="{{$data2[0]->nickname2}}" name="nickname2">
                                    </dt>
                                    <dd>
                                        <input class="form-control" placeholder="电话" style="border:0px" type="text"
                                               value="{{$data2[0]->nickphone2}}" name="nickphone2">
                                        <input class="form-control" placeholder="地址" style="border:0px" type="text"
                                               value="{{$data2[0]->pos2}}" name="pos2">
                                        <input type="submit" value="修改">
                                    </dd>
                                </form>
                            </dl>

                            <dl class="item">
                                <form action="{{url('/persondo/update3')}}" method="post">
                                    {{ csrf_field() }}

                                    <dt>
                                        <input class="form-control" placeholder="姓名" style="border:0px" type="text"
                                               value="{{$data2[0]->nickname3}}" name="nickname3">
                                    </dt>
                                    <dd>
                                        <input class="form-control" placeholder="电话" style="border:0px" type="text"
                                               value="{{$data2[0]->nickphone3}}" name="nickphone3">
                                        <input class="form-control" placeholder="地址" style="border:0px" type="text"
                                               value="{{$data2[0]->pos3}}" name="pos3">
                                        <input type="submit" value="修改">
                                    </dd>
                                </form>
                            </dl>


                            <div class="xm-edit-addr-backdrop" id="J_editAddrBackdrop"></div>
                        </div>
                    </div>
                    <!-- 收货地址清单 -->

                    <form action="{{url('/persondo/pay')}}" method="post">
                        {{ csrf_field() }}
                                <!-- 支付方式 -->
                        <div id="checkoutPayment">
                            <!-- 支付方式 -->
                            <div class="xm-box">
                                <div class="box-hd ">
                                    <h2 class="title">支付方式</h2>
                                </div>
                                <div class="box-bd">
                                    <ul id="checkoutPaymentList" class="checkout-option-list clearfix J_optionList">
                                        <li class="item selected"><input type="radio" name="Checkout[pay_id]"
                                                                         checked="checked" value="支付宝"/>
                                            <p> 支付宝 <span></span></p></li>
                                        <li class="item "><input type="radio" name="Checkout[pay_id]" checked="checked"
                                                                 value="微信"/>
                                            <p> 微信 <span></span></p></li>
                                        <li class="item "><input type="radio" name="Checkout[pay_id]" checked="checked"
                                                                 value="银联支付"/>
                                            <p> 银联支付 <span></span></p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- 支付方式 END-->
                <!-- 送货时间 -->
                <div class="xm-box">
                    <div class="box-hd">
                        <h2 class="title">送餐时间</h2>
                    </div>
                    <div class="box-bd">
                        <ul class="checkout-option-list clearfix J_optionList">
                            <li class="item selected"><input type="radio" checked="checked" name="Checkout[best_time]"
                                                             value="早晨 7:00~9:00"/>
                                <p>早晨<span>7:00~9:00</span></p></li>
                            <li class="item "><input type="radio" name="Checkout[best_time]" value="中午 11:00~14:00"/>
                                <p>中午<span>11:00~14:00</span></p></li>
                            <li class="item "><input type="radio" name="Checkout[best_time]" value="晚上17:00~20:00"/>
                                <p>晚上<span>17:00~20:00</span></p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="xm-box">
                <div class="box-hd">
                    <h2 class="title">留言备注</h2>
                </div>
                <div class="box-bd">
                    <textarea name="remark" cols="50" rows="8" value=""></textarea>
                </div>
            </div>
        </div>


        <!-- 送货时间 END-->

        <!-- 订单详情  -->
        <div class="xm-box" style="border:none">
            <div class="box-hd">
                <h2 class="title">确认订单信息</h2>
            </div>


        </div>


    </div>
    <!-- 订单详情 END  -->


    <!-- 商品详情 -->
    <div id="wrapper">

        <div id="content">
            <div class="goods_lists">
                <ul id="listbox" class="list">

                    @foreach($data as $k=>$v)

                        <li style="height: 120px;">
                            <span class="label label-info"
                                  style="width: 100px;margin-right:1500px;">{{$v[0]->shopname}}</span>
                            <div class='checkbox'>
                                <div class='c_xz'><img src='/images/checkbox.png' width='27' height='20'></div>
                            </div>
                            <a class='door' href='javascript:void(0);'><img src='{{$v[0]->pic}}' width='74' height='74'
                                                                            alt='美食'/></a>
                            <div class='l_right'>
                                <p class='l_r_desc'>{{$v[0]->name}}</p>
                                <p class='price'>价格：<span>￥<span class='money'
                                                                 data-money='{{$v[0]->price}}'></span>{{$v[0]->price}}</span>
                                </p>
                                <!-- <p class='old_price'>885.00</p> -->
                                <div class='l_bot'>
                                    <p>数量 :</p>
                                    <a class='remove' href='javascript:void(0);'><img src='/images/remove.png'
                                                                                      width='15' height='15'></a>
                                    <input style="margin-bottom:110px" type='text' data-max='10' name="num[]"
                                           class='num' value='{{$v[0]->num}}'/>
                                    <a class='add' href='javascript:void(0);'><img src='/images/add.png' width='15'
                                                                                   height='15'></a>
                                    <a class='rubbish' href='javascript:void(0);'><img src='/images/rubbish.png'
                                                                                       width='14' height='16'></a>
                                    <input type="hidden" value="{{$v[0]->shopname}}" name="shopname[]">
                                    <input type="hidden" value="{{$v[0]->name}}" name="name[]">
                                    <input type="hidden" value="{{$v[0]->price}}" name="price[]">

                                    <input type="hidden" value="" name="nickname">
                                    <input type="hidden" value="" name="nickphone">
                                    <input type="hidden" value="" name="pos">
                                    <input type="hidden" value="" name="sum">
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="checkout">
                <div></div>
                <div class="c_left">
                    合计(不含运费): <span>￥<span id="sum">0.00</span></span>
                    <input type="hidden" value="<?php  echo date("Y-m-d h:i:s");  ?>" name="creat_time">
                </div>

                <div cl ass="c_right">
                    <input style="margin:5px;" id="count" class="btn btn-danger disabled" type="submit" value="确认支付">

                </div>

            </div>
        </div>
    </div>
    </form>
    <!-- 商品详情 -->
    <!-- 验证支付是否成功 -->
    <div id="wrapper">
        <input id="phone" type="hidden" value="{{Auth::user()['phone']}}">
        <input style="height:50px;width:140px;float:left;margin:20px 0px; " class="form-control" type="text" name="code"
               placeholder="验证码" required="">
        <i id="yes" style="float:left;margin:40px 15px;display:none" class="fa fa-check"></i>
        <i id="no" style="float:left;margin:40px 15px;display:none" class="fa fa-times"></i>
        <button style="float:left;margin: 25px 55px" class="btn">点击获取验证码</button>
    </div>


    <!-- 商品详情 -->
    <script type="text/javascript">
        $(function () {
            //删除商品
            $("#listbox").on("click", ".rubbish", function () {
                $(this).parents("li").remove();
                tm_total();
            });


            //商品复选框的选中和不选中
            $(this).find(".c_xz").show();
            tm_total();
            // $("#listbox").on("click",".checkbox",function(){
            //   $(this).find(".c_xz").toggle();
            //   tm_total();
            // });

            //商品数量的添加和减少
            $("#listbox").on("click", ".add", function () {
                var $input = $(this).prev();
                var value = $input.val();
                var max = $input.data("max");
                value++;
                if (value > max)value = max;
                $input.val(value);
                tm_total();
            }).on("click", ".remove", function () {
                var $input = $(this).next();
                var value = $input.val();
                value--;
                if (value <= 0)value = 1;
                $input.val(value);
                tm_total();
            });
        });

        //求总和
        function tm_total() {
            var total = 0;
            $("#listbox").find("li").each(function () {
                var flag = $(this).find(".c_xz").is(":visible");
                if (flag) {
                    var money = $(this).find(".money").data("money");
                    var number = $(this).find(".num").val();
                    total += money * number;
                }
            });
            //求用户购买了多少个商品
            var length = $("#listbox").find(".c_xz:visible").length;
            $("#count").text(length);
            $("#sum").text(total);
        }
        ;
    </script>
    <!-- 商品详情 -->

    <!-- 发送短信 -->
    <script type="text/javascript">

        $(function () {


            $(".btn").click(function () {
                var phone = $("#phone").val();
                console.log(phone);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post("/persondo/message",
                        {phone: phone},
                        function (data) {
                            console.log(data);
                        });
                settime(this);
            });

            var countdown = 60;

            function settime(obj) {
                if (countdown == 0) {
                    obj.removeAttribute("disabled");
                    obj.innerHTML = "获取验证码";
                    countdown = 60;
                    return;
                } else {
                    obj.setAttribute("disabled", true);
                    obj.innerHTML = "" + countdown + "秒后再获取";
                    countdown--;
                }
                setTimeout(function () {
                    settime(obj)
                }, 1000)
            }

            $("input[name=code]").focus(function () {
                $("#yes").hide();
                $("#no").hide();
            });

            $('input[name=code]').blur(function () {
                var code = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.post("/persondo/code",
                        {code: code},
                        function (data) {
                            console.log(data);
                            if (data == 2) {
                                $("#yes").show();
                                $("#count").removeClass("disabled");
                                $("#count").addClass("active");

                            } else {
                                $("#no").show();
                                $("#count").addClass("disabled");
                            }
                        });

                var sum = $('#sum').text();
                $('input[name="sum"]').val(sum);
                //修改被选中的地址属性
                var selectpos = $('dl[class="item selected"]');

                var nickname = selectpos.find("input:eq(1)").val();
                var nickphone = selectpos.find("input:eq(2)").val();
                var pos = selectpos.find("input:eq(3)").val();


                $('input[name="nickname"]').val(nickname);
                $('input[name="nickphone"]').val(nickphone);
                $('input[name="pos"]').val(pos);

            });
        });

    </script>
    <!-- 发送短信 -->
    <!-- 修改被选中的地址属性 -->

    <!-- 修改被选中的地址属性 -->
    <script src="/js/base.min.js"></script>
    <script type="text/javascript" src="/js/address_all.js"></script>
    <script type="text/javascript" src="/js/checkout.min.js"></script>

@stop
