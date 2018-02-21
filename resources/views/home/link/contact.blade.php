@extends('home.layout.index')
@section('title','饿了么菜单')

@section('con')
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li onClick=history.go(-1) style="cursor: pointer;"><i class="fa fa-mail-reply"></i>&nbsp;后退</li>

        </ol>
    </div>

    <div class="contact cd-section" id="contact">
        <div class="container">
            <h3 class="w3ls-title">联系我们</h3>
            <p class="w3lsorder-text">


            </p>
            <div class="contact-row agileits-w3layouts">
                <div class="col-xs-6 col-sm-6 contact-w3lsleft">
                    <div class="contact-grid agileits">
                        <h4>DROP US A LINE </h4>
                        <form method="post" action="#">
                            <input type="text" required="" placeholder="姓名" name="Name">
                            <input type="email" required="" placeholder="邮箱" name="Email">
                            <input type="text" required="" placeholder="电话号码" name="Phone Number">
                            <textarea required="" placeholder="说点什么吧..." name="Message"></textarea>
                            <input type="submit" value="提交">
                        </form>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 contact-w3lsright">
                    <h6>
                        如发现任何问题，请联系至：
                        17603225692@163.com 。
                    </h6>
                    <div class="address-row">
                        <div class="col-xs-2 address-left">
                            <span aria-hidden="true" class="glyphicon glyphicon-home"></span>
                        </div>
                        <div class="col-xs-10 address-right">
                            <h5>Visit Us</h5>
                            <p>Broome St, Canada, NY 10002, New York </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="address-row w3-agileits">
                        <div class="col-xs-2 address-left">
                            <span aria-hidden="true" class="glyphicon glyphicon-envelope"></span>
                        </div>
                        <div class="col-xs-10 address-right">
                            <h5>Mail Us</h5>
                            <p><a href=""> mail@example.com</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="address-row">
                        <div class="col-xs-2 address-left">
                            <span aria-hidden="true" class="glyphicon glyphicon-phone"></span>
                        </div>
                        <div class="col-xs-10 address-right">
                            <h5>Call Us</h5>
                            <p>+01 222 333 4444</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- map -->
        <div class="map agileits">
            <iframe src="#"></iframe>
        </div>
        <!-- //map -->
    </div>
@stop