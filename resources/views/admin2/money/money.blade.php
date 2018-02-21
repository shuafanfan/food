@extends('admin2.layout.index')
@section('con')

 <h2>一共完成{{$data[0]->count}}单</h2><br><br>
 <h2>店铺流水{{$data[0]->money}}元</h2>

@stop