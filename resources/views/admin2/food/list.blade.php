@extends('admin2.layout.index')
@section('con')
    <form action="{{url('/admin2/foodlist')}}" method="get">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    食物列表

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
                                        <label>菜名:<input type="search" name="keyword" class="form-control input-sm"
                                                         placeholder="" aria-controls="dataTables-example"/></label>
                                        <button class="btn btn-primary">搜索</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dataTables-example"
                                           class="table table-striped table-bordered table-hover dataTable no-footer"
                                           role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 80px;" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">LOGO
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 120px;"
                                                aria-label="Browser: activate to sort column ascending">菜名
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 220px;"
                                                aria-label="Platform(s): activate to sort column ascending">介绍
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 120px;"
                                                aria-label="Engine version: activate to sort column ascending">价格
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 150px;"
                                                aria-label="CSS grade: activate to sort column ascending">操作
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1"><img src="{{$v->pic}}" alt=""
                                                                           style="width: 50px;height: 50px;"></td>
                                                <td>{{$v->name}}</td>
                                                <td>{{$v->info}}</td>
                                                <td>{{$v->price}}</td>
                                                <td class="center">
                                                    <a href="#" class="delFood" sid="{{$v->id}}">删除</a>
                                                    |<a href="{{url('/admin2/foodupdate')}}?id={{$v->id}}">修改</a>

                                                </td>
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
        $('.delFood').click(function () {
            //获取id
            var id = $(this).attr('sid');
            var links = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //发送ajax
            $.post('/admin2/fooddelete', {id: id}, function (data) {
                if (data == 1) {
                    //获取提醒信息
                    $('#successMessage').text('删除成功').show(1000);
                    setTimeout(function () {
                        $('#successMessage').hide(3000);
                    }, 3000);
                    links.parents('tr').remove();
                }
            });
            ,
            return false;
        })


    </script>
@stop