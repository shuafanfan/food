@extends('home.layout.index')
@section('title','饿了么个人中心')
@section('con')
    <link rel="stylesheet" type="text/css" href="/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/css/buyConfirm.css"/>
    <link rel="stylesheet" type="text/css" href="/css/checkOut.css"/>
    <div class="border_top_cart">
        <div class="container payment-con">
            <form method="post" id="pay-form" action="#" target="_blank">
                <div class="order-info">
                    <div class="msg">
                        <h3>您的订单已交易成功!</h3>
                        <p></p>
                        <p class="post-date">请耐心等待哦</p>
                    </div>
                    <div class="info">
                        <p> 金额：<span class="pay-total">{{$data1['sum']}} 元</span></p>
                        <p> 订单：{{$ordernum}} </p>
                        <p> 配送：{{$data1['nickname']}} <span class="line">/{{$data1['nickphone']}} </span> <span
                                    class="line">/</span> {{$data1['pos']}} <span
                                    class="line">/</span> {{$data1['best_time']}} <span class="line">/</span></p>
                    </div>
                    <div class="icon-box" style="margin-top:0px">
                        <i class="iconfont"><img src="/images/yes_ok.png"/></i>
                    </div>
                </div>


        </div>
@stop