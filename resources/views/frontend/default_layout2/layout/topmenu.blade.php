{{--    <div id="head_bg"> --}}
{{--        <img src="../../upload/bgtitle/Vj6Kb005eZum32.png" width="100%" height="450" alt=""/> --}}
{{--    </div>--}}
@php
    $css = getCss();
    //dd($css);


@endphp
<style>
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
</style>
<div id="head_bg">
    <div style="height: auto;width: 100%;">
        @php
            $bgtitles = DB::connection('db2')->table('uploads')->where('table_name','=', 'tb_bgtitle')->orderBy('id','desc')->first();
        @endphp
        <img style="height: auto;width: 100%" src="{{url('/')}}/upload/bgtitle/{{$bgtitles->file_name}}">
    </div>
</div>
<div id="marquee">
    <div class="row" id="marquee" style="width: 100%;margin-left: auto; margin-right: auto;white-space: nowrap;">
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
<nav class="navbar navbar-expand-lg navbar-light">
    {{--    <a class="navbar-brand" href="#">Navbar</a>--}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            {{--                        <li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li>--}}
            {{--                        <li class="nav-item"><a class="nav-link" href="#"> About </a></li>--}}
            {{--                        <li class="nav-item"><a class="nav-link" href="#"> Services </a></li>--}}
            @foreach(getAllMenu('menus_top') as $key => $value)
                @if(count($value->sub) == 0)
                    <li class="nav-item {{count($value->sub) != 0 ? 'has-megamenu':''}}"
                        style="border-radius: 25px;font-size: 1rem;"
                        onMouseOver="this.style.backgroundColor=''"
                        onMouseOut="this.style.backgroundColor=''">
                        <a class="nav-link"
                           style="font-weight: 700; target="{{$value->target == 1 ? '_blank ': '_self'}}"
                        href="{{count($value->sub) != 0 ? 'javascript:;': url($value->url)}}
                        ">{{$value->name}} </a>
                    </li>
                @elseif(count($value->sub) != 0)
                    <li class="nav-item {{count($value->sub) != 0 ? 'has-megamenu':''}}"
                        style="border-radius: 25px;font-size: 1rem;"
                        onMouseOver="this.style.backgroundColor=''"
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
        {{--        <form class="form-inline my-2 my-lg-0">--}}
        {{--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
        {{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
        {{--        </form>--}}
    </div>
</nav>



