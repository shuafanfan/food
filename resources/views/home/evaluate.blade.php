@extends('home.layout.index')
@section('title','饿了么菜单')

@section('con')
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li onClick=history.go(-1) style="cursor: pointer;"><i class="fa fa-mail-reply"></i>&nbsp;后退</li>

        </ol>
    </div>

    <div class="products">

        <div class="container">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 250px;">订餐客人</th>
                    <th style="width: 700px;">评价</th>
                    <th>时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                    <tr>
                        <td><span class="badge badge-primary">{{substr_replace($v->phone,'****',3,4)}}</span></td>
                        <td>{{$v->evaluate}}</td>
                        <td>{{$v->creat_time}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop