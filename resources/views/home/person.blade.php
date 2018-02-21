@extends('home.layout.index')
@section('title','饿了么个人中心')
@section('con')
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <h3 class="page-header page-header icon-subheading">
                    个人中心
                </h3>

                <div class="products-row">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <h3>客官 您回来啦</h3>
                                </div>
                                <div class="panel-body">
                                    <p>开心每一天，吃喝扫烦忧。一份快乐肉，美味去忧愁;一盘好运菜，逍遥更自在;一盆健康汤，保你心情畅。再添一碗平安饭，幸福长相伴。</p>
                                </div>
                                <!--  <div class="panel-footer">
                                     Panel Footer
                                 </div> -->
                            </div>
                            <!-- /.col-lg-4 -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 rsidebar">
                <div class="rsidebar-top">

                    <div class="sidebar-row">
                        <h4><a href="{{url('home/person')}}">个人中心</a></h4>
                        <ul class="faq">

                            <li class="item2"><a href="#">我的订单<span class="glyphicon glyphicon-menu-down"></span></a>
                                <ul>
                                    <li class="subitem1"><a href="{{url('home-person/order1')}}">未完成订单</a></li>
                                    <li class="subitem1"><a href="{{url('home-person/order2')}}">已完成订单</a></li>
                                    <li class="subitem1"><a href="{{url('home-person/order3')}}">待评价订单</a></li>
                                    <li class="subitem1"><a href="{{url('home-person/order4')}}">退单记录</a></li>

                                </ul>
                            </li>
                            <li class="item3"><a href="#">我的钱包<span class="glyphicon glyphicon-menu-down"></span></a>
                                <ul>
                                    <li class="subitem1"><a href="{{url('home-person/order5')}}">账户余额</a></li>

                                </ul>
                            </li>
                            <li class="item1"><a href="#">我的资料<span class="glyphicon glyphicon-menu-down"></span></a>
                                <ul>
                                    <li class="subitem1"><a href="{{url('home-person/order6')}}">个人资料</a></li>
                                    <li class="subitem1"><a href="{{url('home-person/order7')}}">地址管理</a></li>
                                    <li class="subitem1"><a href="{{url('home-person/order8')}}">安全中心</a></li>

                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <!-- script for tabs -->
                        <script type="text/javascript">
                            $(function () {

                                var menu_ul = $('.faq > li > ul'),
                                        menu_a = $('.faq > li > a');

                                menu_ul.hide();

                                menu_a.click(function (e) {
                                    e.preventDefault();
                                    if (!$(this).hasClass('active')) {
                                        menu_a.removeClass('active');
                                        menu_ul.filter(':visible').slideUp('normal');
                                        $(this).addClass('active').next().stop(true, true).slideDown('normal');
                                    } else {
                                        $(this).removeClass('active');
                                        $(this).next().stop(true, true).slideUp('normal');
                                    }
                                });

                            });
                        </script>
                        <!-- script for tabs -->
                    </div>

                    <div class="sidebar-row">

                    </div>
                </div>
                <div class="related-row">
                    <h4>个人标签</h4>
                    <ul>
                        <li><a href="#">时尚 </a></li>
                        <li><a href="#">萝莉</a></li>
                        <li><a href="#">清新</a></li>
                        <li><a href="#">二次元</a></li>

                    </ul>
                </div>
                <div class="related-row">
                    <h4>猜你喜欢的食物</h4>
                    <div class="galry-like">
                        <a href="#" data-toggle="modal" data-target="#myModal1"><img src="/images/s1.jpg"
                                                                                     class="img-responsive"
                                                                                     alt="img"></a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

@stop 

 
 
