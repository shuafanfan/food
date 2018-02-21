@extends('admin.layout.index')
@section('con')
    <form action="{{url('/admin/orderlist3')}}" method="get">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    已完成订单
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
                                        <label>按时间:<input type="search" name="keyword" class="form-control input-sm"
                                                          placeholder="" aria-controls="dataTables-example"/></label>
                                        <button class="btn btn-primary">搜索</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table align="middle" id="dataTables-example"
                                           class="table table-striped table-bordered table-hover dataTable no-footer"
                                           role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 180px;" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">订单号
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 220px;"
                                                aria-label="Browser: activate to sort column ascending">订单详情
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 180px;"
                                                aria-label="Platform(s): activate to sort column ascending">下单时间
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 164px;"
                                                aria-label="Engine version: activate to sort column ascending">订单状态
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                rowspan="1" colspan="1" style="width: 160px;"
                                                aria-label="CSS grade: activate to sort column ascending">操作
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($data as $k=>$v)
                                            <tr class="gradeA even aaa" role="row">
                                                <td class="sorting_1">{{$v->ordernum}}<br><br>
                                                    <span class="label label-danger bbb"
                                                          style="display:none">已点美食</span></td>
                                                <td>
                                                    <div>{{$v->nickname}}</div>
                                                    <div>{{$v->nickphone}}</div>
                                                    <div>{{$v->pos}}</div>
                                                </td>
                                                <td>{{$v->creat_time}}</td>
                                                <td class="center">{{$v->status}}</td>
                                                <td class="center">无</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-6">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                         id="dataTables-example_paginate">

                                        {!! $data->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </form>
    <script type="text/javascript">
        $(function () {

            $('.aaa').mouseover(function () {
                var ordernum = $(this).find('.sorting_1').text();

                $(this).find('.bbb').show();
                $(this).find('.bbb').click(function () {
                    console.log(ordernum);
                    window.location.href = "{{url('/admin/orderinfo')}}?n=" + ordernum;
                });

            });

            $('.aaa').mouseout(function () {

                $(this).find('.bbb').hide();
            });


        });

    </script>
@stop