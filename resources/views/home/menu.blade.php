@extends('home.layout.index')
@section('title','饿了么店铺')
@section('con')
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }

        .content {

            margin: 0px 0px;
            float: left;
        }

        ul, li {

            list-style: none;

        }

        .main, .hmain {
            width: 284.5px;
            background: #222;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            line-height: 40px;
            color: white;
        }

        .main > a, .hmain > a {
            text-decoration: none;
            color: white;
            display: inline-block;
            width: 150px;
            min-height: 40px;
        }

        .main:hover, .hmain:hover {
            background: black;
        }

        .child {
            background: #444;
            display: none;
        }

        .child li:hover {
            background: #333333;
        }

        /*垂直导航栏左浮动*/
        .hmain {
            float: left;
        }
    </style>
    <script>
        $(function () {
            //垂直导航栏，点击下拉子菜单
            $(".main>a").click(function () {
                $(this).next().slideToggle(100)
                        .parent().siblings().find(".child").slideUp(100);
            })

            //水平导航栏，鼠标经过下拉导航栏
            $(".hmain").hover(function () {

                $(this).find(".child").stop(true, true).slideToggle(500)
                        .parent().siblings().find(".child").slideUp();
            })


        });


        //    // 显隐项目介绍详情
        $(function () {
            $(".thumbnail").mouseover(function () {
                $(this).find('.bbb').css({display: 'block'});
                $(this).find('.aaa').css({display: 'none'});
            });
            $(".thumbnail").mouseout(function () {
                $(this).find('.bbb').css({display: 'none'});
                $(this).find('.aaa').css({display: 'block'});
            });


        });
    </script>

    <!--水平导航栏-->
    <div style="width:1423px">
        <ul class="content">
            <li class="hmain"><a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}">全部店家</a>

            </li>
            <li class="hmain">快餐便当
                <ul class="child">
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=简餐">
                        <li>简餐</li>
                    </a>
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=香锅米线">
                        <li>香锅米线</li>
                    </a>
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=麻辣烫">
                        <li>麻辣烫</li>
                    </a>
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=汉堡速食">
                        <li>汉堡速食</li>
                    </a>
                </ul>
            </li>
            <li class="hmain">甜品饮品
                <ul class="child">
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=甜品">
                        <li>甜品</li>
                    </a>
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=奶茶果汁">
                        <li>奶茶果汁</li>
                    </a>
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=咖啡">
                        <li>咖啡</li>
                    </a>
                </ul>
            </li>
            <li class="hmain">果蔬生鲜
                <ul class="child">
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=水果">
                        <li>水果</li>
                    </a>
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=蔬菜">
                        <li>蔬菜</li>
                    </a>
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=海鲜">
                        <li>海鲜</li>
                    </a>
                </ul>
            </li>
            <li class="hmain">鲜花蛋糕
                <ul class="child">
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=鲜花">
                        <li>鲜花</li>
                    </a>
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=蛋糕">
                        <li>蛋糕</li>
                    </a>
                    <a href="{{url('/shopdo/search')}}?city={{$city}}&&search={{$search}}&&type=面包">面包</li></a>
                </ul>
            </li>
        </ul>
    </div>


    <div class="offers about ">

        <div class="offers-wthreerow2">
            <div class="add-products-row">
                @foreach($data as $k=>$v)

                    <lable><a href="{{url('/shopdo/foodmenu')}}?shopname={{$v->shopname}}">
                            <div class="col-sm-6 col-md-3 ">
                                <div class="thumbnail">
                                    <div class="caption" style="text-align:center">
                                        <img class="img-rounded" src="{{$v->pic}}" alt="..." style="width:200px;">
                                    </div>

                                    <div class="aaa">
                                        <div style="font-size:16px">{{$v->shopname}}</div>
                                        <span>★★★★☆&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;月售{{$v->count}}
                                            单</span>
                                    </div>

                                    <div class="bbb" style="display:none">
                                        <div style="font-size:16px">{{$v->info}}</div>
                                        <span class="label label-info" style="font-size:14px">30分钟可送达     配送费约￥5</span>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </lable>

                @endforeach


                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    </div>
    <!-- 轮播 -->
    <div class="w3agile-spldishes">
        <div class="container">
            <h3 class="w3ls-title">Best Food</h3>
            <div class="spldishes-agileinfo">

                <div class="col-md-12 spldishes-grids">
                    <!-- Owl-Carousel -->
                    <div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
                        @foreach($ad as $k=>$v)
                            <a href="{{url('/shopdo/foodmenu')}}?shopname={{$v->shopname}}" class="item g1">
                                <img class="lazyOwl" src="{{$v->pic}}" title="Our latest gallery" alt=""
                                     style="height: 250px;"/>
                                <div class="agile-dish-caption">
                                    <h4>{{$v->name}}</h4>
                                    <span>{{$v->info}} </span>
                                </div>
                            </a>
                            @endforeach


                                    <!--  <a href="products.html" class="item g1">
                            <img class="lazyOwl" src="/images/g1.jpg" title="Our latest gallery" alt=""/>
                            <div class="agile-dish-caption">
                                <h4>Duis congue</h4>
                                <span>Neque porro quisquam est qui dolorem </span>
                            </div>
                        </a> -->


                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- 轮播 -->
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
                    <input value="{{$city}}" type="hidden" name="city">

                    <input style="float:left" type="submit" value="搜索">
                </form>
                <img alt="" class="sub-w3lsimg" src="/images/i1.png">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

@stop