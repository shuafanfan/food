@extends('home.person.layout.index')
@section('order')
    <script type="text/javascript" src="/js/comment.js"></script>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        a, img {
            border: 0;
        }

        /*quiz style*/
        .quiz {
            border: solid 1px #ccc;
            height: 270px;
            width: 772px;
            display: none;
        }

        .quiz h3 {
            font-size: 14px;
            line-height: 35px;
            height: 35px;
            border-bottom: solid 1px #e8e8e8;
            padding-left: 20px;
            background: #f8f8f8;
            color: #666;
            position: relative;
        }

        .quiz_content {
            padding-top: 10px;
            padding-left: 20px;
            position: relative;
            height: 205px;
        }

        .quiz_content .btm {
            border: none;
            width: 100px;
            height: 33px;
            background: url(/images/btn.gif) no-repeat;
            margin: 10px 0 0 64px;
            display: inline;
            cursor: pointer;
        }

        .quiz_content li.full-comment {
            position: relative;
            z-index: 99;
            height: 41px;
        }

        .quiz_content li.cate_l {
            height: 24px;
            line-height: 24px;
            padding-bottom: 10px;
        }

        .quiz_content li.cate_l dl dt {
            float: left;
        }

        .quiz_content li.cate_l dl dd {
            float: left;
            padding-right: 15px;
        }

        .quiz_content li.cate_l dl dd label {
            cursor: pointer;
        }

        .quiz_content .l_text {
            height: 120px;
            position: relative;
            padding-left: 18px;
        }

        .quiz_content .l_text .m_flo {
            float: left;
            width: 47px;
        }

        .quiz_content .l_text .text {
            width: 634px;
            height: 109px;
            border: solid 1px #ccc;
        }

        .quiz_content .l_text .tr {
            position: absolute;
            bottom: -18px;
            right: 40px;
        }

        /*goods-comm-stars style*/
        .goods-comm {
            height: 41px;
            position: relative;
            z-index: 7;
        }

        .goods-comm-stars {
            line-height: 25px;
            padding-left: 12px;
            height: 41px;
            position: absolute;
            top: 0px;
            left: 0;
            width: 400px;
        }

        .goods-comm-stars .star_l {
            float: left;
            display: inline-block;
            margin-right: 5px;
            display: inline;
        }

        .goods-comm-stars .star_choose {
            float: left;
            display: inline-block;
        }

        /* rater star */
        .rater-star {
            position: relative;
            list-style: none;
            margin: 0;
            padding: 0;
            background-repeat: repeat-x;
            background-position: left top;
            float: left;
        }

        .rater-star-item, .rater-star-item-current, .rater-star-item-hover {
            position: absolute;
            top: 0;
            left: 0;
            background-repeat: repeat-x;
        }

        .rater-star-item {
            background-position: -100% -100%;
        }

        .rater-star-item-hover {
            background-position: 0 -48px;
            cursor: pointer;
        }

        .rater-star-item-current {
            background-position: 0 -48px;
            cursor: pointer;
        }

        .rater-star-item-current.rater-star-happy {
            background-position: 0 -25px;
        }

        .rater-star-item-hover.rater-star-happy {
            background-position: 0 -25px;
        }

        .rater-star-item-current.rater-star-full {
            background-position: 0 -72px;
        }

        /* popinfo */
        .popinfo {
            display: none;
            position: absolute;
            top: 30px;
            background: url(/images/comment/infobox-bg.gif) no-repeat;
            padding-top: 8px;
            width: 192px;
            margin-left: -14px;
        }

        .popinfo .info-box {
            border: 1px solid #f00;
            border-top: 0;
            padding: 0 5px;
            color: #F60;
            background: #FFF;
        }

        .popinfo .info-box div {
            color: #333;
        }

        .rater-click-tips {
            font: 12px/25px;
            color: #333;
            margin-left: 10px;
            background: url(/images/comment/infobox-bg-l.gif) no-repeat 0 0;
            width: 125px;
            height: 34px;
            padding-left: 16px;
            overflow: hidden;
        }

        .rater-click-tips span {
            display: block;
            background: #FFF9DD url(/images/comment/infobox-bg-l-r.gif) no-repeat 100% 0;
            height: 34px;
            line-height: 34px;
            padding-right: 5px;
        }

        .rater-star-item-tips {
            background: url(/images/comment/star-tips.gif) no-repeat 0 0;
            height: 41px;
            overflow: hidden;
        }

        .cur.rater-star-item-tips {
            display: block;
        }

        .rater-star-result {
            color: #FF6600;
            font-weight: bold;
            padding-left: 10px;
            float: left;
        }
    </style>


    <form action="{{url('/home-person/order3')}}" method="get">
        <div class="col-lg-12">
            @if(session('error'))
                <div class="alert alert-warning alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {{session('error')}}
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {{session('success')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    待评价订单
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
    </form>

    <div class="row">
        <div class="col-sm-12">
            <table align="middle" id="dataTables-example"
                   class="table table-striped table-bordered table-hover dataTable no-footer" role="grid"
                   aria-describedby="dataTables-example_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"
                        style="width: 180px;" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending">订单号
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"
                        style="width: 220px;" aria-label="Browser: activate to sort column ascending">订单详情
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"
                        style="width: 180px;" aria-label="Platform(s): activate to sort column ascending">下单时间
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"
                        style="width: 120px;" aria-label="Engine version: activate to sort column ascending">消费
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"
                        style="width: 160px;" aria-label="CSS grade: activate to sort column ascending">订单状态
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"
                        style="width: 160px;" aria-label="CSS grade: activate to sort column ascending">操作
                    </th>
                </tr>
                </thead>
                <tbody>


                @foreach($data1 as $k=>$v)
                    <tr class="gradeA even aaa" role="row">
                        <td class="sorting_1"><p class="abc">{{$v->ordernum}}</p><br><br>
                            <span class="label label-danger bbb" style="display:none;cursor:pointer;">已点美食</span></td>
                        <td>
                            <div>{{$v->nickname}}</div>
                            <div>{{$v->nickphone}}</div>
                            <div>{{$v->pos}}</div>
                        </td>
                        <td>{{$v->creat_time}}</td>
                        <td class="center">{{$v->sum}}</td>
                        <td class="center">{{$v->status}}</td>
                        <td class="center">
                            <h4><span class="label label-success" style="cursor:pointer;">评价</span></h4><br>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <center><br>
        <div class="quiz">
            <h3>我要评论</h3>
            <div class="quiz_content">
                <form action="{{url('/home-person/evaluate')}}" id="" method="post">
                    {{ csrf_field() }}
                    <div class="goods-comm">
                        <div class="goods-comm-stars">
                            <span class="star_l">满意度：</span>
                            <div id="rate-comm-1" class="rate-comm"></div>
                        </div>
                    </div>

                    <div class="l_text">
                        <label class="m_flo">内 容：</label>
                        <input type="hidden" name="evaluate" value="无">
                        <textarea name="evaluate" id="" class="text"></textarea>
                        <input type="hidden" id="evaluate" name="ordernum" value="">
                        <span class="tr">字数限制为5-200个</span>
                    </div>
                    <button class="btm" type="submit"></button>
                </form>
            </div><!--quiz_content end-->
        </div><!--quiz end-->
    </center>
    <div class="row">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">

                {!! $data1->render() !!}
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

    <script type="text/javascript">
        $(function () {

            $('.aaa').mouseover(function () {
                var ordernum = $(this).find('.sorting_1').text();

                $(this).find('.bbb').show();
                $(this).find('.bbb').click(function () {
                    console.log(ordernum);
                    window.location.href = "{{url('/home-person/order')}}?n=" + ordernum;
                });

            });

            $('.aaa').mouseout(function () {

                $(this).find('.bbb').hide();
            });

            $('.label-success').click(function () {
                var ordernum = $(this).parents('.aaa').find('.abc').text();


                $(".quiz").show();
                $('#evaluate').val(ordernum);

            });


        });

    </script>
@stop