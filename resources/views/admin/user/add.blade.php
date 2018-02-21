@extends('admin.layout.index')
@section('con')

  <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                <div class="col-lg-6 col-lg-offset-3">
                    <form role="form" method="post" action="{{url('auth/register2')}}">
                        <div class="form-group">
                            <label>电话账号</label>
                            <input class="form-control" type="text" name="phone" placeholder="电话" required="">
                        </div>
                        <div class="form-group">
                            <label>密码</label>
                            <input class="form-control" type="password" name="password" placeholder="密码" required="">                           
                        </div>                      
                        <div class="form-group">
                            <label>确认密码</label>
                            <input class="form-control" type="password" name="password_confirmation" placeholder="确认密码" required="">
                        </div> <div class="form-group">
                            <label>同意条款</label>
                            <input type="checkbox" name="remember_token" checked="true">                           
                        </div> 
                        {{ csrf_field() }}
                       
                        <button class="btn btn-default" type="submit">添加</button>
                        <button class="btn btn-default" type="reset">重置</button>
                    </form>
                </div>
             
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
@stop