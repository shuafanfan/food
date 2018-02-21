@extends('home.person.layout.index')
@section('info','个人资料')
@section('order')

    <div id="card" class="col-lg-6">
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {{session('success')}}
                </div>
            @endif

            <div class="table-responsive" style="width: 500px;">
                <form method="post" action="{{url('/persondo/update')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <table class="table table-hover">
                        <tbody>
                        <tr><img src="{{$users[0]->pic}}" alt="" style="width: 100px;"></tr>
                        <tr>
                            <td>头像</td>
                            <td><input type="file" name="pic"></td>

                        </tr>
                        <tr>
                            <td>昵称</td>
                            <td><input type="text" value="{{$users[0]->name}}" name="name"></td>

                        </tr>
                        <tr>
                            <td>电话</td>
                            <td><input type="text" value="{{$users[0]->phone}}" name="phone"></td>

                        </tr>
                        <tr>
                            <td>邮箱</td>
                            <td><input type="text" value="{{$users[0]->email}}" name="email"></td>

                        </tr>

                        </tbody>

                    </table>
                    <button class="btn btn-default" type="submit">修改</button>
                    <button class="btn btn-default" type="reset">重置</button>
                </form>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>

@stop