
@php
    $css = getCss();
    //dd($css);
@endphp
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
<style>
    body {
        /*สีพื้นหลังเว็บ*/
        background-color: {{$css->bg_col}};
        /*รูปพื้นหลังเว็บ*/
        background-image: url({{url($css->bg_pic)}});
        color: {{$css->font_col}};

        font-family: 'Prompt', sans-serif;
        font-size: 14px;
    }



    #web-logo {
        width: 100%;
        float: left;
        height: {{$css->web_logo_h}}px;
        background-color: #ffffff;
        background-image: url({{url($css->header_bg_img)}});
        background-repeat: no-repeat;
        position: fixed;
        padding: 0;
        top: 0;
        z-index: 10;
    }

    #web-nav {
        top: {{$css->web_nav_h}}px;
        background-color: {{$css->web_nav_bgcol}};
    }

    #web-header {
        margin-top: 130px;
        height: 500px;
        background-image: url({{url($css->header_bg_img)}});

        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    #web-marquee {
        background-color: {{$css->web_m_col}};
        color: {{$css->web_m_fnt_col}};
    }

    /*.goog-te-banner-frame {*/
    /*    top: 146px;*/
    /*    z-index: 3;*/
    /*}*/

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
            margin-top: 145px;
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

    .menu-web.show-menu {
        position: absolute;
        top: 60px;
        overflow-x: auto;
        height: 70vh;
        width: 100%;
    }

    #web-nav .menu-web.show-menu .list-items {
        display: block;
        background-color: {{$css->menu_nav_col}};
        width: 300px;
    }

    #web-nav .menu-web .list-items {
        display: none;
    }

    #web-nav .menu-web .list-items > li {
        border-bottom: 1px rgba(166, 139, 200, 0.45) solid;
    }

    #web-nav .menu-web .list-items > li:hover {
        background-color: {{$css->menu_pnt_col}};
    }

    #web-nav .menu-web .list-items > li.active {
        background-color: {{$css->menu_col}};
    }

    #web-nav .menu-web .list-items > li > a {
        color: {{$css->menu_fnt_col}};
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

    .menu-wrapper {
        background: {{$css->web_nav_bgcol}};
    }


    /*fornt color in menu*/
    a.nav-link {
        color: {{$css->front_menu_col}};   /* สี font menu tab*/
        text-decoration: none;
        background-color:transparent ;
    {{--/*สีแถบเมนู  {{$css->web_nav_bgcol}}*/--}}
}

    body
    {

    }

    .center {
        margin: auto;
        width: 50%;
    }


    @media only screen and (max-width: 1000px) {
        .phone-hide {
            display: none;
        }

        .phone-show {
            display: block;
        }

    }

    @media only screen and (min-width: 1000px) {
        .phone-hide {
            display: none;
        }

        .phone-show {
            display: block;
        }
        .pc-show{
            display: block;
        }
        .pc-hide{
            display: none;
        }

    }
    .grow:hover
    {
        -webkit-transform: scale(1.3);
        -ms-transform: scale(1.3);
        transform: scale(1.3);
    }
    .tile
    {
        width:100%;
        margin:60px auto;
    }
    #tile-1 .tab-pane
    {
        padding:15px;
        height:450px;
        background-color: #fff;
    }


    #tile-1 .nav-tabs
    {
        position:relative;
        border:none!important;
        background-color:#fff;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        border-radius:6px;
    }
    #tile-1 .nav-tabs li
    {
        margin:0px!important;
    }
    #tile-1 .nav-tabs li a
    {
        position:relative;
        margin-right:0px!important;

        font-size:16px;
        border:none!important;
        color:#333;
    }
    #tile-1 .nav-tabs a:hover
    {
        background-color:#fff!important;
        border:none;
    }
    #tile-1 .slider
    {
        display:inline-block;
        width:30px;
        height:4px;
        border-radius:3px;
        background-color:orange;
        position:absolute;
        z-index:1;
        bottom:0;
        transition:all .4s linear;

    }
    #tile-1 .nav-tabs .active
    {
        background-color:transparent!important;
        border:none!important;
        color:orange!important;
    }

    #tile-2 .tab-pane
    {
        padding:15px;
        height:400px;
        background-color: whitesmoke;
    }
    #tile-2 .nav-tabs
    {
        position:relative;
        border:none!important;
        background-color:#fff;
        /*   box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2); */
        border-radius:6px;
    }
    #tile-2 .nav-tabs li
    {
        margin:0px!important;
    }
    #tile-2 .nav-tabs li a
    {
        position:relative;
        margin-right:0px!important;
        padding: 20px 40px!important;
        font-size:16px;
        border:none!important;
        color:#333;
    }
    #tile-2 .nav-tabs a:hover
    {
        background-color:#fff!important;
        border:none;
    }
    #tile-2 .slider
    {
        display:inline-block;
        width:30px;
        height:4px;
        border-radius:3px;
        background-color: #d37739;
        position:absolute;
        z-index:1;
        bottom:0;
        transition:all .4s linear;

    }
    #tile-2 .nav-tabs .active
    {
        background-color:transparent!important;
        border:none!important;
        color:#d37739!important;
    }
    /*h2 {*/
    /*    border-bottom: 10px solid #DFD9E3;*/
    /*    text-align: center;*/
    /*}*/
    /*h2:after {*/
    /*    content: '';*/
    /*    display: block;*/
    /*    border-bottom: 10px solid #3D2F6C;*/
    /*    margin-bottom: -10px;*/
    /*    max-width: 200px;*/
    /*}*/
    hr.colored {
        border: 0;   /* in order to override TWBS stylesheet */
        height: 5px;

        background: -moz-linear-gradient(left, rgba(196,222,138,1) 0%, rgba(196,222,138,1) 12.5%, rgba(245,253,212,1) 12.5%, rgba(245,253,212,1) 25%, rgba(255,208,132,1) 25%, rgba(255,208,132,1) 37.5%, rgba(242,122,107,1) 37.5%, rgba(242,122,107,1) 50%, rgba(223,157,185,1) 50%, rgba(223,157,185,1) 62.5%, rgba(192,156,221,1) 62.5%, rgba(192,156,221,1) 75%, rgba(95,156,217,1) 75%, rgba(95,156,217,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 100%);  /* FF3.6+ */
        background: -webkit-linear-gradient(left, rgba(196,222,138,1) 0%, rgba(196,222,138,1) 12.5%, rgba(245,253,212,1) 12.5%, rgba(245,253,212,1) 25%, rgba(255,208,132,1) 25%, rgba(255,208,132,1) 37.5%, rgba(242,122,107,1) 37.5%, rgba(242,122,107,1) 50%, rgba(223,157,185,1) 50%, rgba(223,157,185,1) 62.5%, rgba(192,156,221,1) 62.5%, rgba(192,156,221,1) 75%, rgba(95,156,217,1) 75%, rgba(95,156,217,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(left, rgba(196,222,138,1) 0%, rgba(196,222,138,1) 12.5%, rgba(245,253,212,1) 12.5%, rgba(245,253,212,1) 25%, rgba(255,208,132,1) 25%, rgba(255,208,132,1) 37.5%, rgba(242,122,107,1) 37.5%, rgba(242,122,107,1) 50%, rgba(223,157,185,1) 50%, rgba(223,157,185,1) 62.5%, rgba(192,156,221,1) 62.5%, rgba(192,156,221,1) 75%, rgba(95,156,217,1) 75%, rgba(95,156,217,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(left, rgba(196,222,138,1) 0%, rgba(196,222,138,1) 12.5%, rgba(245,253,212,1) 12.5%, rgba(245,253,212,1) 25%, rgba(255,208,132,1) 25%, rgba(255,208,132,1) 37.5%, rgba(242,122,107,1) 37.5%, rgba(242,122,107,1) 50%, rgba(223,157,185,1) 50%, rgba(223,157,185,1) 62.5%, rgba(192,156,221,1) 62.5%, rgba(192,156,221,1) 75%, rgba(95,156,217,1) 75%, rgba(95,156,217,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 100%); /* IE10+ */
        background: linear-gradient(to right, rgba(196,222,138,1) 0%, rgba(196,222,138,1) 12.5%, rgba(245,253,212,1) 12.5%, rgba(245,253,212,1) 25%, rgba(255,208,132,1) 25%, rgba(255,208,132,1) 37.5%, rgba(242,122,107,1) 37.5%, rgba(242,122,107,1) 50%, rgba(223,157,185,1) 50%, rgba(223,157,185,1) 62.5%, rgba(192,156,221,1) 62.5%, rgba(192,156,221,1) 75%, rgba(95,156,217,1) 75%, rgba(95,156,217,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 87.5%, rgba(94,190,227,1) 100%); /* W3C */
    }
    .zoom {
        display: inline-block;
        /*border: 1px solid black;*/
        overflow: hidden;            /* clip the excess when child gets bigger than parent */
        border-radius: 25px  }
    .zoom img {
        display: block;
        transition: transform .4s;   /* smoother zoom */
    }
    .zoom:hover img {
        transform: scale(1.3);
        transform-origin: 50% 50%;
    }
    .circle {
        height: 100px;
        width: 100px;
        background-color: white;
        border-radius: 50%;
        display: inline-block;
    }
    .img-hover-zoom--zoom-n-rotate img {
        transition: transform .5s ease-in-out;
    }

    /* The Transformation */
    .img-hover-zoom--zoom-n-rotate:hover img {
        transform: scale(2) rotate(25deg);
    }
    .bottom-right {
        position: absolute;
        bottom: 2px;
        right: 16px;
    }

    .marqueenayok {
        top: 2em;
        position: relative;
        box-sizing: border-box;
        animation: marquee 15s linear infinite;
        font-family: 'Prompt', sans-serif;
    }

    .imgpadding
    {
        padding: 10px 10px 10px;
        border: 3px solid #603913;
    }

    .owl-item > div {
        cursor: pointer;
        margin: 6% 8%;
        transition: margin 0.4s ease;
    }
    .owl-item.center > div {
        cursor: auto;
        margin: 0;
    }
    .owl-item:not(.center) > div:hover {
        opacity: .75;
    }


    /* Click the image one by one to see the different layout */

    /* Owl Carousel */

    .owl-prev {
        background: url('https://res.cloudinary.com/milairagny/image/upload/v1487938188/left-arrow_rlxamy.png') left center no-repeat;
        height: 54px;
        position: absolute;
        top: 50%;
        width: 27px;
        z-index: 1000;
        left: 2%;
        cursor: pointer;
        color: transparent;
        margin-top: -27px;
    }

    .owl-next {
        background: url('https://res.cloudinary.com/milairagny/image/upload/v1487938220/right-arrow_zwe9sf.png') right center no-repeat;
        height: 54px;
        position: absolute;
        top: 50%;
        width: 27px;
        z-index: 1000;
        right: 2%;
        cursor: pointer;
        color: transparent;
        margin-top: -27px;
    }

    .owl-prev:hover,
    .owl-next:hover {
        opacity: 0.5;
    }


    /* Owl Carousel */


    /* Popup Text */

    .white-popup-block {
        background: #FFF;
        padding: 20px 30px;
        text-align: left;
        max-width: 650px;
        margin: 40px auto;
        position: relative;
    }

    .popuptext {
        display: table;
    }
    .popuptext p {
        margin-bottom: 10px;
    }
    .popuptext span {
        font-weight: bold;
        float: right;
    }
    /* Popup Text */

    /* Icon CSS */
    .item1 {
        position: relative;
    }
    .item1 i {
        display: none;
        font-size: 4rem;
        color: #FFF;
        opacity: 1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
    }
    .item1 a {
        display: block;
        width: 100%;
    }
    .item1 a:hover:before {
        content: "";
        background: rgba(0, 0, 0, 0.5);
        position: absolute;
        height: 100%;
        width: 100%;
        z-index: 1;
    }
    .item1 a:hover i {
        display: block;
        z-index: 2;
    }






    @import url(https://fonts.googleapis.com/css?family=Raleway:400,200,300,800);
    figure.snip0019 {
        font-family: 'Raleway', Arial, sans-serif;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin: 10px;
        min-width: 220px;
        max-width: 310px;
        max-height: 220px;
        width: 100%;
        background: #ffffff;
        text-align: center;
    }
    figure.snip0019 * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    figure.snip0019 img {
        opacity: 1;
        width: 100%;
        -webkit-transition: opacity 0.35s;
        transition: opacity 0.35s;
    }
    figure.snip0019 figcaption {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: left;
    }
    figure.snip0019 figcaption > div {
        float: left;
        height: 100%;
        overflow: hidden;
        width: 50%;
        position: relative;
    }
    figure.snip0019 figcaption::before {
        position: absolute;
        top: 50%;
        bottom: 50%;
        left: 50%;
        width: 2px;
        content: '';
        opacity: 0;
        background-color: rgba(255, 255, 255, 0);
        -webkit-transition: all 0.4s;
        transition: all 0.4s;
        -webkit-transition-delay: 0.6s;
        transition-delay: 0.6s;
    }
    figure.snip0019 h4,
    figure.snip0019 p {
        margin: 0;
        padding: 20px;
        opacity: 0;
        position: absolute;
        top: 0;
        width: 100%;
        left: 0;
        -webkit-transition: opacity 0.45s, -webkit-transform 0.45s;
        transition: opacity 0.45s,-webkit-transform 0.45s,-moz-transform 0.45s,-o-transform 0.45s,transform 0.45s;
    }
    figure.snip0019 h4 {
        text-align: right;
        display: inline-block;
        word-spacing: -0.1em;
        font-weight: 300;
        text-transform: uppercase;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        -webkit-transform: translate3d(50%, 0%, 0);
        transform: translate3d(50%, 0%, 0);
        -webkit-transition-delay: 0s;
        transition-delay: 0s;
        font-family: 'Prompt', sans-serif;
    }
    figure.snip0019 h4 span {
        font-weight: 800;
    }
    figure.snip0019 p {
        display: block;
        bottom: 0;
        text-align: left;
        font-weight: 300;
        top: 0%;
        color: #000;
        background: {{$css->web_nav_bgcol}};
        -webkit-transform: translate3d(-50%, 0%, 0);
        transform: translate3d(-50%, 0%, 0);
        -webkit-transition-delay: 0s;
        transition-delay: 0s;
        font-family: 'Prompt', sans-serif;
        font-size: 1.5rem;
    }
    figure.snip0019 a {
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        position: absolute;
        color: #ffffff;
    }
    figure.snip0019:hover img {
        opacity: 0.7;
    }
    figure.snip0019:hover figcaption h4,
    figure.snip0019:hover figcaption p {
        -webkit-transform: translate3d(0%, 0%, 0);
        transform: translate3d(0%, 0%, 0);
        -webkit-transition-delay: 0.3s;
        transition-delay: 0.3s;
    }
    figure.snip0019:hover figcaption h4 {
        opacity: 1;
    }
    figure.snip0019:hover figcaption p {
        opacity: 1;
    }
    figure.snip0019:hover figcaption::before {
        background: #ffffff;
        top: 0px;
        bottom: 0px;
        opacity: 1;
        -webkit-transition-delay: 0s;
        transition-delay: 0s;
    }

    .carousel-control-next-icon:after
    {
        content: '>';
        font-size: 100px;
        color: black;
    }

    .carousel-control-prev-icon:after {
        content: '<';
        font-size: 100px;
        color: black;
    }

    .parallelogram {
        width: auto;
        height: 75px;
        transform: skew(-20deg);
        background: #555;
        z-index: 500;
    }

    .vl {
        border-right:3px solid #603913;
        z-index: 1;
    }
    .vll {
        border-left:3px solid #603913;
        z-index: 1;
    }

    @media (max-width: 767px) {
        #hidden  { display: none; }
        body{font-size: 1.0rem}
        h2 {
            border-bottom: 10px solid #DFD9E3;
            text-align: center;
            font-size: 1.3rem;
        }
        h2:after {
            content: '';
            display: block;
            border-bottom: 10px solid #3D2F6C;
            margin-bottom: -10px;
            max-width: 200px;
        }
    }
    @media (min-width: 767px) {
        #hiddenpc  { display: none; }
    }

    td {
        background-size: cover;
        background-position: center center;
        width: 33%;
        height: 100px;
        border: solid 2px aliceblue;
    }

    #ss_menu {
        margin-right: -0.2%;
        bottom: 90px;
        width: 60px;
        height: 60px;
        color: #fff;
        position: fixed;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        right: 30px;
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    #ss_menu > .menu {
        display: block;
        position: absolute;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        text-align: center;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.23), 0 3px 10px rgba(0, 0, 0, 0.16);
        color: #fff;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }

    #ss_menu > .menu .share {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }

    #ss_menu > .menu .share .circle {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        position: absolute;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #fff;
        top: 50%;
        margin-top: -6px;
        left: 12px;
        opacity: 1;
    }

    #ss_menu > .menu .share .circle:after, #ss_menu > .menu .share .circle:before {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        content: '';
        opacity: 1;
        display: block;
        position: absolute;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #fff;
    }

    #ss_menu > .menu .share .circle:after {
        left: 20.78461px;
        top: 12.0px;
    }

    #ss_menu > .menu .share .circle:before {
        left: 20.78461px;
        top: -12.0px;
    }

    #ss_menu > .menu .share .bar {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        width: 24px;
        height: 3px;
        background: #fff;
        position: absolute;
        top: 50%;
        margin-top: -1.5px;
        left: 18px;
        -webkit-transform-origin: 0% 50%;
        -moz-transform-origin: 0% 50%;
        -ms-transform-origin: 0% 50%;
        -o-transform-origin: 0% 50%;
        transform-origin: 0% 50%;
        -webkit-transform: rotate(30deg);
        -moz-transform: rotate(30deg);
        -ms-transform: rotate(30deg);
        -o-transform: rotate(30deg);
        transform: rotate(30deg);
    }

    #ss_menu > .menu .share .bar:before {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        content: '';
        width: 24px;
        height: 3px;
        background: #fff;
        position: absolute;
        left: 0px;
        -webkit-transform-origin: 0% 50%;
        -moz-transform-origin: 0% 50%;
        -ms-transform-origin: 0% 50%;
        -o-transform-origin: 0% 50%;
        transform-origin: 0% 50%;
        -webkit-transform: rotate(-60deg);
        -moz-transform: rotate(-60deg);
        -ms-transform: rotate(-60deg);
        -o-transform: rotate(-60deg);
        transform: rotate(-60deg);
    }

    #ss_menu > .menu .share.close .circle { opacity: 0; }

    #ss_menu > .menu .share.close .bar {
        top: 50%;
        margin-top: -1.5px;
        left: 50%;
        margin-left: -12px;
        -webkit-transform-origin: 50% 50%;
        -moz-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        -o-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        -webkit-transform: rotate(405deg);
        -moz-transform: rotate(405deg);
        -ms-transform: rotate(405deg);
        -o-transform: rotate(405deg);
        transform: rotate(405deg);
    }

    #ss_menu > .menu .share.close .bar:before {
        -webkit-transform-origin: 50% 50%;
        -moz-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        -o-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        -webkit-transform: rotate(-450deg);
        -moz-transform: rotate(-450deg);
        -ms-transform: rotate(-450deg);
        -o-transform: rotate(-450deg);
        transform: rotate(-450deg);
    }

    #ss_menu > .menu.ss_active {
        background: {{$css->layout_footer_col}};
        -webkit-transform: scale(0.7);
        -moz-transform: scale(0.7);
        -ms-transform: scale(0.7);
        -o-transform: scale(0.7);
        transform: scale(0.7);
    }

    #ss_menu > div {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        position: absolute;
        width: 60px;
        height: 60px;
        font-size: 30px;
        text-align: center;
        background: {{$css->layout_footer_col}};
        border-radius: 50%;
        display: table;
    }

    #ss_menu > div i {
        display: table-cell;
        vertical-align: middle;
    }

    #ss_menu > div:hover {
        background: #ffc624;
        cursor: pointer;
    }

    #ss_menu div:nth-child(1) {
        top: 0px;
        left: -160px;
    }

    #ss_menu div:nth-child(2) {
        top: -80.0px;
        left: -138.56406px;
    }

    #ss_menu div:nth-child(3) {
        top: -138.56406px;
        left: -80.0px;
    }

    #ss_menu div:nth-child(4) {
        top: -160px;
        left: 0.0px;
    }

    .MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
    .MultiCarousel .MultiCarousel-inner .item { float: left;}
    .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:10px; background:#f1f1f1; color:#666;}
    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
    .MultiCarousel .leftLst { left:0; }
    .MultiCarousel .rightLst { right:0; }

    .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: point; background:#343a40; }


    .MultiCarousel2 { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
    .MultiCarousel2 .MultiCarousel2-inner { transition: 1s ease all; float: left; }
    .MultiCarousel2 .MultiCarousel2-inner .item { float: left;}
    .MultiCarousel2 .MultiCarousel2-inner .item > div { text-align: center; padding:10px; margin:10px; background:#f1f1f1; color:#666;}
    .MultiCarousel2 .leftLst2, .MultiCarousel2 .rightLst2 { position:absolute; border-radius:50%;top:calc(50% - 20px); }
    .MultiCarousel2 .leftLst2 { left:0; }
    .MultiCarousel2 .rightLst2 { right:0; }

    .MultiCarousel2 .leftLst2.over, .MultiCarousel2 .rightLst2.over { pointer-events: point; background:#343a40; }

    #calendar{

    }
    #calendar_weekdays div{
        display:inline-block;
        vertical-align:top;
    }
    #calendar_content, #calendar_weekdays, #calendar_header{
        position: relative;
        width: 320px;
        overflow: hidden;
        float: left;
        z-index: 0;
    }
    #calendar_weekdays div, #calendar_content div{
        width:40px;
        height: 40px;
        overflow: hidden;
        text-align: center;
        background-color: #FFFFFF;
        color: #787878;
    }
    #calendar_content{
        -webkit-border-radius: 0px 0px 12px 12px;
        -moz-border-radius: 0px 0px 12px 12px;
        border-radius: 0px 0px 12px 12px;
    }
    #calendar_content div{
        float: left;
    }
    #calendar_content div:hover{
        background-color: #F8F8F8;
    }
    #calendar_content div.blank{
        background-color: #E8E8E8;
    }
    #calendar_header, #calendar_content div.today{
        zoom: 1;
        filter: alpha(opacity=70);
        opacity: 0.7;
    }
    #calendar_content div.today{
        color: #FFFFFF;
    }
    #calendar_header{
        width: 100%;
        height: 37px;
        text-align: center;
        background-color: #FF6860;
        padding: 18px 0;
        -webkit-border-radius: 12px 12px 0px 0px;
        -moz-border-radius: 12px 12px 0px 0px;
        border-radius: 12px 12px 0px 0px;
    }
    #calendar_header h1{
        font-size: 1.5em;
        color: #FFFFFF;
        float:left;
        width:70%;
    }
    i[class^=icon-chevron]{
        color: #FFFFFF;
        float: left;
        width:15%;
        border-radius: 50%;
    }

    * {
        margin: 0px;
        padding: 0px;
    }

    body {
        /*background-color: #05182d;*/   /* พื้นหลัง bubble animation*/
    }

    @-webkit-keyframes backgroundAnimate {
        from {
            left: 0;
            top: 0;
        }
        to {
            left: -10000px;
            top: -2000px;
        }
    }

    @-moz-keyframes backgroundAnimate {
        from {
            left: 0;
            top: 0;
        }
        to {
            left: -10000px;
            top: -2000px;
        }
    }

    @-o-keyframes backgroundAnimate {
        from {
            left: 0;
            top: 0;
        }
        to {
            left: -10000px;
            top: -2000px;
        }
    }

    @keyframes backgroundAnimate {
        from {
            left: 0;
            top: 0;
        }
        to {
            left: -10000px;
            top: -2000px;
        }
    }

    #back {
        background: url(http://www.tranexnet.com/img/back.png) repeat 20% 20%;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0.4;
        z-index: -1;
        -webkit-animation-name: backgroundAnimate;
        -webkit-animation-duration: 500s;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-name: backgroundAnimate;
        -moz-animation-duration: 5s;
        -moz-animation-timing-function: linear;
        -moz-animation-iteration-count: infinite;
        -o-animation-name: backgroundAnimate;
        -o-animation-duration: 500s;
        -o-animation-timing-function: linear;
        -o-animation-iteration-count: infinite;
        animation-name: backgroundAnimate;
        animation-duration: 500s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }

    #front {
        background: url(http://www.tranexnet.com/img/front.png) repeat 35% 35%;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0.6;
        z-index: -1;
        -webkit-animation-name: backgroundAnimate;
        -webkit-animation-duration: 300s;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-name: backgroundAnimate;
        -moz-animation-duration: 300s;
        -moz-animation-timing-function: linear;
        -moz-animation-iteration-count: infinite;
        -o-animation-name: backgroundAnimate;
        -o-animation-duration: 300s;
        -o-animation-timing-function: linear;
        -o-animation-iteration-count: infinite;
        animation-name: backgroundAnimate;
        animation-duration: 300s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }


    /*vertical เด้อ*/


</style>
