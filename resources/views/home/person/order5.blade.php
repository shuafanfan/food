@extends('home.person.layout.index')
@section('order')

    <div class="grid_3 grid_5 "><br>


        <h1 class="w3ls-hdg">账户资产</h1>
        <div data-example-id="togglable-tabs" role="tabpanel" class="bs-example bs-example-tabs w3">
            <ul role="tablist" class="nav nav-tabs" id="myTab">
                <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab"
                                                          role="tab" id="home-tab" href="#home">当前余额</a></li>

                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab"
                                                    role="tab" href="#profile" aria-expanded="false">充值记录</a></li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div aria-labelledby="home-tab" id="home" class="tab-pane fade active in" role="tabpanel">
                    <p style="font-size:30px"><i class="fa fa-jpy"></i>当前账户余额:0元</p>
                </div>

                <div aria-labelledby="profile-tab" id="profile" class="tab-pane fade w3" role="tabpanel">
                    <p style="font-size:30px">亲 您还没有充值哦</p>
                </div>

            </div>
        </div>
    </div>
@stop