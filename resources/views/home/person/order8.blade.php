@extends('home.person.layout.index')
@section('info','安全中心')
@section('order')

    <div id="card" class="col-lg-12">
        <div class="login-agileinfo">
            <form class="login-form" action="{{url('/reset')}}" method="post">
                <h3 class="font-green">修改密码</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! csrf_field() !!}

                <div class="form-group">
                    <label style="margin-top:15px" class="control-label visible-ie8 visible-ie9">原始密码</label>
                    <input style="height: 50px;" class="form-control placeholder-no-fix" type="password"
                           autocomplete="off" placeholder="8-20位数字或字母" name="oldpassword"></div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">新密码</label>
                    <input style="height: 50px;" class="form-control placeholder-no-fix" type="password"
                           autocomplete="off" id="register_password" placeholder="8-20位数字或字母" name="password"></div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">新密码确认</label>
                    <input style="height: 50px;" class="form-control placeholder-no-fix" type="password"
                           autocomplete="off" placeholder="8-20位数字或字母" name="password_confirmation"></div>
                <div class="form-actions">
                    <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">确定
                    </button>
                </div>
            </form>

        </div>
    </div>

@stop

