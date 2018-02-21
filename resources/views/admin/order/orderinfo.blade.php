@extends('admin.layout.index')
@section('con')
    <table class="table table-bordered">

        <thead>
        <tr>
            <th>店铺</th>
            <th>菜品</th>
            <th>价格</th>
            <th>数量</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k=>$v)
            <tr>
                <td><code>{{$v->shopname}}</code></td>
                <td><code>{{$v->name}}</code></td>

                <td><span class="badge badge-warning">{{$v->price}}</span></td>
                <td><span class="badge badge-primary">{{$v->num}}</span></td>
            </tr>
        @endforeach
        </tbody>

    </table>
@stop