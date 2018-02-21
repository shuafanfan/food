@extends('admin.layout.index')
@section('con')

    <form action="{{url('/admin/evaluate')}}" method="get">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    评价列表

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <div id="dataTables-example_wrapper"
                             class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="dataTables-example_length">
                                        <label>显示
                                            <select name="num" aria-controls="dataTables-example"
                                                    class="form-control input-sm">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                            </select> 条
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="dataTables-example_filter" class="dataTables_filter">
                                        <label>内容:<input type="search" name="keyword" class="form-control input-sm"
                                                         placeholder="客人.评价"
                                                         aria-controls="dataTables-example"/></label>
                                        <button class="btn btn-primary">搜索</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 150px;">店铺</th>
                                            <th style="width: 170px;">订餐客人</th>
                                            <th style="width: 600px;">评价</th>
                                            <th style="width: 100px;">时间</th>
                                            <th style="width: 100px;">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($data as $k=>$v)
                                            <tr>
                                                <td>
                                                    <button class="btn btn-warning"
                                                            type="button">{{strtok($v->shopname,' ')}}</button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-info" type="button">{{$v->phone}}</button>
                                                </td>
                                                <td>{{$v->evaluate}}</td>
                                                <td>{{$v->creat_time}}</td>
                                                <td><a href="#" class="delEvaluate" sid="{{$v->id}}">删除</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" role="status"
                                         aria-live="polite">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {!! $data->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->

                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
    </form>

    <script type="text/javascript">

        //给所有的删除链接绑定事件
        $('.delEvaluate').click(function () {
            //获取id
            var id = $(this).attr('sid');
            var links = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //发送ajax
            $.post('/admin/evaluatedelete', {id: id}, function (data) {
                if (data == 1) {
                    //获取提醒信息
                    $('#successMessage').text('删除成功').show(1000);
                    setTimeout(function () {
                        $('#successMessage').hide(3000);
                    }, 3000);
                    links.parents('tr').remove();
                }
            });

            return false;
        })

        //给所有的删除链接绑定事件
        $('.blackUser').click(function () {
            //获取id
            var id = $(this).attr('sid');
            var links = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //发送ajax
            $.post('/admin/userblack', {id: id}, function (data) {
                if (data == 1) {
                    //获取提醒信息
                    $('#successMessage').text('放入黑名单成功').show(1000);
                    setTimeout(function () {
                        $('#successMessage').hide(3000);
                    }, 3000);

                }
            });

            return false;
        })


    </script>

@stop