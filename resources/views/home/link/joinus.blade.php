@extends('home.layout.index')
@section('title','饿了么菜单')

@section('con')
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li onClick=history.go(-1) style="cursor: pointer;"><i class="fa fa-mail-reply"></i>&nbsp;后退</li>

        </ol>
    </div>
    <div class="contact cd-section" id="contact">
        <div class="container">
            <img src="/images/joinus.png" alt="" style="width: 1140px;">
        </div>
    </div>

@stop