<html>
<style>


    .footer {
        height: 250px;
    }

    main {
        flex: 1 0 auto;
    }

    .centerlogofoot {
        line-height: 250px;
        height: 250px;
        text-align: center;
    }

    .centerlogofoot p {
        line-height: 1.5;
        display: inline-block;
        vertical-align: middle;
    }



    .centercopyr {
        line-height: 40px;
        height: 40px;
        text-align: center;
    }

    .centercopyr p {
        line-height: 2.5;
        display: inline-block;
        vertical-align: middle;
    }
    .sidebar {
        height: 100%;
        width: 0%;
        position: fixed;
        z-index: 2000;
        top: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.5);
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;

    }

    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .openbtn {
        font-size: 14px;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        background-color: #444;
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {padding-top: 15px;}
        .sidebar a {font-size: 18px;}
    }
</style>
<head>
</head>
<body>
<div class="footer">

    <?php
    $logos = DB::connection('db2')
        ->table('tb_logo')
        ->join('uploads','tb_logo.id','=','uploads.master_id')
        ->select('uploads.*','tb_logo.*')
        ->where('table_name', '=' , 'tb_logo')
        ->get();

    $dataCss = DB::connection('db2')->table('settings')->get()->first();
    ?>
    <div class="container-fluid" id="title_message">
        <!-- Control the column width, and how they should appear on different devices -->
        <div class="row">
            <div class="col-sm-4 centerlogofoot" style="height: 250px;background-color: {{$dataCss->layout_footer_col}};">


                @foreach($logos->slice(0,1) as $logo)
                    @if($logo->status == 1)
                        <a href="#" ><img style="width: 90%;margin-left: 5%;margin-right: 5%;" src="{{url('/')}}/upload/logo/{{$logo->file_name}}"></a>
                    @endif
                @endforeach
            </div>
            <div class="col-sm-4 centerlogofoot" style="height: 250px;background-color: {{$dataCss->layout_footer_col}};">
                <p style="font-size: 2rem">{{$dataCss->layout_footer_add}}
                    <br>
                    <a class="a-top" href="https://www.facebook.com/"
                       target="_blank">
                        <img src="{{url('/')}}/upload/icon/icon-facebook.png" alt="Facebook" width="32"
                             height="32">
                    </a>
                    <a class="a-top" href="https://www.youtube.com/channel/" target="_blank">
                        <img src="{{url('/')}}/upload/icon/icon-youtube.png" alt="Youtube" width="32" height="32">
                    </a>
                    <a class="a-top" href="https://www.instagram.com/" target="_blank">
                        <img src="{{url('/')}}/upload/icon/icon-ig.png" alt="Instagram" width="32" height="32">
                    </a>
                    <a class="a-top" href="https://twitter.com/" target="_blank">
                        <img src="{{url('/')}}/upload/icon/icon-twitter.png" alt="Twitter" width="32" height="32">
                    </a>

                    <br>
                    <b style="font-size: 0.8rem;"> <a style="color:black " href="{{url('/')}}"> หน้าแรก </a> </b>
                </p>
            </div>
            <div class="col-sm-4 centerlogofoot" style="height: 250px;background-color: {{$dataCss->layout_footer_col}};">
                <p style="font-size: 2rem"> ติดต่อเรา <br>
                    <b style="font-size: 1rem">{{$dataCss->layout_footer_tel}}</b>
{{--                    <img src="{{url('/')}}/upload/qrline/qr_line.png" alt="Twitter" width="180" height="200">--}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 centercopyr" style="height: 40px;background-color:#ffe3a5;">
                <p>  <a href="#">นโยบายของเว็บไซต์</a> | <a href="#">นโยบายรักษาความมั่งคงปลอดภัย</a> | <a href="#"> นโยบายคุ้มครองข้อมูลส่วนบุคคล </a> </p>
            </div>
        </div>
        @php
            $webURL = url('/');
           $parse = parse_url($webURL);
           $parseURL = $parse['host'];   //check url parse http and www
        @endphp
        <div class="row">
            <div class="col-sm-12 centercopyr" style="height: 50px;background-color: black;">

                <p style="color: #ffac00">  Copyright 2020 <a style="color: white" href="{{url('/')}}">{{ucwords($parseURL)}}</a> All rights reserved Powered by <a style="color: white" href="https://itglobal.co.th/" target="_blank">Itglobal Corporation.</a> &nbsp; &nbsp; &nbsp; &nbsp;<button style="height: 50px" class="openbtn" onclick="openNav()"><i style="color: white" class="fa fa-cog" aria-hidden="true"></i>ระบบหลังบ้าน(sidebar)</button><a href="wms" style="color: white" target="_blank"><i style="color: white" class="fa fa-cog" aria-hidden="true"></i>ระบบหลังบ้าน(WMS)</a>  IP: {{$_SERVER['REMOTE_ADDR']}}</p>
                <div id="mySidebar" class="sidebar">
                    <a style="color: white" href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                    <iframe src="http://web1.com/wms" style="width: 100%;height: 100%;"></iframe>
                </div>


                {{--                <div id="main">--}}
                {{--                    <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>--}}
                {{--                    <h2>Collapsed Sidebar</h2>--}}
                {{--                    <p>Click on the hamburger menu/bar icon to open the sidebar, and push this content to the right.</p>--}}
                {{--                </div>--}}


                <script>
                    function openNav() {
                        document.getElementById("mySidebar").style.width = "100%";
                        document.getElementById("main").style.marginLeft = "250px";
                    }

                    function closeNav() {
                        document.getElementById("mySidebar").style.width = "0";
                        document.getElementById("main").style.marginLeft= "0";
                    }
                </script>
            </div>
        </div>
    </div>
</div>


{{--    <div>--}}

{{--    <?php--}}
{{--        $logos = DB::connection('db2')--}}
{{--            ->table('tb_logo')--}}
{{--            ->join('uploads','tb_logo.id','=','uploads.master_id')--}}
{{--            ->select('uploads.*','tb_logo.*')--}}
{{--            ->where('table_name', '=' , 'tb_logo')--}}
{{--            ->get();--}}

{{--        $dataCss = DB::connection('db2')->table('settings')->get()->first();--}}
{{--        ?>--}}

{{--        @foreach($logos->slice(0,1) as $logo)--}}
{{--            @if($logo->status == 1)--}}
{{--              <a href="#" ><img class="center" src="{{url('/')}}/upload/logo/{{$logo->file_name}}"></a>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--        <br>--}}
{{--        <div style="float: right;">--}}
{{--            <b style="font-size: 1.5rem;text-align: center">{{$dataCss->layout_footer}}</b> <br>--}}
{{--            <b style="font-size: 1.0rem">{{$dataCss->layout_footer_add}}</b><br>--}}
{{--            <b style="font-size: 1.0rem">{{$dataCss->layout_footer_tel}}</b>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

{{--<table style="margin-top: 5%">--}}
{{--    <tr>--}}
{{--        <td>ไอพี ของคุณ </td>--}}
{{--        <td><div align="center">{{$_SERVER['REMOTE_ADDR']}}</div></td>--}}
{{--    </tr>--}}
{{--</table>--}}



</body>
</html>
