@extends('home.layout.index')
@section('title','饿了么菜单')

@section('con')
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li onClick=history.go(-1) style="cursor: pointer;"><i class="fa fa-mail-reply"></i>&nbsp;后退</li>

        </ol>
    </div>

    <div class="about">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">关于我们</h3>
            <div class="about-text">
                <p>专业餐饮品牌招商、餐饮品牌策划咨询、PC+移动端一体化营销、峰会+论坛+展会线下活动、投资者与品牌商无缝对接、已服务1000+餐饮企业、餐饮业1000000+资讯发布、每天新增1000+投资餐饮数据。
                    　　
                    　　我们一直专注餐饮领域，餐饮我们更专业，餐饮行业权威新媒体，餐饮大品牌云集；定期主办承办和协会餐饮展会、论坛、峰会活动；专业投资顾问团队 ，实现创业者与品牌商无缝对接。</p>
                <div class="ftr-toprow">

                    <div class="col-md-4 ftr-top-grids">
                        <div class="ftr-top-left">
                            <i aria-hidden="true" class="fa fa-truck"></i>
                        </div>
                        <div class="ftr-top-right">
                            <h4>超快的物流</h4>
                            <p>让您每天尽享新鲜美食 </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4 ftr-top-grids">
                        <div class="ftr-top-left">
                            <i aria-hidden="true" class="fa fa-user"></i>
                        </div>
                        <div class="ftr-top-right">
                            <h4>尽责的员工</h4>
                            <p>让您放心的享用安全美食</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4 ftr-top-grids">
                        <div class="ftr-top-left">
                            <i aria-hidden="true" class="fa fa-thumbs-o-up"></i>
                        </div>
                        <div class="ftr-top-right">
                            <h4>优质的保障</h4>
                            <p>尽责尽心让您无忧</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="history">
                <h3 class="w3ls-title">我们服务范围</h3>
                <p>
                    本网于2009年上线，现已发展成为涵盖快餐、火锅、中餐、西餐、咖啡、烘焙、烧烤、特色餐饮、国际餐饮等三十二个餐饮业态分类，日均PV突破200万。已服务餐饮企业：好伦哥、赛百味、深海800米、金百万、一麻一辣、骄龙集团、阿瓦山寨、魏老香、百年龙袍等千余家国内外知名餐饮企业。</p>
            </div>
        </div>
    </div>
@stop