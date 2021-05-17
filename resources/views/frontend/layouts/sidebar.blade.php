@php
    $css = getCss();
    //dd($css);


@endphp
<style>
    body {
        /*height: vh;*/
    }

    {{--    --}}{{--#web-logo {--}}
{{--    --}}{{--    width: 100%;--}}
{{--    --}}{{--    float: left;--}}
{{--    --}}{{--    height: 90px;--}}
{{--    --}}{{--    background-color: #ffffff;--}}
{{--    --}}{{--    background-image: url({{url('upload/img/logo-header.jpg')}});--}}
{{--    --}}{{--    background-repeat: no-repeat;--}}
{{--    --}}{{--    position: fixed;--}}
{{--    --}}{{--    top: 0;--}}
{{--    --}}{{--    z-index: 10;--}}
{{--    --}}{{--}--}}

{{--    /*#web-nav {*/--}}
{{--    /*    top: 90px;*/--}}
{{--    /*    background-color: #66478E;*/--}}
{{--    /*}*/--}}

    #web-header {
        margin-top: 130px;
        height: 10vh;
        background-image: url({{url('')}});
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    li {
        list-style: none;
    }

    #social-logo {
        width: 100%;
        float: right;
        margin-left: 10%;
        height: 90px;
        background-color: #ffffff;
        background-repeat: no-repeat;
        position: fixed;
        top: 0;
        z-index: 10;
    }

    /*#web-marquee {*/
    /*    background-color: #66478E;*/
    /*    color: #ffffff;*/
    /*}*/

    .goog-te-banner-frame {
        top: 160px;
        z-index: 1;
    }

    #content {
    }

    /*hamburger menu*/
    .menu-wrapper {
        cursor: pointer;
        transition: all .3s ease-out;
    }

    .menu-btn, .menu-btn:before, .menu-btn:after {
        height: 7px;
        width: 34px;
        background-color: #fff;
        margin: 0 0 0 12px;
        border-radius: 3px;
        -webkit-transition: all 0.5s ease;
    }

    .menu-btn:before, .menu-btn:after {
        content: " ";
        position: absolute;
        margin-top: -10px;
        margin-left: 0;
        -webkit-transform: rotateZ(0deg);
        -webkit-transform-origin: 3px 3px;
    }

    .menu-btn:after {
        margin-top: 10px;
    }

    .menu-btn-on {
        background-color: transparent;
    }

    .menu-btn-on.menu-btn:before {
        -webkit-transform: rotateZ(45deg);
        background-color: #ff0000;
    }

    .menu-btn-on.menu-btn:after {
        -webkit-transform: rotateZ(-45deg);
        background-color: #ff0000;
    }

    .menu-wrapper-on {
        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0) inset;
    }

    @media (min-width: 992px) {
        #web-header {
            margin-top: 90px;
        }
    }

    @media (max-width: 992px) {
        #web-nav .menu-web .list-items > li > ul {
            position: relative !important;
            width: 100% !important;
            top: 0 !important;
            left: 0 !important;
        }

        .menu-web.show-menu {
            top: 40px !important;
            height: 50vh !important;
            width: 100% !important;
        }
    }

    @media screen and (max-width: 600px) {
        #title_message {
            visibility: hidden;
            clear: both;
            float: left;
            margin: 10px auto 5px 20px;
            width: 28%;
            display: none;
        }
    }

    .menu-web.show-menu {
        position: absolute;
        top: 60px;
        overflow-x: auto;
        height: 70vh;
        width: 100%;
    }

    #web-nav .menu-web.show-menu .list-items {
        display: block;
        width: 300px;
    }

    #web-nav .menu-web .list-items {
        display: none;
    }

    #web-nav .menu-web .list-items > li {
        border-bottom: 1px rgba(166, 139, 200, 0.45) solid;
    }

    #web-nav .menu-web .list-items > li:hover {
        background-color: {{$css->web_nav_bgcol}};
    }

    #web-nav .menu-web .list-items > li.active {
        background-color: {{$css->web_nav_bgcol}};
    }

    #web-nav .menu-web .list-items > li > a {
        /*color: white;*/
    }

    #web-nav .menu-web .list-items > li > ul {
        position: absolute;
        left: 300px;
        width: 100%;
        top: 0;
    }

    #web-nav .menu-web .list-items .hasSubmenu {
        position: relative;
    }

    #web-nav .menu-web .list-items .hasSubmenu > a::after {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        content: "\f105";
        float: right;
    }

    #web-nav .menu-web .list-items .hasSubmenu > ul {
        display: none;
    }

    #web-nav .menu-web .list-items .hasSubmenu:hover > ul {
        display: block;
    }

    @media only screen and (max-width: 768px) {
        .phone-hide {
            display: none;
        }

        .phone-show {
            display: block;
        }

        .pc-show {
            display: block;
        }

        .pc-hide {
            display: none;
        }

    }

    @media (max-width: 767px) {
        #hidden {
            display: none;
        }
    }

    @media all and (min-width: 992px) {
        .navbar {
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar .has-megamenu {
            position: static !important;
        }

        .navbar .megamenu {
            left: -50px;
            right: 0;
            width: 900px;
            padding: 10px;
            border-top: 5px solid{{$css->web_nav_bgcol}};
            border-bottom: 10px solid{{$css->web_nav_bgcol}};
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .navbar .nav-link {
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
        }
    }


    /*hamburger menu*/
</style>
<div class="container-fluid" style="padding: 0px">
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v8.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="{{$css->fbchat_code}}"
         theme_color="{{$css->web_nav_bgcol}}"
         logged_in_greeting="สอบถามสินค้าและบริการ 053-441700 / 086-4314547 Line : itglobal"
         logged_out_greeting="สอบถามสินค้าและบริการ 053-441700 / 086-4314547 Line : itglobal">
    </div>
    <div class="row">
        <div class="col">
            {{--            <a href="{{url('/')}}"> <div class="col" id="web-logo" style="float: left;"></div></a>--}}
            <div class="col" id="web-logo" style="float: left;"></div>
        </div>
        <div class="row" id="hidden" style="z-index: 25;margin-top: 60px;">
            {{--            <nav class="navbar navbar-expand-sm" style="width: 768px;">--}}
            {{--                <!-- Brand -->--}}

            {{--                <!-- Links -->--}}
            {{--                <ul class="navbar-nav">--}}
            {{--                    @foreach(getAllMenu('menus_top') as $key => $value)--}}

            {{--                        <li class="nav-item {{count($value->sub) != 0 ? 'hasSubmenu':''}}">--}}

            {{--                        @if(count($value->sub) == 0)--}}

            {{--                            <li class="nav-item" style="border-radius: 25px" onMouseOver="this.style.backgroundColor='{{$css->web_nav_bgcol}}'"  onMouseOut="this.style.backgroundColor=''">--}}
            {{--                                <a class="nav-link" target="{{$value->target == 1 ? '_blank ': '_self'}}"--}}
            {{--                                   href="{{count($value->sub) != 0 ? 'javascript:;': url($value->url)}}">{{$value->name}}</a>--}}
            {{--                            </li>--}}




            {{--                        @elseif(count($value->sub) != 0)--}}
            {{--                            <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" target="{{$value->target == 1 ? '_blank ': '_self'}}" style="border-radius: 25px" onMouseOver="this.style.backgroundColor='{{$css->web_nav_bgcol}}'"  onMouseOut="this.style.backgroundColor=''"--}}
            {{--                               href="{{count($value->sub) != 0 ? 'javascript:;': url($value->url)}}">{{$value->name}}</a>--}}

            {{--                            <ul class="nav-item dropdown">--}}
            {{--                                <div class="dropdown-menu">--}}
            {{--                                    @foreach($value->sub as $index => $item)--}}
            {{--                                        <a class="dropdown-item" target="{{$item->target}}"--}}
            {{--                                           href=" {{url($item->url)}}">{{$item->name}}</a>--}}
            {{--                                    @endforeach--}}
            {{--                                </div>--}}

            {{--                            </ul>--}}
            {{--                            @endif--}}
            {{--                            </li>--}}
            {{--                            @endforeach--}}
            {{--                </ul>--}}
            {{--            </nav>--}}


            <nav class="navbar navbar-expand-lg navbar-light bg-darker hidden" style="width: 780px;margin-top: 5%">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav" style="position: fixed">

                    <ul class="navbar-nav">
                        {{--                        <li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li>--}}
                        {{--                        <li class="nav-item"><a class="nav-link" href="#"> About </a></li>--}}
                        {{--                        <li class="nav-item"><a class="nav-link" href="#"> Services </a></li>--}}
                        @foreach(getAllMenu('menus_top') as $key => $value)
                            @if(count($value->sub) == 0)
                                <li class="nav-item {{count($value->sub) != 0 ? 'has-megamenu':''}}"
                                    style="border-radius: 25px;font-size: 1rem;"
                                    onMouseOver="this.style.backgroundColor='{{$css->web_nav_bgcol}}'"
                                    onMouseOut="this.style.backgroundColor=''">
                                    <a class="nav-link"
                                       style="font-weight: 700; target="{{$value->target == 1 ? '_blank ': '_self'}}"
                                    href="{{count($value->sub) != 0 ? 'javascript:;': url($value->url)}}
                                    ">{{$value->name}} </a>
                                </li>
                            @elseif(count($value->sub) != 0)
                                <li class="nav-item {{count($value->sub) != 0 ? 'has-megamenu':''}}"
                                    style="border-radius: 25px;font-size: 1rem;"
                                    onMouseOver="this.style.backgroundColor='{{$css->web_nav_bgcol}}'"
                                    onMouseOut="this.style.backgroundColor=''">
                                    <a class="nav-link" href="#" style="font-weight: 700" data-toggle="dropdown"
                                       target="{{$value->target == 1 ? '_blank ': '_self'}}"
                                       href="{{count($value->sub) != 0 ? 'javascript:;': url($value->url)}}">{{$value->name}} </a>
                                    <div class="dropdown-menu megamenu" role="menu">
                                        <div class="row">
                                            @foreach($value->sub as $index => $item)
                                                <div class="col-md-3">
                                                    <div class="col-megamenu">
                                                        <a class="nav-link" style="font-size: 1rem;font-weight: bolder"
                                                           target="{{$item->target == 1 ? '_blank ': '_self'}}"
                                                           href="{{count($item->sub) != 0 ? 'javascript:;': url($item->url)}}">{{$item->name}}</a>
                                                        @if(count($item->sub) != 0)
                                                            <ul class="list-unstyled">
                                                                @foreach($item->sub as $k => $v)
                                                                    <li style="margin-left: 5px;font-size: 14px"><a
                                                                                href="{{url($v->url)}}">
                                                                            - {{$v->name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif

                                                    </div>  <!-- col-megamenu.// -->
                                                </div><!-- end col-3 -->
                                            @endforeach
                                        </div><!-- end row -->
                                    </div> <!-- dropdown-mega-menu.// -->
                                    @endif
                                    @endforeach

                                </li>
                    </ul>


                </div> <!-- navbar-collapse.// -->

            </nav>

            <script type="text/javascript">
                /// some script

                // jquery ready start
                $(document).ready(function () {
                    // jQuery code

                    //////////////////////// Prevent closing from click inside dropdown
                    $(document).on('click', '.dropdown-menu', function (e) {
                        e.stopPropagation();
                    });


                }); // jquery end
            </script>

            <!-- Dropdown -->


        </div>
        <div class="col" id="title_message" style="background-color: transparent;margin-right: 10%">
            <div id="social-logo" class="row" style="float: right;margin-top: 2%;">
                <ul class="top-level row" align="center" style="list-style-type: none">
                    <li>
                        <a class="a-top" href="{{url('/')}}/roundcube/" target="_blank">
                            <img src="{{url('/')}}/upload/icon/icon-email.png" alt="E-mail" width="32" height="32">
                        </a>
                    </li>
                    <li>
                        <a class="a-top" href="https://www.facebook.com/Muangkaen/"
                           target="_blank">
                            <img src="{{url('/')}}/upload/icon/icon-facebook.png" alt="Facebook" width="32"
                                 height="32">
                        </a>
                    </li>
                    <li>
                        <a class="a-top" href="#"
                           target="_blank">
                            <img src="{{url('/')}}/upload/icon/icon-line.png" alt="Line" width="32"
                                 height="32">
                        </a>
                    </li>
                    <li>
                        <a class="a-top" href="https://www.youtube.com/channel/UClixjOsUNRfLORDLt7gEz4Q"
                           target="_blank">
                            <img src="{{url('/')}}/upload/icon/icon-youtube.png" alt="Youtube" width="32" height="32">
                        </a>
                    </li>
                <!--   <li>
                    <a class="a-top" href="search">
                        <img src="{{url('/')}}/upload/icon/icon-email.png" width="32" height="32">
                    </a>
                </li>
                -->
                    <li>
                        <a class="a-top" href="{{url('/')}}/wms"
                           target="_blank">
                            <img src="{{url('/')}}/upload/icon/icon-setting.png" alt="WMS" width="32"
                                 height="32">
                        </a>
                    </li>
                    <li>
                        <a class="a-top" href="http://egp.itglobal.co.th/manage"
                           target="_blank">
                            <img src="{{url('/')}}/upload/icon/icon-hammer.png" alt="EGP" width="32"
                                 height="32">
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <nav id="web-nav" class="navbar navbar-expand-lg navbar-dark fixed-top"
         style="width: 100%;z-index: 10;margin-top: 1%">
        <div class="navbar-collapse" id="navbarSupportedContent">
            <div class="menu-wrapper py-2 py-lg-1">
                <p class="menu-btn"></p>
            </div>
            <ul class="navbar-nav mr-2 menu-wrapper d-none d-lg-block" id="hiddenpc">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:;">เมนู<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="menu-web">
                <ul class="nav list-items">
                    @foreach(getAllMenu('menus_top') as $key => $value)
                        <li class="nav-item {{count($value->sub) != 0 ? 'hasSubmenu':''}}">
                            <a class="nav-link" target="{{$value->target == 1 ? '_blank ': '_self'}}"
                               href="{{count($value->sub) != 0 ? 'javascript:;': url($value->url)}}">{{$value->name}}</a>
                            @if(count($value->sub) != 0)
                                <ul class="nav list-items">
                                    @foreach($value->sub as $index => $item)
                                        <li class="nav-item {{count($item->sub) != 0 ? 'hasSubmenu':''}}">
                                            <a class="nav-link" target="{{$item->target == 1 ? '_blank ': '_self'}}"
                                               href="{{count($item->sub) != 0 ? 'javascript:;': url($item->url)}}">{{$item->name}}</a>
                                            @if(count($item->sub) != 0)
                                                <ul class="nav list-items">
                                                    @foreach($item->sub as $k => $v)
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                               target="{{$v->target == 1 ? '_blank ': '_self'}}"
                                                               href="{{url($v->url)}}">{{$v->name}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- Search --}}
            <form class="form-inline my-2 my-lg-0 mr-auto d-none d-lg-block">
                {{--            <div class="input-group">--}}
                {{--                <div class="input-group-prepend">--}}
                {{--                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>--}}
                {{--                </div>--}}
                {{--                <input type="text" class="form-control">--}}
                {{--            </div>--}}
            </form>
            {{-- Search --}}
            {{--google translate--}}
            <form class="form-inline my-2 my-lg-0 d-none d-lg-block">
                <div id="google_translate_element"></div>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'th',
                            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                            includedLanguages: "zh-CN,en,ja,ko,tl,vi,ms,my,km,id,lo,th"
                        }, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript"
                        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </form>
            {{--google translate--}}
        </div>
    </nav>
    <div id="web-header" style="margin-top: 0px"></div>
    <div id="web-marquee">
        <div class="row" id="web-maquee" style="width: 100%;margin-left: auto; margin-right: auto;white-space: nowrap;">
            <div class="col-2 pl-1 pr-1" style="background-color: grey;border-radius: 10px 0 0 10px;">
                <h5 class="text-light pt-3">
                    ประกาศ :
                </h5>
            </div>
            <div class="col-10 pl-1 pr-1" style="border-radius: 0 10px 10px 0;">
                <div class="update-right" style="font-size: 1.11rem">
                    <marquee class="pt-3" behavior="scroll" width="100%" height="100%" scrollamount="1" scrolldelay="15"
                             loop="-1"
                             truespeed="truespeed" onmouseover="this.stop()" onmouseout="this.start()">
                        @foreach(getDataCss() as $key => $dataCss)
                            <b> {{$dataCss->marquee_text}} </b>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.menu-wrapper').on('click', function () {
            $('.menu-btn').toggleClass('menu-btn-on');
            $('.menu-web').toggleClass('show-menu');
        });
        $(document).click()(e => {
            const $menu = $('.menu-web .list-items');
            if (!$menu.is(e.target) && $menu.has(e.target).length === 0) {
                $('.menu-btn').removeClass('menu-btn-on');
                $('.menu-web').removeClass('show-menu');
            }
        });
    </script>
<?php ?>
