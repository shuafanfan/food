@extends('home.person.layout.index')
@section('info','地址管理')
@section('order')

    <div id="card" class="col-lg-6">
        <div class="panel-body" style="width: 800px;">
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
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <form method="post" action="{{url('/persondo/update2')}}">
                        {{ csrf_field() }}
                        <tr>
                            <td>姓名1</td>
                            <td><input type="text" name="nickname1" value="{{$users[0]->nickname1}}"></td>
                        </tr>
                        <tr>
                            <td>电话1</td>
                            <td><input type="text" name="nickphone1" value="{{$users[0]->nickphone1}}"></td>
                        </tr>
                        <tr>
                            <td>地址1</td>
                            <td><input type="text" name="pos1" value="{{$users[0]->pos1}}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-default" type="submit">修改</button>
                            </td>

                        </tr>
                    </form>
                    <form method="post" action="{{url('/persondo/update2')}}">
                        {{ csrf_field() }}
                        <tr>
                            <td>姓名2</td>
                            <td><input type="text" name="nickname2" value="{{$users[0]->nickname2}}"></td>
                        </tr>
                        <tr>
                            <td>电话2</td>
                            <td><input type="text" name="nickphone2" value="{{$users[0]->nickphone2}}"></td>
                        </tr>
                        <tr>
                            <td>地址2</td>
                            <td><input type="text" name="pos2" value="{{$users[0]->pos2}}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-default" type="submit">修改</button>
                            </td>
                        </tr>

                    </form>
                    <form method="post" action="{{url('/persondo/update2')}}">
                        {{ csrf_field() }}
                        <tr>
                            <td>姓名3</td>
                            <td><input type="text" name="nickname3" value="{{$users[0]->nickname3}}"></td>
                        </tr>
                        <tr>
                            <td>电话3</td>
                            <td><input type="text" name="nickphone3" value="{{$users[0]->nickphone3}}"></td>
                        </tr>
                        <tr>
                            <td>地址3</td>
                            <td><input type="text" name="pos3" value="{{$users[0]->pos3}}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-default" type="submit">修改</button>
                            </td>
                        </tr>
                    </form>


                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>

@stop