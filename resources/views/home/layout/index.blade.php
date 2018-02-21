<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Staple Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Custom Theme files -->
    <link href="/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
    <link rel="stylesheet" href="/css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
    <link rel="stylesheet" type="text/css" href="/css/hzw-city-picker.css">

    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/js/city-data.js"></script>
    <script type="text/javascript" src="/js/hzw-city-picker.min.js"></script>

    <!-- //js -->
    <!-- web-fonts -->
    <!-- <link href="///fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet"> -->
    <!-- //web-fonts -->
</head>
<body>
<!-- banner -->
<div class="banner">
    <!-- header -->
    <div class="header">

        <!-- //header-one -->
        <!-- navigation -->
        <div class="navigation agiletop-nav">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header w3l_logo">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                                data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a href="/home/index">饿了么~
                                <span>Best Food Collection</span>
                            </a></h1>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        @if (Auth::check()== true)
                            <ul class="nav navbar-nav navbar-right">

                                <li class="head-dpdn">
                                    <a href="{{url('/home-person/order1')}}"><i class="fa fa-sign-in"
                                                                                aria-hidden="true"></i> 我的订单</a>
                                </li>
                                <li class="head-dpdn">
                                    <a href="{{url('/home/person')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                        个人中心</a>
                                </li>
                                <li class="head-dpdn">
                                    <a href="{{url('auth/logout')}}"><i class="fa fa-question-circle"
                                                                        aria-hidden="true"></i> 退出</a>
                                </li>
                            </ul>
                            <div class="cart cart box_1" s tyle="display:none">
                                <form action="{{url('/shopdo/aaa')}}" method="post" class="last">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="cmd" value="_cart"/>
                                    <input type="hidden" name="display" value="1"/>
                                    <button class="w3view-cart" type="submit" name="submit" value=""><i
                                                class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        @else
                            <ul class="nav navbar-nav navbar-right">

                                <li class="head-dpdn">
                                    <a href="/home/login"><i class="fa fa-sign-in" aria-hidden="true"></i> 登录</a>
                                </li>
                                <li class="head-dpdn">
                                    <a href="/home/register"><i class="fa fa-user-plus" aria-hidden="true"></i> 注册</a>
                                </li>
                                <li class="head-dpdn">
                                    <a href="/home/help"><i class="fa fa-question-circle" aria-hidden="true"></i> 帮助</a>
                                </li>
                            </ul>
                        @endif


                    </div>

                </nav>
            </div>
        </div>
        <!-- //navigation -->
    </div>
    <!-- //header-end -->
    <!-- banner-text -->

    <div class="banner-text">
        @section('search')

        @show
    </div>

</div>
<!-- //banner -->
<!-- add-products -->
@section('con')
    <div class="">

    </div>
@show

<div class="footer agileits-w3layouts">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
                <h3>友情链接</h3>
                <ul>
                    @foreach($link as $k=>$v)
                        <li><a href="{{$v->url}}">{{$v->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
                <h3>合作</h3>
                <ul>
                    <li><a href="{{url('/home/about')}}">关于我们</a></li>
                    <li><a href="{{url('/home/contact')}}">联系我们</a></li>
                    <li><a href="{{url('/home/joinus')}}">加入我们</a></li>

                </ul>
            </div>
            <div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
                <h3>合作</h3>
                <ul>
                    <li><a href="#">24小时客服热线 : 17603225692</a></li>
                    <li><a href="#">意见反馈 : 17603225692@163.com</a></li>
                </ul>
            </div>
            <div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
                <img alt="微信号: elemeorder" src="//faas.elemecdn.com/desktop/media/img/wexinqc100@2x.393ade.png">
                <p>微信号: elemeorder</p>
                <p>饿了么网上订餐</p></div>
        </div>
        <a target="_blank" class="icon-weibo" href="http://e.weibo.com/elemeorder"></a></div>
</div>
</div>


<div class="clearfix"></div>
</div>
</div>
</div>
<div class="copyw3-agile">
    <div class="container">
        <p>&copy; 2017 Staple Food. All rights reserved | Design by Xiaobo Chen</p>
    </div>
</div>
<!-- //footer -->
<!-- cart-js -->
<script src="/js/minicart.js"></script>
<script>
    w3ls.render();

    w3ls.cart.on('w3sb_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {
            }
        }
    });
</script>
<!-- //cart-js -->
<!-- Owl-Carousel-JavaScript -->
<script src="/js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            items: 3,
            lazyLoad: true,
            autoPlay: true,
            pagination: true,
        });
    });
</script>
<!-- //Owl-Carousel-JavaScript -->
<!-- start-smooth-scrolling -->
<script src="/js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="/js/move-top.js"></script>
<script type="text/javascript" src="/js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/bootstrap.js">
</script>
<script type="text/javascript">
    $('.search').click(function () {
        location.href = "./menu";
    });

</script>
</body>
</html>