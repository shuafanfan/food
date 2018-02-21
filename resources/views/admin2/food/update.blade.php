@extends('admin2.layout.index')
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
                    <form role="form" method="post" action="{{url('/admin2/foodedit')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>菜品名字</label>
                            <input value="{{$data[0]->name}}" class="form-control" type="text" name="name"
                                   placeholder="1-8位字母或汉字" required="">
                        </div>
                        <div class="form-group">
                            <label>介绍</label>
                            <input value="{{$data[0]->info}}" class="form-control" type="text" name="info"
                                   placeholder="1-100位字母或汉字" required="">
                        </div>
                        <div class="form-group">
                            <label>价格</label>
                            <input value="{{$data[0]->price}}" class="form-control" type="text" name="price"
                                   placeholder="1-999元" required="">
                        </div>

                        <div class="form-group">
                            <label>餐饮类别</label>
                            <select class="form-control" name="type">
                                <option value="主打菜">主打菜</option>
                                <option value="主食">主食</option>

                                <option value="甜点">甜点</option>
                                <option value="汤饮">汤饮</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>菜品图片</label><br>
                            <img src="{{$data[0]->pic}}" alt="" width=200;>
                            <input type="file" name="pic">
                        </div>

                        <input type="hidden" name="id" value="{{$data[0]->id}}">
                        <button class="btn btn-default" type="submit">修改</button>
                        <button class="btn btn-default" type="reset">重置</button>
                    </form>
                </div>

            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
@stop