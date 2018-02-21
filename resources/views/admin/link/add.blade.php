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
                    <form role="form" method="post" action="{{url('admin/linkinsert')}}">
                        <div class="form-group">
                            <label>网站名称</label>
                            <input class="form-control" type="text" name="name" placeholder="网站名称" required="">
                        </div>
                        <div class="form-group">
                            <label>链接地址</label>
                            <input class="form-control" type="url" name="url" placeholder="链接地址" required="">
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