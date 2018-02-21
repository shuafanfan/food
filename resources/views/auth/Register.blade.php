@extends('home.layout.index')
@section('title','饿了么注册')
@section('con')
    <div class="login-page about">
        <img class="login-w3img" src="/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">请注册您的账号</h3>
            <div class="login-agileinfo">
                <form action="{{url('auth/register')}}" method="post">
                    {!! csrf_field() !!}
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <input id="phone" style="height:50px" class="form-control" type="text" name="phone" placeholder="电话"
                           value="">
                    <input style="height:50px;width:140px;float:left;margin:20px 0px; " class="form-control" type="text"
                           name="code" placeholder="验证码" required="">
                    <i id="yes" style="float:left;margin:40px 15px;display:none" class="fa fa-check"></i>
                    <i id="no" style="float:left;margin:40px 15px;display:none" class="fa fa-times"></i>
                    <button style="float:left;margin: 25px 55px" class="btn">点击获取验证码</button>
                    <input style="height:50px" class="form-control" type="password" name="password" placeholder="密码"
                           required="">
                    <input style="height:50px" class="form-control" type="password" name="password_confirmation"
                           placeholder="确认密码" required="">

                    <div class="wthreelogin-text">
                        <ul>
                            <li>
                                <label class="checkbox"><input type="checkbox" name="remember_token"><i></i>
                                    <span> 我同意服务条款</span>
                                </label>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <input type="submit" value="注 册">
                </form>
                <p>已经有账号了? <a href="login"> 赶快登录吧!</a></p>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        $(function () {
            $(".btn").click(function () {
                var phone = $("#phone").val();
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
                            if (data == 1) {
                                $("#yes").show();
                            } else {
                                $("#no").show();
                            }
                        });


            });
        });

    </script>
@stop