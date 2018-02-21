@extends('home.layout.index')
@section('title','饿了么菜单')

@section('con')
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li onClick=history.go(-1) style="cursor: pointer;"><i class="fa fa-mail-reply"></i>&nbsp;后退</li>
            <li class="active"><a href="{{url('/shopdo/evaluate')}}?shopname={{$shopname}}">店铺评价</a></li>
        </ol>
    </div>
    <div class="products">

        <div class="container">

            <div class="col-md-9 product-w3ls-right">
                <div class="product-top">
                    <h4>美味菜单</h4>
                    <ul>
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">排序<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/shopdo/foodmenu')}}?shopname={{$shopname}}&&desc=desc">价格从高到低</a>
                                </li>
                                <li><a href="{{url('/shopdo/foodmenu')}}?shopname={{$shopname}}&&desc=asc">价格从低到高</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="products-row">

                    @foreach($data as $k=>$v)
                        <div class="col-xs-6 col-sm-4 product-grids">
                            <div class="flip-container">
                                <div class="flipper agile-products">
                                    <div class="front">
                                        <img src="{{$v->pic}}" class="img-responsive" alt="img"
                                             style="width: 255px;height: 169px;">
                                        <div class="agile-product-text">
                                            <h5>{{$v->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <h4>{{$v->name}}</h4>
                                        <p>{{$v->info}}</p>
                                        <h6>{{$v->price}}<sup>￥</sup></h6>
                                        <form action="{{url('/shopdo/aaa')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="add" value="1">


                                            <input type="hidden" name="w3ls_item"
                                                   value="{{$v->shopname}}->{{$v->name}}">
                                            <input type="hidden" name="amount" value="{{$v->price}}">
                                            <button type="submit" class="w3ls-cart pw3ls-cart test"><i
                                                        class="fa fa-cart-plus" aria-hidden="true"></i>加入购物车
                                            </button>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-3 rsidebar">
                <div class="rsidebar-top">

                    <div class="sidebar-row" style='margin-top:5px'>
                        <a href="{{url('/shopdo/foodmenu')}}?shopname={{$shopname}}"><h4>所有食物</h4></a>
                        <ul class="faq">
                            <li><a href="{{url('/shopdo/foodcate')}}?shopname={{$shopname}}&&type=主打菜">主打菜</a>

                            </li>
                            <li><a href="{{url('/shopdo/foodcate')}}?shopname={{$shopname}}&&type=主食">主食</a>

                            </li>
                            <li><a href="{{url('/shopdo/foodcate')}}?shopname={{$shopname}}&&type=甜品">甜品</a>

                            </li>
                            <li><a href="{{url('/shopdo/foodcate')}}?shopname={{$shopname}}&&type=汤饮">汤饮</a>

                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <!-- script for tabs -->

                        <!-- script for tabs -->
                    </div>


                </div>
                <!-- <div class="related-row">
                    <h4>Related Searches</h4>
                    <ul>
                        <li><a href="products.html">Salads </a></li>
                        <li><a href="products.html">Vegetarian</a></li>
                        <li><a href="products.html">Dinner</a></li>
                        <li><a href="products.html">Diet Soup</a></li>
                        <li><a href="products.html">Sweets</a></li>
                        <li><a href="products.html">Seasonal</a></li>
                        <li><a href="products.html">Breakfast</a></li>
                        <li><a href="products.html">Italian Food</a></li>
                        <li><a href="products.html">Meals</a></li>
                    </ul>
                </div>
                <div class="related-row">
                    <h4>YOU MAY ALSO LIKE</h4>
                    <div class="galry-like">
                        <a href="#" data-toggle="modal" data-target="#myModal1"><img src="../images/s1.jpg" class="img-responsive" alt="img"></a>
                    </div>
                </div> -->
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
    <div class="subscribe agileits-w3layouts">
        <div class="container">
            <div class="col-md-6 social-icons w3-agile-icons">
                <h4>请多多沟通</h4>
                <ul>
                    <li><a class="fa fa-facebook icon facebook" href="#"> </a></li>
                    <li><a class="fa fa-twitter icon twitter" href="#"> </a></li>
                    <li><a class="fa fa-google-plus icon googleplus" href="#"> </a></li>
                    <li><a class="fa fa-dribbble icon dribbble" href="#"> </a></li>
                    <li><a class="fa fa-rss icon rss" href="#"> </a></li>
                </ul>
                <ul class="apps">
                    <li><h4>下载我们的app : </h4></li>
                    <li><a class="fa fa-apple" href="#"></a></li>
                    <li><a class="fa fa-windows" href="#"></a></li>
                    <li><a class="fa fa-android" href="#"></a></li>
                </ul>
            </div>
            <div class="col-md-6 subscribe-right">
                <h3 class="w3ls-title">Subscribe to Our <br><span>Newsletter</span></h3>
                <form method="post" action="{{url('/shopdo/cate')}}">
                    {{ csrf_field() }}
                    <input style="float:left;width:400px;height:54px;margin-left:55px" type="text"
                           placeholder="查询其他地区.店名.美食类型..." name="cate" class="form-control">
                    <input value="session['city']" type="hidden" name="city">

                    <input style="float:left" type="submit" value="搜索">
                </form>
                <img alt="" class="sub-w3lsimg" src="/images/i1.png">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

@stop