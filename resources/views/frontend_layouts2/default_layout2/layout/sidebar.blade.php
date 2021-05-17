<div>
    <section id="sidebar"><br>
        <div id="nayok">
            @php
                $slidenayokimg = DB::connection('db2')->table('uploads')->where('table_name','=', 'tb_nayok')->orderBy('id','desc')->first();
            @endphp
            @isset($slidenayokimg)
                <img class="img-fluid mx-auto d-block" style="height: auto;"
                     src="{{url('/')}}/upload/nayok/{{$slidenayokimg->file_name}}"
                     alt="slide 1">
            @endisset
        </div>
        <br>
        <!--				foreach banner_left_top-->
        <div class="container-fluid" id="hidden" style="height:auto;margin: 0 auto;">
            <div class="row">
                @php
                    $banner_upperside_menu_forphp10 = DB::connection('db2')
                       ->table('tb_banner_upperside_menu')
                       ->join('uploads','tb_banner_upperside_menu.id','=','uploads.master_id')
                       ->select('uploads.*','tb_banner_upperside_menu.*')
                       ->where('uploads.table_name','=','tb_banner_upperside_menu')
                       ->get();
                   $banner_upperside_menu_forphp10 = $banner_upperside_menu_forphp10->where('status','=',1)->unique('id')->slice(0,7);
                @endphp
                @foreach($banner_upperside_menu_forphp10 as $bupperphp)
                    <div class="col-8" style="height: auto;margin: 0 auto">
                        <div>
                            <a href="{{$bupperphp->link}}">
                                <img class="img-fluid mx-auto d-block"
                                     style="max-width:100%;height: auto;margin-top:5%;text-decoration: none;"
                                     src="{{url('/')}}/upload/banner_upperside_menu/{{$bupperphp->file_name}}"
                                     alt="{{$bupperphp->name}}">
                            </a>
                            {{--                                <p style="font-size: 0.8rem;font-weight: bolder;text-align: center;background-color: transparent;color: black;">{{$banner_executive_menu->name}}</p></a>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <!--			end	foreach banner_left_top-->
        {{--        <div id="palad"></div>--}}
        <br>
        <!--				foreach banner_menu_group && li-->
        @foreach(getAllMenuFrontend('menus_left') as $key => $value)

            <div class="menudata">
                <div class="banner_menu_group">
                    @if(file_exists(url('').'/upload/menus_left/'.$value->name.'.png'))
                        <img width="100%" src="{{url('')}}/upload/menus_left/{{$value->name}}.png">
                    @else
                        {{$value->name}}
                    @endif
                </div>
                <div>
                    <ul>
                        @foreach($value->sub as $index => $item)
                            <li><a href="/{{$item->url}}">{{$item->name}}</a></li>
                            @foreach($item->sub as $k => $v)
                                <li style="list-style-type: none"><a href="/{{$v->url}}">- {{$v->name}}</a></li>
                            @endforeach
                        @endforeach

                        {{--                        <li><a href="#">TEST1</a></li>--}}
                        {{--                        <li><a href="#">TEST2</a></li>--}}
                        {{--                        <li><a href="#">TEST3</a></li>--}}
                        {{--                        <li><a href="#">TEST4</a></li>--}}
                        {{--                        <li><a href="#">TEST5</a></li>--}}
                    </ul>
                </div>
            </div>
        @endforeach

            <!--			end	foreach banner_menu_group && li-->
        <br>
        <!--				foreach banner_left_bottom-->
        <div class="banner_left_bottom" style="width: 300px !important;">
            <div id="fb-root"></div>

            @php
                $dataCss = DB::connection('db2')
                   ->table('settings')
                   ->first();
            @endphp

            <script async defer crossorigin="anonymous"
                    src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v7.0"></script>
            <div class="fb-page" data-href="https://www.facebook.com/{{$dataCss->fbpage_code}}" data-tabs="timeline"
                 data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true"
                 data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/{{$dataCss->fbpage_code}}" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/{{$dataCss->fbpage_code}}"></a></blockquote>
            </div>

            <div id="fb-root"></div>
            <script>
                window.fbAsyncInit = function() {
                    FB.init({
                        xfbml            : true,
                        version          : 'v8.0'
                    });
                };

                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>


            <!-- Your Chat Plugin code -->
            <div class="fb-customerchat"
                 attribution=setup_tool
                 page_id="{{$dataCss->fbchat_code}}"
                 theme_color=""
                 logged_in_greeting="สอบถามสินค้าและบริการ 053-441700 / 086-4314547 Line : itglobal"
                 logged_out_greeting="สอบถามสินค้าและบริการ 053-441700 / 086-4314547 Line : itglobal">
            </div>
        </div>
        <br>
        <div class="banner_left_bottom"></div>
        <br>
        <div class="banner_left_bottom"></div>
        <br>
        <!--		end	foreach banner_left_bottom-->
    </section>
</div>