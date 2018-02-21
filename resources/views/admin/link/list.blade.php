@extends('admin.layout.index')
@section('con')
    <form action="{{url('/admin/linklist')}}" method="get">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    友情链接列表

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
                                        <label>网址名称:<input type="search" name="keyword" class="form-control input-sm"
                                                           placeholder="网址.名称"
                                                           aria-controls="dataTables-example"/></label>
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
                                                rowspan="1" colspan="1" style="width: 60px;" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">网站
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 120px;"
                                                aria-label="Browser: activate to sort column ascending">地址
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 120px;"
                                                aria-label="Browser: activate to sort column ascending">操作
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr class="gradeA odd" role="row">

                                                <td>{{$v->name}}</td>
                                                <td>{{$v->url}}</td>
                                                <td class="center">
                                                    <a href="#" class="delLink" sid="{{$v->id}}">删除</a>|
                                                    <a href="{{url('/admin/linkupdate')}}?id={{$v->id}}"
                                                       sid="{{$v->id}}">修改</a>


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
        $('.delLink').click(function () {
            //获取id
            var id = $(this).attr('sid');
            var links = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //发送ajax
            $.post('/admin/linkdelete', {id: id}, function (data) {
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


    </script>
@stop