@extends('admin2.layout.index')
@section('con')

    <div class="products">

        <div class="container">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 100px;">订单号</th>
                    <th style="width: 200px;">订餐客人</th>
                    <th style="width: 600px;">评价</th>
                    <th>时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                    <tr>
                        <td>{{$v->ordernum}}</td>
                        <td>
                            <button class="btn btn-info" type="button">{{$v->phone}}</button>
                        </td>
                        <td>{{$v->evaluate}}</td>
                        <td>{{$v->creat_time}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
