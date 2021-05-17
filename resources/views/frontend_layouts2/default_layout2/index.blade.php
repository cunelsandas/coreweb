@extends('frontend_layouts2.default_layout2.layout.app')
@section('content')
    <div>
        <section id="content">
            <div><br>
                <div class="banner_top_content"></div>
                <br>
                <div id="content_slideshow">


                </div>
                <div class="content_box">
                    <div class="content_title_banner"> img banner</div>
                    <div class="content_subject_only">
                        @foreach($news as $new)
                            @if($new->status == 1)
                                <a href="catalog/news/{{$new->id}}">
                                    <div class="col-12"
                                         style="border-right: solid 1px #dedede;border-left: solid 1px #dedede;line-height: 15px;">
                                        <a href="catalog/news/{{$new->id}}">
                                            <p style="text-decoration: none;color: black">{{$new->name}}</p>
                                        </a>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                        <div class="row mt-1">
                            <div class="col-lg-12 text-right">
                                <a href="catalog/news"> <img id="logo-header"
                                                             src="{{url('/')}}/upload/bg/getall.png"
                                                             height="40px;"></a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="content_box">
                    <div class="content_title_banner"> img banner</div>
                    <div class="content_image_and_subject">
                        <div class="row" style="width:95%;margin:0 auto;">
                            @foreach($activitys->slice(0,6) as $activity)
                                <div class="col-xl-4 col-md-4 col-sm-12">
                                    <div class="content_image_card" style="height: auto;margin-top: 2%">
                                        <a href="{{url('/')}}/catalog/activity/{{$activity->id}}"><img
                                                    class="img-fluid mx-auto d-block"
                                                    src="{{url('/')}}/upload/activity/{{$activity->file_name}}"
                                                    alt="{{$activity->tag}}">
                                            <div class="content_subject_card">{{$activity->name}}</div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-12 text-right">
                                <a href="catalog/activity"> <img id="logo-header"
                                                                 src="{{url('/')}}/upload/bg/getall.png"
                                                                 height="40px;"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content_box">
                    <div class="content_title_banner"> img banner</div>
                    <div class="content_purchase">
                        <div class="col-lg-12 col-xl-12 col-12 nav-pill-main-div mx-auto">
                            <div class="customize_solution pt-3">
                                <ul class="tabs nav nav-justified">
                                    @foreach($purchase_groups as $index => $ps)
                                        <li class="tab-link {{$index == 0 ? 'current' : ''}} nav-pill mt-2"
                                            href="tab-{{$ps->id}}">
                                            <span class="ease-effect">{{$ps->name}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                @foreach($purchase_groups as $index => $ps)
                                    <div class="tab-content {{$index == 0 ? 'current' : ''}}" id="tab-{{$ps->id}}">
                                        @php
                                            $purchase_tablename = $ps->table_name;
                                            $purchase_type = $ps->type;
                                            $purchase_subject = DB::connection('db2')->table($purchase_tablename)->limit(10)->get();
                                        @endphp
                                        <div>
                                            @foreach($purchase_subject as $index => $psubject)
                                                <a href="purchase/{{$purchase_type}}/{{$psubject->id}}">
                                                    <div class="col-12"
                                                         style="border-right: solid 1px #dedede;border-left: solid 1px #dedede;line-height: 22px;">
                                                        <p style="text-decoration: none;color: black">{{$psubject->name}}</p>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-lg-12 text-right">
                                                <a href="purchase/{{$purchase_type}}"> <img id="logo-header"
                                                                                            src="{{url('/')}}/upload/bg/getall.png"
                                                                                            height="40px;"></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content_box">
                    <div class="content_title_banner"> img banner</div>
                    <div class="content_purchase_egp">
                        @foreach($domains as $wn)

                        @endforeach
                        <div class="card border_primary">
                            <iframe src='http://egp.itglobal.co.th/itg/{{$wn->egp_code}}' width="100%" height="400px"
                                    frameborder="0"></iframe>
                        </div>
                    </div>

                    <div class="content_box">
                        <div class="content_title_banner"> img banner</div>
                        <div class="content_youtube">
                            <div class="row">
                                @php
                                    $data = DB::connection('db2')->table('youtubes')->where('status','1')->get();
                                    $cVideo = count($data) >  2 ? 2 : count($data); @endphp
                                @foreach($data->slice(0,3) as $vdoKey => $vdoVal)
                                    <div class="col-xl-4 col-md-4 col-sm-12">
                                        <a href="https://www.youtube.com/watch?v={{$vdoVal->embed}}">
                                            <iframe height="200" width="100%"
                                                    src="https://www.youtube.com/embed/{{$vdoVal->embed}}"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>

                                            </iframe>
                                            {{--                                            <img width="100%" src="http://i3.ytimg.com/vi/{{$vdoVal->embed}}/0.jpg">--}}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row mt-1" id="hidden">
                                <div class="col-lg-12 text-right">
                                    <a href="youtube"> <img id="logo-header" src="{{url('/')}}/upload/bg/getall.png"
                                                            height="40px;"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content_box hide-on-phone">
                        <div class="banner_bottom_content">
                            <img src="../../upload/title_banner/eservice-title.png" width="100%" height="auto" alt=""/>
                        </div>
                        <div class="content_bottom_banner">
                            <!--			  foreach content bottom banner-->
                            <div class="row">
                                @foreach($eservice as $eservic)
                                    <div class="col-3">
                                        <a href="{{$eservic->link}}" title="{{$eservic->name}}">
                                            <img class="img-fluid mx-auto d-block" style="height: auto"
                                                 src="{{url('/')}}/upload/eservices/{{$eservic->file_name}}"
                                                 alt="{{$eservic->name}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!--			  end foreach-->
                        </div>
                    </div>

                    <div class="content_box hide-on-pc">
                        <div class="banner_bottom_content">
                            <img src="../../upload/title_banner/eservice-title.png" width="100%" height="auto" alt=""/>
                        </div>
                        <div class="content_bottom_banner">
                            <!--			  foreach content bottom banner-->
                            <div class="owl-carousel">
                                @foreach($eservice as $eservic)
                                    <div class="item">
                                        <a href="{{$eservic->link}}" title="{{$eservic->name}}">
                                            <img class="img-fluid mx-auto d-block" style="height: auto;width: 200px"
                                                 src="{{url('/')}}/upload/eservices/{{$eservic->file_name}}"
                                                 alt="{{$eservic->name}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!--			  end foreach-->
                        </div>
                    </div>

                    <div class="content_box hide-on-phone">
                        <div class="banner_bottom_content_linkout">
                            <img src="../../upload/title_banner/linkout-title.png" width="100%" height="auto" alt=""/>
                        </div>
                        <div class="content_bottom_banner_linkout">
                            <!--			  foreach content bottom banner-->
                            <div class="row">
                                @foreach($linkouts as $linkout)
                                    <div class="col-xl-3 col-md-3 col-sm-6" style="margin: 1% auto;">
                                        <a href="{{$linkout->linkout}}" title="{{$linkout->name}}" target="_blank">
                                            <img class="img-fluid mx-auto d-block" style="height: auto"
                                                 src="{{url('/')}}/upload/linkout/{{$linkout->file_name}}"
                                                 alt="{{$linkout->name}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!--			  end foreach-->
                        </div>
                    </div>

                    <div class="content_box hide-on-pc">
                        <div class="banner_bottom_content_linkout">
                            <img src="../../upload/title_banner/linkout-title.png" width="100%" height="auto" alt=""/>
                        </div>
                        <div class="content_bottom_banner">
                            <!--			  foreach content bottom banner-->
                            <div class="row">
                                @foreach($linkouts as $linkout)
                                    <div class="col-6" style="margin: 1% auto;">
                                        <a href="{{$linkout->linkout}}" title="{{$linkout->name}}" target="_blank">
                                            <img class="img-fluid mx-auto d-block" style="height: auto;width: 200px"
                                                 src="{{url('/')}}/upload/linkout/{{$linkout->file_name}}"
                                                 alt="{{$linkout->name}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!--			  end foreach-->
                        </div>
                    </div>

                </div>
                <br>
                <br>
                <br>
                <br>
        </section>
    </div>
    </div>

    {{--    script use both--}}
    <script>
        $('ul.tabs li').click(function () {
            var tab_id = $(this).attr('href');

            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');

            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })
    </script>

    {{--    end use both--}}
    {{--    script for mobile--}}
    <script src="{{ asset('assets/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        var $owl = $('.owl-carousel');

        $owl.children().each(function (index) {
            $(this).attr('data-position', index); // NB: .attr() instead of .data()
        });

        $owl.owlCarousel({
            center: true,
            loop: true,
            items: 3,
        });

        $(document).on('click', '.owl-item>div', function () {
            // see https://owlcarousel2.github.io/OwlCarousel2/docs/api-events.html#to-owl-carousel
            var $speed = 300;  // in ms
            $owl.trigger('to.owl.carousel', [$(this).data('position'), $speed]);
        });
    </script>
    {{--    ennd script for mobile--}}




@endsection
