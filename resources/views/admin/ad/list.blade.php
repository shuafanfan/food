@extends('admin.layout.index')
@section('con')
    <form action="{{url('/admin/adlist')}}" method="get">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    广告列表

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
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="50">50</option>
                                            </select> 条
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="dataTables-example_filter" class="dataTables_filter">
                                        <label>内容:<input type="search" name="keyword" class="form-control input-sm"
                                                         placeholder="店名.菜名.是否加入"
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
                                                rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">LOGO
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 120px;"
                                                aria-label="Browser: activate to sort column ascending">店名
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 120px;"
                                                aria-label="Platform(s): activate to sort column ascending">菜名
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 240px;"
                                                aria-label="Platform(s): activate to sort column ascending">介绍
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 80px;"
                                                aria-label="Platform(s): activate to sort column ascending">是否广告
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 100px;"
                                                aria-label="CSS grade: activate to sort column ascending">操作
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1" align="center"><img src="{{$v->pic}}" alt=""
                                                                                          style="width: 150px;height: 100px;">
                                                </td>
                                                <td class="center">{{$v->shopname}}</td>
                                                <td class="center">{{$v->name}}</td>
                                                <td class="center changestatus">{{$v->info}}</td>
                                                <td class="ad">{{$v->ad}}</td>
                                                <td class="center">
                                                    <a href="#" class="addAd" sid="{{$v->id}}">加入广告</a><br>
                                                    <a href="#" class="delAd" sid="{{$v->id}}">移除广告</a>


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


        // 更换广告状态
        $('.delAd').click(function () {
            //获取id
            var id = $(this).attr('sid');
            var ad = "否"

            var links = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //发送ajax
            $.post('/admin/adedit', {id: id, ad: ad}, function (data) {
                if (data == 1) {
                    console.log(data);
                    //获取提醒信息
                    $('#successMessage').text('状态改变成功').show(1000);
                    setTimeout(function () {
                        $('#successMessage').hide(3000);
                    }, 3000);
                    links.parents('tr').find(".ad").text("否");
                }

            });

            return false;
        })
        // 更换广告状态
        $('.addAd').click(function () {
            //获取id
            var id = $(this).attr('sid');
            var ad = "已加入"

            var links = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //发送ajax
            $.post('/admin/adedit', {id: id, ad: ad}, function (data) {
                if (data == 1) {
                    console.log(data);
                    //获取提醒信息
                    $('#successMessage').text('状态改变成功').show(1000);
                    setTimeout(function () {
                        $('#successMessage').hide(3000);
                    }, 3000);
                    links.parents('tr').find(".ad").text("已加入");

                }

            });

            return false;
        })
    </script>
@stop