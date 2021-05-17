@extends('frontend.layouts.app')
@section('title')
@section('content')


        <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            font-size: 14px;
            overflow-x: hidden; /* Hide horizontal scrollbar */
        }
        html {
            scroll-behavior: smooth;
        }
        /*.w-20 {*/
        /*    -webkit-box-flex: 0;*/
        /*    -ms-flex: 0 0 20% !important;*/
        /*    flex: 0 0 20% !important;*/
        /*    max-width: 20%;*/
        /*}*/
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 100px;
            width: 100px;
            outline: black;
            background-size: 100%, 100%;
            border-radius: 50%;
            border: 1px black;
            background-image: none;
        }


    </style>
</head>
<body>
<div class="container-fluid" style="padding: 0px;background-image: url({{url('/')}});">
    <div style="height: auto;width: 100%;">
        @foreach($bgtitles->slice(0,1) as $bgtitle)
            <img class="img-fluid mx-auto d-block" style="height: auto;width: 100%" src="{{url('/')}}/upload/bgtitle/{{$bgtitle->file_name}}" alt="slide 2">
        @endforeach
    </div>
</div>
<br>



{{--<div class="slideshow-container container" style="height:480px;background-color:{{$dataCss->bg_first_slide}};margin: auto;">--}}
{{--    @php--}}
{{--    $i = 1;--}}
{{--    @endphp--}}
{{--    @foreach($slideshows as $slide)--}}
{{--        @if($slide->status == 0)--}}
{{--            <div class="mySlides show">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-5 col-sm-12">--}}
{{--                <img class="img-fluid mx-auto d-block" style="height: 430px;margin: 2% auto;" src="{{url('/')}}/upload/nayok/@foreach($slidenayokimgs as $slidenayokimg){{$slidenayokimg->file_name}}@endforeach" alt="slide 1">--}}
{{--                <div class="parallelogram bottom-left" style="margin-left: 5%;margin-top: -10%"><p style="font-size: 1.2rem;font-weight: 400;text-align: center;background-color: white;z-index: 500">@foreach($slidenayoknames as $slidename) {{$slidename->name}}<br>{{$slidename->detail}} @endforeach</p></div>--}}
{{--                    </div>--}}
{{--                    <div id="hidden" class="col-md-7 col-sm-12">--}}
{{--                <a href="{{$slide->link}}" title="">--}}
{{--                    <img class="img-fluid mx-auto d-block fade show pc-hide " style="height: 430px;width:100%;margin: 2% auto" src="{{url('/')}}/upload/slideshow/{{$slide->file_name}}" alt="slide 1">--}}
{{--                </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        @elseif($slide->status == 1)--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--    <a id="hidden" class="prev" onclick="plusSlides(-1)">&#10094;</a>--}}
{{--    <a id="hidden" class="next" onclick="plusSlides(1)">&#10095;</a>--}}
{{--</div>--}}


{{--<div id="hiddenpc">--}}
{{--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">--}}

{{--    <div class="carousel-inner" role="listbox">--}}

{{--        <div class="item">--}}
{{--            <table style="width: 100%;">--}}

{{--                <tr> @foreach($banner_executive_menus->slice(0,3) as $banner_executive_menu)<td><a href="{{$banner_executive_menu->link}}"><img class="img-fluid mx-auto d-block" style="height: 80px;width: 100%;margin-top:5%;text-decoration: none;" src="{{url('/')}}/upload/banner_executive/{{$banner_executive_menu->file_name}}" alt="slide 2">--}}
{{--                            <p style="font-size: 0.8rem;font-weight: bolder;text-align: center;background-color: tranparent;color: black;">{{$banner_executive_menu->name}}</p></a></td>@endforeach</tr>--}}
{{--                <tr> @foreach($banner_executive_menus->slice(3,6) as $banner_executive_menu)<td><a href="{{$banner_executive_menu->link}}"><img class="img-fluid mx-auto d-block" style="height: 80px;width: 100%;margin-top:5%;text-decoration: none;" src="{{url('/')}}/upload/banner_executive/{{$banner_executive_menu->file_name}}" alt="slide 2">--}}
{{--                            <p style="font-size: 0.8rem;font-weight: bolder;text-align: center;background-color: tranparent;color: black;">{{$banner_executive_menu->name}}</p></a></td>@endforeach</tr>--}}
{{--            </table>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}

{{--</div>--}}
<div class="slideshow-container container" id="hidden" style="height:auto;margin:-2% auto;background-color: {{$dataCss->bg_second_slide}};">
    <h4 style="text-align: center;margin-top: 3%">สารจากนายก</h4>
    <div class="row">
        <div class="col-7">
            <img class="img-fluid mx-auto d-block" style="height: 350px;margin: 3% auto;" src="{{url('/')}}/upload/nayok/@foreach($slidenayokimgs as $slidenayokimg){{$slidenayokimg->file_name}}@endforeach" alt="slide 1">
        </div>
        <div class="col-3 marqueenayok" style="height: 250px;background-color: #e9e9e9;">
            <marquee height="250" Scrollamount=2  direction="up"><p style="text-align: center;font-size: 16px">@foreach($slidenayoknames as $slidenayokname) @php echo $slidenayokname->detail @endphp @endforeach</p> </marquee>
            <b style="text-align: center;font-size: 24px">@foreach($slidenayoknames as $slidenayokname) {{$slidenayokname->name}} @endforeach</b>
        </div>
    </div>
</div>



<div class="slideshow-container container" id="hidden" style="height:auto;margin:-2% auto;background-color: {{$dataCss->bg_second_slide}};">
    <div class="row">
        <div class="col-9">
            <h4 style="text-align: center;margin-top: 3%">ประชาสัมพันธ์</h4>
            {{--    <div class="slideshow-container container" id="hidden" style="height:auto;margin:-1% auto;background-color: transparent;">--}}
            @php
                $i = 1;
            @endphp
            {{--    <div id="back"></div>--}}
            {{--    <div id="front"></div>--}}
            @foreach($slideshownews as $slideshownew)
                {{--        @if($slide->status == 0)--}}
                <div class="mySlides2 show">
                    <a href="#" title="">
                        <img class="img-fluid mx-auto d-block fade show" style="height: 450px;width:1024px;margin: 2% auto" src="{{url('/')}}/upload/slideshow_news/{{$slideshownew->file_name}}" alt="slide 1">
                    </a>
                </div>

                {{--        @elseif($slide->status == 1)--}}
                {{--        @endif--}}
            @endforeach
            <a class="prev" onclick="plusSlides2(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides2(1)">&#10095;</a>
        </div>
        <div class="col-3">
            <h4 style="text-align: center;margin-top: 10%">ช่องทางลัด</h4>
            @foreach($banner_shortcut->slice(0,6) as $banner_shortcuts)
                <a href="{{$banner_shortcuts->link}}"><img class="img-fluid mx-auto d-block" style="height: 60px;width:260px;margin-top:5%;text-decoration: none;" src="{{url('/')}}/upload/bannershortcut/{{$banner_shortcuts->file_name}}" alt="slide 2">
                    <p style="font-size: 0.8rem;font-weight: bolder;text-align: center;background-color: transparent;color: black;"></p></a>
            @endforeach
        </div>
    </div>
</div>

{{--<div style="text-align:center">--}}
{{--    <span class="dot" onclick="currentSlide(1)"></span>--}}
{{--    <span class="dot" onclick="currentSlide(2)"></span>--}}
{{--    <span class="dot" onclick="currentSlide(3)"></span>--}}
{{--</div>--}}
{{--<hr class="colored" />--}}



<div class="container-fluid" id="hidden" style="height:auto;margin: 0 auto;background-color: {{$dataCss->bg_executive_menu}}">
    <div class="row">
        @foreach($banner_executive_menus->slice(0,6) as $banner_executive_menu)
            <div class="col-sm-2" style="height: auto;margin: 0 auto">
                <div style="height: 130px">
                    <a href="{{$banner_executive_menu->link}}"><img class="img-fluid mx-auto d-block" style="height: 110px;margin-top:5%;text-decoration: none;" src="{{url('/')}}/upload/banner_executive/{{$banner_executive_menu->file_name}}" alt="slide 2">
                        <p style="font-size: 0.8rem;font-weight: bolder;text-align: center;background-color: transparent;color: black;">{{$banner_executive_menu->name}}</p></a>
                </div>
            </div>
        @endforeach
    </div>

</div>
<br>

<div class="tile container-fluid  col-11" id="tile-1" style="margin: 5px auto;padding: 0px;">
    <h4 style="text-align: center">ข่าวสารความเคลื่อนไหว</h4>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <div class="slider"></div>
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#news" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-newspaper"></i>ข่าวประชาสัมพันธ์</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#egp" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-tasks"></i> ข้อมูลจัดซื้อจัดจ้าง (EGP)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="setting-tab" data-toggle="tab" href="#purchase" role="tab" aria-controls="setting" aria-selected="false"><i class="fas fa-tasks"></i> ข่าวจัดซื้อจัดจ้าง</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="setting-tab" data-toggle="tab" href="#job" role="tab" aria-controls="setting" aria-selected="false"><i class="fas fa-tasks"></i> ข่าวรับสมัครงาน</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="home-tab" style="background-color: {{$dataCss->bg_news_col}};height: auto;width: auto;">
            <div class="card" style="border:hidden;height: auto">
                <div class="card-header">
                    <div class="row" id="hidden" style="text-align: center">
                        @foreach($news as $new)
                            @if($new->status == 1)
                                <a href="catalog/news/{{$new->id}}"><div class="col-sm-3" style="border-right: solid 1px #dedede;border-left: solid 1px #dedede;margin-right: 5%;margin-top: 1%;margin-left: 3%;height: auto">
                                        <a href="catalog/news/{{$new->id}}">
                                            <img class="img-fluid" style="height: 125px;width: 125px" src="{{url('/')}}/upload/news/{{$new->file_name}}" alt="slide 1">
                                            <p style="text-decoration: none;color: black">{{$new->name}}</p>
                                        </a>
                                    </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row" id="hiddenpc">
                        <div class="col-sm-12">
                            @foreach($news as $new)
                                @if($new->status == 1)
                                    <a href="catalog/news/{{$new->id}}" style="font-size: 1.1rem;text-decoration: none;color: black"><font color='red'> > </font>{{$new->name}}</a>
                                    <br>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-12 text-right">
                            <a href="catalog/news"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="tab-pane fade" id="egp" role="tabpanel" aria-labelledby="contact-tab" style="background-color: {{$dataCss->bg_news_col}};">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="border:hidden">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-8">
                                </div>
                                @foreach($domains as $wn)

                                @endforeach
                                <iframe id='subject_only'  src='http://egp.itglobal.co.th/itg/{{$wn->egp_code}}' width="100%" height="400px" frameborder="none"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="purchase" role="tabpanel" aria-labelledby="setting-tab" style="background-color: {{$dataCss->bg_news_col}}">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-new-tab" data-toggle="pill" href="#new" role="tab" aria-controls="new" aria-selected="true">ประกาศข่าวจัดซื้อจัดจ้าง</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-mid-tab" data-toggle="pill" href="#mid" role="tab" aria-controls="mid" aria-selected="false">ประกาศราคากลาง</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-sub-tab" data-toggle="pill" href="#sub" role="tab" aria-controls="sub" aria-selected="false">ประกาศผู้ชนะเสนอราคา</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-result-tab" data-toggle="pill" href="#result" role="tab" aria-controls="result" aria-selected="false">สรุปผลการจัดซื้อจัดจ้าง</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="pills-new-tab" style="height: 360px">
                            @foreach($purchases->slice(0,9) as $purchase)
                                <a href="purchase/news/{{$purchase->id}}" style="font-size: 1.1rem;text-decoration: none;color: black"><font color='red'> > </font>{{$purchase->name}}</a>
                                <br>
                                <hr>
                            @endforeach
                            <div class="row mt-1">
                                <div class="col-lg-12 text-right">
                                    <a href="purchase/news"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mid" role="tabpanel" aria-labelledby="pills-mid-tab">
                            @foreach($purchases_mid->slice(0,9) as $purchase_mid)
                                <a href="purchase/mid/{{$purchase_mid->id}}" style="font-size: 1.1rem;text-decoration: none;color: black"><font color='red'> > </font>{{$purchase_mid->name}}</a> <br>
                            @endforeach
                            <div class="row mt-1">
                                <div class="col-lg-12 text-right">
                                    <a href="purchase/mid"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sub" role="tabpanel" aria-labelledby="pills-sub-tab">
                            @foreach($purchases_sub->slice(0,9) as $purchase_sub)
                                <a href="purchase/sub/{{$purchase_sub->id}}" style="font-size: 1.1rem;text-decoration: none;color: black"><font color='red'> > </font>{{$purchase_sub->name}}</a> <br>
                            @endforeach
                            <div class="row mt-1">
                                <div class="col-lg-12 text-right">
                                    <a href="purchase/sub"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="result" role="tabpanel" aria-labelledby="pills-result-tab">
                            @foreach($purchases_result->slice(0,9) as $purchase_result)
                                <a href="purchase/result/{{$purchase_result->id}}" style="font-size: 1.1rem;text-decoration: none;color: black"><font color='red'> > </font>{{$purchase_result->name}}</a> <br>
                            @endforeach
                            <div class="row mt-1">
                                <div class="col-lg-12 text-right">
                                    <a href="purchase/result"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="setting-tab" style="background-color: {{$dataCss->bg_news_col}}">

            <div class="card" style="border:hidden">
                <div class="card-header">
                    <div class="row">
                        @foreach($jobs as $job)
                            <a href="catalog/jobs/{{$job->id}}" style="font-size: 1.1rem;text-decoration: none;color: black"><font color='red'> > </font>{{$job->name}}</a>
                            <br>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-12 text-right">
                    <a href="catalog/jobs"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
                </div>
            </div>
        </div>
    </div>


</div>
</div>

{{--Activity LAYOUT--}}

<div class="container-fluid" id="hiddenpc" style="margin:0 auto;background-color: {{$dataCss->bg_activity_layout}}">
    <h4 style="text-align: center">กิจกรรมโครงการ</h4>
    <div class="row" style="margin-top: 1%">
        @foreach($activitys->slice(0,4) as $activity)
            <div class="col-12">
                <div class="bg-info" style="height: auto;margin-top: 2%">
                    <a href="{{url('/')}}/catalog/activity/{{$activity->id}}"><img class="img-fluid mx-auto d-block" style="height: 250px;width: 100%" src="{{url('/')}}/upload/activity/{{$activity->file_name}}" alt="{{$activity->tag}}"></a>
                </div>
                <p class="bottom-right" style="font-size: 1.2rem;font-weight: 400;text-align: center;background-color: white;border-radius: 25px;">{{$activity->name}}</p>
            </div>
        @endforeach
    </div>
    <div class="row mt-1">
        <div class="col-lg-12 text-right">
            <a href="catalog/activity"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
        </div>
    </div>
</div>
@if($dataCss->layout_activity==1)
    <div class="container-fluid col-11" id="hidden" style="margin-top: 0%;background-color: {{$dataCss->bg_activity_layout}};">
        <h4 style="text-align: center">กิจกรรมโครงการ</h4>

        <div class="row" style="margin: 0 auto">
            @foreach($activitys as $activity)
                @if($loop->first)
                    <div class="col-md-6 col-sm-12 zoom" style="height: auto">
                        <a href="{{url('/')}}/catalog/activity/{{$activity->id}}"><img class="img-fluid mx-auto d-block" style="height: 400px;width: 100%" src="{{url('/')}}/upload/activity/{{$activity->file_name}}" alt="{{$activity->tag}}"></a>
                        <p class="bottom-right" style="font-size: 1.2rem;font-weight: 400;text-align: center;background-color: white;border-radius: 25px";">{{$activity->name}}</p>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-md-6 col-xs-12" style="height: auto;">
                        <div class="row">
                            @foreach($activitys->slice(1,2) as $activity)
                                <div class="col zoom" style="height: auto">
                                    <div class="bg-info" style="height: 200px">
                                        <a href="{{url('/')}}/catalog/activity/{{$activity->id}}"> <img class="img-fluid mx-auto d-block" style="height: 200px;width: 100%" src="{{url('/')}}/upload/activity/{{$activity->file_name}}" alt="{{$activity->tag}}"> </a>
                                    </div>
                                    <p class="bottom-right" style="font-size: 1.2rem;font-weight: 400;text-align: center;background-color: white;border-radius: 25px;">{{$activity->name}}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="row" style="margin-top: 1%">
                            @foreach($activitys->slice(3,4) as $activity)
                                <div class="col zoom" style="height: auto">
                                    <div class="bg-info" style="height: 200px">
                                        <a href="{{url('/')}}/catalog/activity/{{$activity->id}}"> <img class="img-fluid mx-auto d-block" style="height: 200px;width: 100%" src="{{url('/')}}/upload/activity/{{$activity->file_name}}" alt="{{$activity->tag}}"> </a>
                                    </div>
                                    <p class="bottom-right" style="font-size: 1.2rem;font-weight: 400;text-align: center;background-color: white;border-radius: 25px;">{{$activity->name}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
        </div>
        <div class="row mt-1">
            <div class="col-lg-12 text-right">
                <a href="catalog/activity"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
            </div>
        </div>
    </div>

@elseif($dataCss->layout_activity==2)
    <div class="container-fluid" id="hidden" style="margin-top: 0%;background-color: {{$dataCss->bg_activity_layout}}">
        <h4 style="text-align: center">กิจกรรมโครงการ</h4>
        <div class="row zoom" style="height: 450px;margin: 0 auto;width: 100%">
            @foreach($activitys as $activity)
                @if($loop->first)
                    <a href="{{url('/')}}/catalog/activity/{{$activity->id}}"><img class="img-fluid mx-auto d-block" style="height: 450px;width: 100%" src="{{url('/')}}/upload/activity/{{$activity->file_name}}" alt="{{$activity->tag}}"></a>
                @endif

            @endforeach
        </div>
        <div class="row" style="margin-top: 1%;">
            @foreach($activitys->slice(1,3) as $activity)
                <div class="col-md-4 zoom" style="height: auto">
                    <a href="{{url('/')}}/catalog/activity/{{$activity->id}}"><img class="img-fluid mx-auto d-block" style="height: 250px;width: 100%" src="{{url('/')}}/upload/activity/{{$activity->file_name}}" alt="{{$activity->tag}}"></a>
                    <p class="bottom-right" style="font-size: 1.2rem;font-weight: 400;text-align: center;background-color: white;border-radius: 25px;">{{$activity->name}}</p>
                </div>
            @endforeach
            {{--        <div class="col-md-4">--}}
            {{--            <div class="bg-info" style="height: 200px">2</div>--}}
            {{--        </div>--}}
            {{--        <div class="col-md-4">--}}
            {{--            <div class="bg-info" style="height: 200px">3</div>--}}
            {{--        </div>--}}
        </div>
        <div class="row mt-1">
            <div class="col-lg-12 text-right">
                <a href="catalog/activity"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
            </div>
        </div>
    </div>
    </div>

@elseif($dataCss->layout_activity==3)
    <div class="container-fluid" id="hidden" style="margin:0 auto;background-color: {{$dataCss->bg_activity_layout}}">
        <h4 style="text-align: center">กิจกรรมโครงการ</h4>
        <div class="row" style="margin-top: 1%">
            @foreach($activitys->slice(0,5) as $activity)
                <div class="col zoom" style="height: auto">
                    <div style="height: 200px">
                        <a href="{{url('/')}}/catalog/activity/{{$activity->id}}"><img class="img-fluid mx-auto d-block" style="height: 250px;width:100%" src="{{url('/')}}/upload/activity/{{$activity->file_name}}" alt="{{$activity->tag}}"></a>
                    </div>
                    <p class="bottom-right" style="font-size: 1.2rem;font-weight: 400;text-align: center;background-color: white;border-radius: 25px;">{{$activity->name}}</p>
                </div>
            @endforeach
        </div>
        <div class="row mt-1">
            <div class="col-lg-12 text-right">
                <a href="catalog/activity"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
            </div>
        </div>
    </div>
@endif




{{--END Activity LAYOUT--}}


<div id="content-map">
    <div id="hidden">
        @include('frontend.map.map');
    </div>
</div>

<div class="container-fluid col-11" id="hiddenpc" style="margin-top: 0%;background-color: {{$dataCss->bg_travel}};">
    <br>
    <h4 style="text-align: center">สถานที่ท่องเที่ยวและสถานที่สำคัญ</h4>
    <div id="hidden" style="position:relative;z-index: 6;height:200px;width:100%;background: url('{{url('/')}}/upload/map/travel6.jpg')top center no-repeat;"></div>
    <div class="row" style="margin-top: 1%">
        @foreach($travels as $travel)
            <div class="vl"></div>
            <div class="col-12" style="height: auto;margin-top: 2%">
                <div class="bg-info" style="height: 200px;">
                    <a href="{{url('/')}}/travel/travel/{{$travel->master_id}}"><img class="img-fluid" style="height: 200px;width: 100%" src="{{url('/')}}/upload/travels/{{$travel->file_name}}" alt="@foreach($webname as $wn)  {{$wn['name'] }}@endforeach,{{$travel->tag}}"></a>
                </div>
                <div>
                    <p class="bottom-right" style="font-size: 1.2rem;font-weight: 400;text-align: center;background-color: white;border-radius: 25px;">{{$travel->name}}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-1">
        <div class="col-lg-12 text-right">
            <a href="travel/travel"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
        </div>
    </div>

</div>

<div class="container-fluid col-11" id="hiddenpc" style="margin-top: 0%;background-color: {{$dataCss->bg_travel}};">
    <br>
    <h4 style="text-align: center">สินค้าพื้นบ้าน</h4>
    <div id="hidden" style="position:relative;z-index: 6;height:200px;width:100%;background: url('{{url('/')}}/upload/map/travel6.jpg')top center no-repeat;"></div>
    <div class="row" style="margin-top: 1%">
        @foreach($otops as $otop)
            <div class="vl"></div>
            <div class="col-md-12" style="height: auto;margin-top: 2%">
                <div class="bg-info" style="height: 200px;">
                    <a href="{{url('/')}}/travel/otops/{{$otop->master_id}}"><img class="img-fluid mx-auto d-block" style="height: 200px;width: 100%" src="{{url('/')}}/upload/otops/{{$otop->file_name}}" alt="@foreach($webname as $wn)  {{$wn['name'] }}@endforeach,{{$otop->tag}}"></a>
                </div>
                <div>
                    <p class="bottom-right" style="font-size: 1.2rem;font-weight: 400;text-align: center;background-color: white;border-radius: 25px;">{{$otop->name}}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-1">
        <div class="col-lg-12 text-right">
            <a href="travel/otops"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
        </div>
    </div>

</div>


<div class="container-fluid col-11" id="hidden" style="margin-top: 0%;background-color: {{$dataCss->bg_otop}};">
    <br>
    <div style="position:relative;z-index: 6;height:200px;width:100%;background: url('{{url('/')}}/upload/map/travel6.jpg')top center no-repeat;"></div>
    {{--    <h4 style="text-align: center">TEST</h4>--}}
    <div class="row" style="margin-top: 1%">
        @foreach($travels as $travel)
            <div class="col-md-3 center" style="height: auto">
                <figure class="snip0019">
                    <img class="imgpadding" style="height: 200px" src="{{url('/')}}/upload/travels/{{$travel->file_name}}" alt="sample11"/>
                    <figcaption>
                        <div><h4>ท่องเที่ยว <span>ทั่วไทย</span></h4></div>
                        <div><p style="font-size: 20px;font-weight: bolder">{{$travel->name}}</p></div>
                        <a href="{{url('/')}}/travel/travel/{{$travel->master_id}}"></a>
                    </figcaption>
                </figure>
            </div>
        @endforeach
    </div>

    <div class="row mt-1">
        <div class="col-lg-12 text-right">
            <a href="travel/travel"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
        </div>
    </div>
</div>


<div class="container-fluid col-11" id="hidden" style="margin-top: 0%;background-color: {{$dataCss->bg_otop}};">
    <br>
    <h4 style="text-align: center">สินค้าพื้นบ้าน</h4>
    <div class="row" style="margin-top: 1%">
        @foreach($otops as $otop)
            <div class="col-md-3 center" style="height: auto">
                <figure class="snip0019">
                    <img class="imgpadding" style="height: 200px" src="{{url('/')}}/upload/otops/{{$otop->file_name}}" alt="sample11"/>
                    <figcaption>
                        <div><h4>OTOP <span>สินค้าพื้นบ้าน</span></h4></div>
                        <div><p>{{$otop->name}}</p></div>
                        <a href="{{url('/')}}/travel/otops/{{$otop->master_id}}"></a>
                    </figcaption>
                </figure>
            </div>
        @endforeach
    </div>
    <div class="row mt-1">
        <div class="col-lg-12 text-right">
            <a href="travel/otops"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
        </div>
    </div>
</div>


<div id="hiddenpc">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner" role="listbox">
            <h2 style="text-align: center">บริการประชาชน</h2>
            <div class="item">
                <table style="width: 100%;">

                    <tr>  @foreach($eservice->slice(0,3) as $eservic)<td><a href="{{$eservic->link}}" title="{{$eservic->name}}" >
                                <img class="img-fluid mx-auto d-block" style="height: 150px;width: 100%" src="{{url('/')}}/upload/eservices/{{$eservic->file_name}}" alt="slide 2">
                            </a></td>@endforeach</tr>
                    <tr>  @foreach($eservice->slice(3,6) as $eservic)<td><a href="{{$eservic->link}}" title="{{$eservic->name}}" >
                                <img class="img-fluid mx-auto d-block" style="height: 150px;width: 100%" src="{{url('/')}}/upload/eservices/{{$eservic->file_name}}" alt="slide 2">
                            </a></td>@endforeach</tr>
                    <tr>  @foreach($eservice->slice(6,9) as $eservic)<td><a href="{{$eservic->link}}" title="{{$eservic->name}}" >
                                <img class="img-fluid mx-auto d-block" style="height: 150px;width: 100%" src="{{url('/')}}/upload/eservices/{{$eservic->file_name}}" alt="slide 2">
                            </a></td>@endforeach</tr>
                </table>
            </div>

        </div>
    </div>

</div>

{{--<div class="container-fluid" id="hidden" style="background-color: {{$dataCss->bg_banner}};margin-top: 1%">--}}
{{--    <h4 style="text-align: center">บริการประชาชน</h4>--}}
{{--    @php--}}
{{--        $i = 1;--}}
{{--    @endphp--}}

{{--    <div id="carouselExample" class="caro  usel slide center" data-ride="carousel" data-interval="9000" style="margin: 0 auto;">--}}
{{--        <div class="carousel-inner row w-100 mx-auto" role="listbox">--}}
{{--            @foreach($eservice as $eservic)--}}
{{--                <div class="carousel-item col-lg-3 @if ($loop->first) active @endif">--}}
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-thumbnail zoom">--}}
{{--                            <a href="{{$eservic->link}}" title="{{$eservic->name}}" >--}}
{{--                                <img class="img-fluid mx-auto d-block" style="height: 200px;width: 100%" src="{{url('/')}}/upload/eservices/{{$eservic->file_name}}" alt="{{$eservic->name}}">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev" style="margin-left: -10%;margin-top: -6%">--}}
{{--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--            <span class="sr-only">Previous</span>--}}
{{--        </a>--}}
{{--        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next" style="margin-right: -10%;margin-top: -6%">--}}
{{--            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--            <span class="sr-only">Next</span>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">--}}
{{--                <div class="MultiCarousel-inner">--}}
{{--                    @foreach($eservice as $eservic)--}}
{{--                    <div class="item zoom">--}}
{{--                            <a href="{{$eservic->link}}" title="{{$eservic->name}}" >--}}
{{--                                <img class="img-fluid mx-auto d-block" style="height: 200px;width: 200px" src="{{url('/')}}/upload/eservices/{{$eservic->file_name}}" alt="{{$eservic->name}}">--}}
{{--                            </a>--}}
{{--                    </div>--}}
{{--                        @endforeach--}}
{{--                </div>--}}
{{--                <button class="btn btn-dark leftLst"><</button>--}}
{{--                <button class="btn btn-dark rightLst">></button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 text-center">--}}
{{--                <br/><br/><br/>--}}
{{--                <hr/>--}}
{{--                <p>Settings</p>--}}
{{--                <p>Change data items for xs,sm,md and lg display items respectively. Ex:data-items="1,3,5,6"</p>--}}
{{--                <p>Change data slide for slides per click Ex:data-slide="1"</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--</div>--}}





<div class="container-fluid col-11" id="hidden" style="background-color: {{$dataCss->bg_banner}};margin-top: 1%">
    <h4 style="text-align: center">บริการประชาชน</h4>
    <div class="owl-carousel">
        @foreach($eservice as $eservic)
            <div class="item">
                <a href="{{$eservic->link}}" title="{{$eservic->name}}" >
                    <img class="img-fluid mx-auto d-block" style="height: 200px;width: 200px" src="{{url('/')}}/upload/eservices/{{$eservic->file_name}}" alt="{{$eservic->name}}">
                </a>
            </div>
        @endforeach
    </div>
</div>

<script src="{{ asset('assets/owlcarousel/owl.carousel.min.js') }}"></script>
<script>
    var $owl = $('.owl-carousel');

    $owl.children().each( function( index ) {
        $(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
    });

    $owl.owlCarousel({
        center: true,
        loop: true,
        items: 5,
    });

    $(document).on('click', '.owl-item>div', function() {
        // see https://owlcarousel2.github.io/OwlCarousel2/docs/api-events.html#to-owl-carousel
        var $speed = 300;  // in ms
        $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
    });
</script>


{{--<div class="container-fluid" id="hiddenpc" style="background-color: {{$dataCss->bg_youtube}};margin:0 auto ">--}}
{{--    <br>--}}
{{--    <h4 style="text-align: center">สื่อวีดีโอ</h4>--}}
{{--<div class="row" style="height: auto;padding-left: 0px;width: 100%">--}}

{{--    @php--}}
{{--        $data = DB::connection('db2')->table('youtubes')->where('status','1')->get();--}}
{{--        $cVideo = count($data) >  2 ? 2 : count($data); @endphp--}}
{{--    @foreach($data->slice(0,5) as $vdoKey => $vdoVal)--}}
{{-- <div>--}}

{{--            <div class="col-12">--}}
{{--                <div class="zoom col-xs-12" style="margin-right: 5%;height:300px;background: url({{url('/')}}/upload/bg/bg-video.png)top center no-repeat">--}}

{{--                        <a data-href="http://www.youtube.com/embed/{{$vdoVal->embed}}?autoplay=1"--}}
{{--                           class="youtube-yeah">--}}
{{--                            <img src="http://i3.ytimg.com/vi/{{$vdoVal->embed}}/0.jpg"--}}
{{--                                 height="230px" style="margin-top: 12px;width: 280px;cursor: pointer">--}}
{{--                        </a>--}}
{{--                </div>--}}

{{--        </div>--}}

{{-- </div>--}}
{{--    @endforeach--}}

{{--</div>--}}
{{--    <div class="row mt-1">--}}
{{--        <div class="col-lg-12 text-right">--}}
{{--            <a href="youtube"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<h4 style="text-align: center">สื่อวีดีโอ</h4>
<div class="owl-carousel" style="background-color: {{$dataCss->bg_youtube}};margin:0 auto ">

    @php
        $data = DB::connection('db2')->table('youtubes')->where('status','1')->get();
        $cVideo = count($data) >  2 ? 2 : count($data); @endphp
    @foreach($data->slice(0,5) as $vdoKey => $vdoVal)
        <div class="item1">
            <a class="popup-youtube" href="https://www.youtube.com/watch?v={{$vdoVal->embed}}?autoplay=1&rel=0&controls=0&showinfo=0&wmode=transparent">
                <img src="http://i3.ytimg.com/vi/{{$vdoVal->embed}}/0.jpg"><i class="fa fa-play" aria-hidden="true"></i></a>
        </div>
    @endforeach
</div>

<div class="row mt-1" id="hidden">
    <div class="col-lg-12 text-right">
        <a href="youtube"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png" height="40px;"></a>
    </div>
</div>


<script src="{{ asset('assets/magnific/jquery.magnific-popup.js') }}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        loop: true,
        margin: 50,
        responsiveClass: true,
        nav: true,
        stagePadding: 100,
        responsive: {
            0: {
                items: 1
            },
            568: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
    $(document).ready(function() {
        $('.popup-youtube').magnificPopup({
            disableOn: 320,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: true
        });
    });
    $('.item1').magnificPopup({
        delegate: 'a',
    });
</script>


{{--<div class="tile container" id="tile-2">--}}
{{--    <h2>ข่าวจัดซื้อจัดจ้าง</h2>--}}

{{--    <!-- Nav tabs -->--}}
{{--    <ul class="nav nav-tabs nav-justified" role="tablist">--}}
{{--        <div class="slider"></div>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#annoucer" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-business-time"></i>ประกาศจัดซื้อจัดจ้าง</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#purchase_mid" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-business-time">ประกาศราคากลาง</i></a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#purchase_result" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-business-time"></i>ผลการจัดซื้อจัดจ้าง</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" id="setting-tab" data-toggle="tab" href="#purchase_result2" role="tab" aria-controls="setting" aria-selected="false"><i class="fas fa-business-time"></i>รายงานผลการจัดซื้อจัดจ้าง</a>--}}
{{--        </li>--}}
{{--    </ul>--}}

{{--    <!-- Tab panes -->--}}
{{--    <div class="tab-content">--}}
{{--        <div class="tab-pane fade show active" id="annoucer" role="tabpanel" aria-labelledby="home-tab">--}}
{{--            @foreach($purchases as $purchase)--}}
{{--              <a href="purchase/news/{{$purchase->id}}}" style="font-size: 1.3rem">{{$purchase->name}}</a><font color='red'> > </font> <br>--}}
{{--            <div class="row" style="height: 200px;">--}}
{{--                <div class="col-sm-3" style="background-color:grey;border-right: solid 1px #dedede"></div>--}}
{{--                <a href="{{url('/')}}" ></a>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <div class="tab-pane fade" id="purchase_mid" role="tabpanel" aria-labelledby="profile-tab">ประกาศราคากลาง</div>--}}
{{--        <div class="tab-pane fade" id="purchase_result" role="tabpanel" aria-labelledby="contact-tab">ผลการจัดซื้อจัดจ้าง--}}
{{--            <div class="row" style="height: 200px;">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="tab-pane fade" id="purchase_result2" role="tabpanel" aria-labelledby="setting-tab">รายงานผลการจัดซื้อจัดจ้าง</div>--}}
{{--    </div>--}}

{{--</div>--}}



{{--<div class="container" id="tab-purchaseegp" role="tabpanel" aria-labelledby="purchase-tab">--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--            <div class="card" style="border:hidden">--}}
{{--                <div class="card-header">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-8">--}}
{{--                        </div>--}}
{{--                        <iframe id='subject_only'  src='http://egp.itglobal.co.th/itg/4500601' width="100%" height="400px" frameborder="none" " ></iframe>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}

{{--<div class="container-fluid" style="padding: 0px">--}}
{{--    <h2>Executive</h2>--}}
{{--    <div style="height: auto;">--}}
{{--        @foreach($executives->slice(0,1) as $executive)--}}
{{--            @if($executive->status == 1)--}}
{{--                <img class="img-fluid mx-auto d-block" style="height: auto;width: 100%" src="{{url('/')}}/upload/executive/{{$executive->file_name}}">--}}
{{--            @endif--}}
{{--        @endforeach--}}

{{--    </div>--}}
{{--</div>--}}
<div>
    {{--    @foreach($test as $tests)--}}
    {{--    @dd($tests)--}}
    {{--        {{$test['table_name']}}--}}
    {{--    @endforeach--}}
</div>




{{--<div class="container-fluid">--}}
{{--    <h2>Media</h2>--}}
{{--    <div style="height: 400px;background-color: darkgrey">--}}

{{--    </div>--}}
{{--</div>--}}

{{--<div class="container-fluid">--}}
{{--    <h2>Service</h2>--}}
{{--    <div style="height: 400px;background-color: lightgrey">--}}

{{--    </div>--}}
{{--</div>--}}

<style>
    @media screen and (max-width: 768px) {
        #title_message {
            visibility: hidden;
            clear: both;
            float: left;
            margin: 10px auto 5px 20px;
            width: 28%;
            display: none;
        }
</style>

<div class="container-fluid" id="title_message" style="margin: 3% auto">
    <!-- Control the column width, and how they should appear on different devices -->

    <div class="row" style="height: 230px">
        <div class="col-3" style="margin-left:2%">
            <div id="fb-root"></div>

            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v7.0"></script>
            <div class="fb-page" data-href="https://www.facebook.com/{{$dataCss->fbpage_code}}" data-tabs="timeline" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true"
                 data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/{{$dataCss->fbpage_code}}" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/{{$dataCss->fbpage_code}}"></a></blockquote></div>
        </div>
        <div class="col-3">
            <div style="margin-left:20%;">
                <div name="airvisual_widget" key="Dra4J4ZMrKTDimn7m"></div>
                <script type="text/javascript" src="https://www.airvisual.com/scripts/widget_v2.0.js"></script>
            </div>
            <iframe frameborder="0" width="350px" height="300px" style="margin-top:5%;" src="https://covid19.th-stat.com/th/share/dashboard"></iframe>
        </div>


        <div class="col-5" style="margin-left:5%">
            <div id="calendar">
                <div id="calendar_header"><i class="icon-chevron-left"> < </i>          <h1></h1><i class="icon-chevron-right"> > </i>         </div>
                <div id="calendar_weekdays"></div>
                <div id="calendar_content"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){function c(){p();var e=h();var r=0;var u=false;l.empty();while(!u){if(s[r]==e[0].weekday){u=true}else{l.append('<div class="blank"></div>');r++}}for(var c=0;c<42-r;c++){if(c>=e.length){l.append('<div class="blank"></div>')}else{var v=e[c].day;var m=g(new Date(t,n-1,v))?'<div class="today">':"<div>";l.append(m+""+v+"</div>")}}var y=o[n-1];a.css("background-color",y).find("h1").text(i[n-1]+" "+t);f.find("div").css("color",y);l.find(".today").css("background-color",y);d()}function h(){var e=[];for(var r=1;r<v(t,n)+1;r++){e.push({day:r,weekday:s[m(t,n,r)]})}return e}function p(){f.empty();for(var e=0;e<7;e++){f.append("<div>"+s[e].substring(0,3)+"</div>")}}function d(){var t;var n=$("#calendar").css("width",e+"px");n.find(t="#calendar_weekdays, #calendar_content").css("width",e+"px").find("div").css({width:e/7+"px",height:e/10+"px","line-height":e/7+"px"});n.find("#calendar_header").css({height:e*(1/7)+"px"}).find('i[class^="icon-chevron"]').css("line-height",e*(1/7)+"px")}function v(e,t){return(new Date(e,t,0)).getDate()}function m(e,t,n){return(new Date(e,t-1,n)).getDay()}function g(e){return y(new Date)==y(e)}function y(e){return e.getFullYear()+"/"+(e.getMonth()+1)+"/"+e.getDate()}function b(){var e=new Date;t=e.getFullYear();n=e.getMonth()+1}var e=480;var t=2013;var n=9;var r=[];var i=["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];var s=["อา","จ","อ","พ","พฤ","ศ","ส"];var o=["#16a085","#1abc9c","#c0392b","#27ae60","#FF6860","#f39c12","#f1c40f","#e67e22","#2ecc71","#e74c3c","#d35400","#2c3e50"];var u=$("#calendar");var a=u.find("#calendar_header");var f=u.find("#calendar_weekdays");var l=u.find("#calendar_content");b();c();a.find('i[class^="icon-chevron"]').on("click",function(){var e=$(this);var r=function(e){n=e=="next"?n+1:n-1;if(n<1){n=12;t--}else if(n>12){n=1;t++}c()};if(e.attr("class").indexOf("left")!=-1){r("previous")}else{r("next")}})})
</script>


{{--    <div class="row pc-hide phone-hide" style="height: 350px">--}}
{{--        <div class="col-sm-6" style="background-color:#d6bf64;"></div>--}}
{{--        <div class="col-sm-6" style="background-color:white;border-right: solid 1px #dedede"></div>--}}
{{--        <div class="col-sm-6" style="background-color:white;border-right: solid 1px #dedede"></div>--}}
{{--        <div class="col-sm-6" style="background-color:white;"></div>--}}
{{--    </div>--}}



<div class="container-fluid col-12" id="hidden" style="height: 150px;margin: 15% 0 0 0;background-color: {{$dataCss->bg_linkout}}">
    <h4 style="text-align: center">ลิงค์ภายนอกเว็บไซต์</h4>
    <div class="owl-carousel">
        @foreach($linkouts as $linkout)
            <div class="item">
                <a href="{{$linkout->linkout}}" title="{{$linkout->name}}" >
                    <img class="img-fluid mx-auto d-block" style="height: 56px;width: 195px;" src="{{url('/')}}/upload/linkout/{{$linkout->file_name}}" alt="{{$linkout->name}}">
                </a>
            </div>
        @endforeach
    </div>
</div>

<script src="{{ asset('assets/owlcarousel/owl.carousel.min.js') }}"></script>
<script>
    var $owl = $('.owl-carousel');

    $owl.children().each( function( index ) {
        $(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
    });

    $owl.owlCarousel({
        loop: true,
        items: 5,
        nav:true,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
    });

    $(document).on('click', '.owl-item>div', function() {
        // see https://owlcarousel2.github.io/OwlCarousel2/docs/api-events.html#to-owl-carousel
        var $speed = 300;  // in ms
        $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
    });
</script>


{{--<div class="container-fluid" id="hidden" style="height: 200px;margin: 15% 0 0 0;background-color: {{$dataCss->bg_linkout}}">--}}
{{--    <div class="container-fluid">--}}
{{--        <h2>ลิงค์ภายนอกเว็บไซต์</h2>--}}
{{--        @php--}}
{{--            $i = 1;--}}
{{--        @endphp--}}

{{--        <div id="carouselExample2" class="carousel slide" data-ride="carousel" data-interval="9000" style="margin: 0 auto;">--}}
{{--            <div class="carousel-inner row w-100 mx-auto" role="listbox">--}}
{{--                @foreach($linkouts as $linkout)--}}
{{--                    <div class="carousel-item col-md-3 @if ($loop->first) active @endif">--}}
{{--                        <div class="panel panel-default">--}}
{{--                            <div class="panel-thumbnail">--}}
{{--                                <a href="//{{$linkout->linkout}}" title="{{$linkout->name}}" target="_blank" >--}}
{{--                                    <img class="img-fluid" style="height: 56px;width: 430px;" src="{{url('/')}}/upload/linkout/{{$linkout->file_name}}" alt="slide 2">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <a class="carousel-control-prev" href="#carouselExample2" role="button" data-slide="prev" style="margin-left: -10%">--}}
{{--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Previous</span>--}}
{{--            </a>--}}
{{--            <a class="carousel-control-next text-faded" href="#carouselExample2" role="button" data-slide="next" style="margin-right: -10%">--}}
{{--                <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Next</span>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--            <div class="row">--}}
{{--                <div class="MultiCarousel2" data-items="1,3,5,6" data-slide="1" id="MultiCarousel2"  data-interval="1000">--}}
{{--                    <div class="MultiCarousel2-inner">--}}
{{--                        @foreach($linkouts as $linkout)--}}
{{--                            <div class="item zoom">--}}
{{--                                <a href="{{$linkout->linkout}}" title="{{$linkout->name}}" >--}}
{{--                                    <img class="img-fluid mx-auto d-block" style="height: 56px;width: 195px;border-radius: 50px" src="{{url('/')}}/upload/linkout/{{$linkout->file_name}}" alt="{{$linkout->name}}">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                    <button class="btn btn-dark leftLst2"><</button>--}}
{{--                    <button class="btn btn-dark rightLst2">></button>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--    </div>--}}

{{--</div>--}}

<div class="container-fluid" id="hidden" style="height: 500px;margin-top:0%;background-color: {{$dataCss->bg_service}}">

    <h4 style="text-align: center">สื่อประชาสัมพันธ์และให้บริการประชาชน</h4>

    <div class="row">
        <div class="col-4" style="padding-left: 50px">
            @if(!empty($finances))

                <img class="" style="width: 275px;" src="{{url('/')}}/upload/servicebanner/tax.png" alt="กองคลัง">
                @foreach($finances as $finance)
                    <a href="document/division1/{{$finance->id}}" title="" ><p style="padding-left: 70px">{{$finance->name}}</p> </a>
                @endforeach
            @endif
        </div>
        <div class="col-4">
            @if(!empty($engineers))
                <img class="" style="width: 275px;" src="{{url('/')}}/upload/servicebanner/build.png" alt="กองช่าง">

                @foreach($engineers as $engineer)
                    <a href="document/division2/{{$engineer->id}}" title="" ><p style="padding-left: 70px">{{$engineer->name}}</p> </a>
                @endforeach
            @endif
        </div>
        <div class="col-4">
            @if(!empty($munipacitys))
                <img class="" style="width: 275px;" src="{{url('/')}}/upload/servicebanner/general.png" alt="สำนักปลัดเทศบาล">
                @foreach($munipacitys as $munipacity)
                    <a href="document/division3/{{$munipacity->id}}" title=""><p style="padding-left: 70px">{{$munipacity->name}}</p></a>
                @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-4" style="padding-left: 50px">
            @if(!empty($socailwelfares))
                <img class="" style="width: 275px;" src="{{url('/')}}/upload/servicebanner/soc-welfare2.png" alt="กองสวัสดิการสังคม">
                @foreach($socailwelfares as $socailwelfare)
                    <a href="document/division4/{{$socailwelfare->id}}" title=""> <p style="padding-left: 70px">{{$socailwelfare->name}}</p></a>
                @endforeach
            @endif
        </div>
        <div class="col-4">
            <img class="" style="width: 275px;" src="{{url('/')}}/upload/servicebanner/edu.png" alt="กองการศึกษา">
            @foreach($edications as $education)
                <a href="document/division5/{{$education->id}}" title=""><p p style="padding-left: 70px">{{$education->name}}</p>
            @endforeach
        </div>
        <div class="col-4">
            <img class="" style="width: 275px;" src="{{url('/')}}/upload/servicebanner/health-icon.png" alt="กองสาธารณะสุข">
            @foreach($healthcares as $healthcare)
                <a href="document/division6/{{$healthcare->id}}" title=""> <p style="padding-left: 70px">{{$healthcare->name}}</p></a>
            @endforeach
        </div>

    </div>



    {{--script news tab--}}

    <div id="youtube-player">
        <div class="modal" id="modal-youtube" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: transparent;border:0;">
                    <div class="modal-body p-0" id="iframe-show-modal">
                    </div>
                    <div class="modal-footer p-0" style="border:0;">
                        <button type="button" class="btn btn-danger" id="modal-close-youtube" data-dismiss="modal">ปิด
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var $Youtube = $('.youtube-yeah'), $ModalYoutube = $('#modal-youtube'),
                $ModalClose = $('#modal-close-youtube'), $IframeShow = $('#iframe-show-modal'), $Iframe;
            $Youtube.click(function () {
                $ModalYoutube.modal({backdrop: 'static', keyboard: false});
                $Iframe = $('<iframe>', {
                    src: $(this).attr('data-href'),
                    id: 'myFrame',
                    frameborder: 0,
                    scrolling: 'no',
                    height: '450',
                    width: '100%'
                })
                $IframeShow.append($Iframe);
            });
            $ModalClose.click(function () {
                $IframeShow.find('#myFrame').remove();
            });
            $ModalYoutube.on('shown.bs.modal', function () {
                console.clear()
            });
            $ModalYoutube.on('hidden.bs.modal', function () {
                console.clear()
            });
        </script>


        <div id="ss_menu" style="z-index: 100">
            <div>
                <i class="fab fa-line ss_animate" data-toggle="modal" data-target="#exampleModal"></i>
            </div>
            <div>
                <i class="fa fa-facebook ss_animate" data-toggle="modal" data-target="#exampleModal2"></i>
            </div>
            <div>
                <i class="fab fa-youtube ss_animate"></i>
            </div>
            <div>
                <i class="fab fa-instagram"></i>
            </div>
            <div class="menu">
                <div class="share" id="ss_toggle" data-rot="180">
                    <div class="circle"></div>
                    <div class="bar"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal animate__animated animate__fadeInDown" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fab fa-line"></i> Line</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="margin:0 auto">
                    <img src="{{url('/')}}/upload/qrline/qr_line.png">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                    {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal animate__animated animate__fadeInDown" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-facebook"></i> Facebook</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="margin:0 auto">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                    {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#tile-1 .nav-tabs a").click(function() {
            var position = $(this).parent().position();
            var width = $(this).parent().width();
            $("#tile-1 .slider").css({"left":+ position.left,"width":width});
        });
        var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
        var actPosition = $("#tile-1 .nav-tabs .active").position();
        $("#tile-1 .slider").css({"left":+ actPosition.left,"width": actWidth});
    </script>

    <script>
        $("#tile-2 .nav-tabs a").click(function() {
            var position = $(this).parent().position();
            var width = $(this).parent().width();
            $("#tile-2 .slider").css({"left":+ position.left,"width":width});
        });
        var actWidth = $("#tile-2 .nav-tabs").find(".active").parent("li").width();
        var actPosition = $("#tile-2 .nav-tabs .active").position();
        $("#tile-2 .slider").css({"left":+ actPosition.left,"width": actWidth});
    </script>


    <script>
        $(document).ready(function () {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();




            $(window).resize(function () {
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);


                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[3];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    }
                    else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                    }
                    $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }


            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                }
                else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }

        });
    </script>


    <script>
        $(document).ready(function () {
            var itemsMainDiv = ('.MultiCarousel2');
            var itemsDiv = ('.MultiCarousel2-inner');
            var itemWidth = "";

            $('.leftLst2, .rightLst2').click(function () {
                var condition = $(this).hasClass("leftLst2");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();




            $(window).resize(function () {
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel2" + id);


                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[3];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    }
                    else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                    }
                    $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst2").addClass("over");
                    $(".rightLst2").removeClass("over");

                });
            }


            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst2');
                var rightBtn = ('.rightLst2');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                }
                else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }

        });
    </script>

    <script>

        {{--script multiple slide--}}
        $('#carouselExample').on('slide.bs.carousel', function (e) {


            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 6;
            var totalItems = $('.carousel-item').length;

            if (idx >= totalItems-(itemsPerSlide-1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i=0; i<it; i++) {
                    // append slides to end
                    if (e.direction==="left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    }
                    else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });


        $('#carouselExample').carousel({
            interval: 0
        });


        $(document).ready(function() {
            /* show lightbox when clicking a thumbnail */
            $('a.thumb').click(function(event){
                event.preventDefault();
                var content = $('.modal-body');
                content.empty();
                var title = $(this).attr("title");
                $('.modal-title').html(title);
                content.html($(this).html());
                $(".modal-profile").modal({show:true});
            });

        });
    </script>

    <script>

        {{--script multiple slide--}}
        $('#carouselExample2').on('slide.bs.carousel', function (e) {


            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 5;
            var totalItems = $('.carousel-item').length;

            if (idx >= totalItems-(itemsPerSlide-1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i=0; i<it; i++) {
                    // append slides to end
                    if (e.direction==="left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    }
                    else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });


        $('#carouselExample2').carousel({
            interval: 0
        });


        $(document).ready(function() {
            /* show lightbox when clicking a thumbnail */
            $('a.thumb').click(function(event){
                event.preventDefault();
                var content = $('.modal-body');
                content.empty();
                var title = $(this).attr("title");
                $('.modal-title').html(title);
                content.html($(this).html());
                $(".modal-profile").modal({show:true});
            });

        });
    </script>



    {{--    script normal slide--}}
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>

    <script>
        var slideIndex = 1;
        showSlides2(slideIndex);

        function plusSlides2(n) {
            showSlides2(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides2(slideIndex = n);
        }

        function showSlides2(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides2");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>

    <script>
        $(document).ready(function(ev) {
            var toggle = $('#ss_toggle');
            var menu = $('#ss_menu');
            var rot;

            $('#ss_toggle').on('click', function(ev) {
                rot = parseInt($(this).data('rot')) - 180;
                menu.css('transform', 'rotate(' + rot + 'deg)');
                menu.css('webkitTransform', 'rotate(' + rot + 'deg)');
                if ((rot / 180) % 2 == 0) {
                    //Moving in
                    toggle.parent().addClass('ss_active');
                    toggle.addClass('close');
                } else {
                    //Moving Out
                    toggle.parent().removeClass('ss_active');
                    toggle.removeClass('close');
                }
                $(this).data('rot', rot);
            });

            menu.on('transitionend webkitTransitionEnd oTransitionEnd', function() {
                if ((rot / 180) % 2 == 0) {
                    $('#ss_menu div i').addClass('ss_animate');
                } else {
                    $('#ss_menu div i').removeClass('ss_animate');
                }
            });

        });
    </script>


{{--    <style>--}}


{{--        .footer {--}}
{{--            height: 150px;--}}
{{--            margin-top:10%;--}}
{{--        }--}}

{{--        main {--}}
{{--            flex: 1 0 auto;--}}
{{--        }--}}
{{--        .center {--}}
{{--            margin: auto;--}}
{{--            width: 50%;--}}
{{--        }--}}
{{--    </style>--}}
{{--    </head>--}}
{{--    <body>--}}
{{--    <div class="footer">--}}
{{--        <p></p>--}}

{{--        <div class="center">--}}

{{--            @foreach($logos->slice(0,1) as $logo)--}}
{{--                @if($logo->status == 1)--}}
{{--                    <img style="height: auto;width: 150px;float: left;" src="{{url('/')}}/upload/logo/{{$logo->file_name}}">--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--            <br>--}}
{{--            <div style="float: right;">--}}
{{--                <b style="font-size: 1.5rem;text-align: center">{{$dataCss->layout_footer}}</b> <br>--}}
{{--                <b style="font-size: 1.0rem">{{$dataCss->layout_footer_add}}</b><br>--}}
{{--                <b style="font-size: 1.0rem">{{$dataCss->layout_footer_tel}}</b>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <br>--}}
{{--    </div>--}}

{{--    <table style="margin-top: 5%">--}}
{{--        <tr>--}}
{{--            <td>ไอพี ของคุณ </td>--}}
{{--            <td><div align="center">{{$_SERVER['REMOTE_ADDR']}}</div></td>--}}
{{--        </tr>--}}
{{--    </table>--}}



{{--    </body>--}}
{{--</html>--}}

@endsection
@endsection
