
@php
    $css = getCss();
    //dd($css);
@endphp

<style>
    /* Global Styles */
    body {
        height: auto;
        overflow-x: hidden; /* Hide horizontal scrollbar */
        margin: 0 auto;
        background: url("../../upload/bg/bgpah.jpg")
    }

    #container_content {
        font-family: 'Prompt', sans-serif;
        width: 90%;
        height: auto;
        margin: 0 auto;
        background-color: white;
        box-shadow: -60px 0 100px -90px #000000, 60px 0px 100px -90px #000000;
    }

    #head_bg {
        width: 100%;
        height: auto;
        box-shadow: 5px 5px 10px 5px #3f3f3f;
    }

    .navbar {
        background-color: #e3f2fd;
        box-shadow: 5px 5px 10px #3f3f3f;
    }

    #sidebar {
        background: #ccc;
        height: auto;
        position: relative;
        box-shadow: 5px 5px 10px black;
    }

    #content {
        background-color: white;
        height: auto;
    }

    #footer {
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: black;
        color: white;
        text-align: center;
        height: 400px;
    }

    #marquee {
        background-color: #FFEE9A;
        color: black;
        box-shadow: 5px 5px 10px #3f3f3f;
    }

    #nayok {
        width: 230px;
        height: 345px;
        margin: 0 auto;
        background: black;
        box-shadow: 5px 5px 10px black;
    }

    #palad {
        width: 230px;
        height: 345px;
        margin: 0 auto;
        background: black;
        box-shadow: 5px 5px 10px black;
    }

    .banner_left_top {
        width: 250px;
        min-height: 100px;
        margin: 0 auto;
        background: grey;
    }

    .banner_left_bottom {
        width: 250px;
        min-height: 100px;
        margin: 0 auto;
        background: grey;
    }

    .banner_top_content {
        width: 80%;
        height: 80px;
        background: grey;
        margin: 0 auto;
    }

    .banner_bottom_content {
        width: 100%;
        height: 60px;
        /*background: grey;*/
        margin: 0 auto;
    }

    .banner_bottom_content_linkout {
        width: 100%;
        height: 60px;
        /*background: grey;*/
        margin: 0 auto;
    }

    .banner_menu_group {
        width: 340px;
        height: 80px;
        background: grey;
        margin: 0 auto;
    }

    #sidebar ul {
        list-style-type: disc;
    }

    #sidebar ul li {
        margin-left: 20px;
        margin-bottom: 5px;
        margin-top: 5px;
        font-weight: bold;
    }

    #sidebar ul li a {
        text-decoration: none;
        color: black; /*			set variable color*/
    }

    /* CONTENT CSS	*/
    #content_slideshow {
        width: 90%;
        height: 380px;
        background-color: black;
        box-shadow: 5px 5px 10px #3f3f3f;
        margin: 0 auto;
    }

    .content_box {
        width: 90%;
        height: auto;
        margin: 5% auto;
    }

    .content_title_banner {
        position: relative;
        width: 100%;
        height: 100px;
        background-color: grey;
        margin: 0 auto;
        box-shadow: 5px 5px 10px #3f3f3f;
    }

    .content_subject_only {
        width: 100%;
        height: auto;
        /*background-color: black;*/
        box-shadow: 5px 5px 10px #3f3f3f;
        margin: 0 auto;
        color: white;
        padding: 20px;
    }

    .content_image_and_subject {
        width: 100%;
        height: auto;
        /*background-color: black;*/
        margin: 0 auto;
        color: white;
        box-shadow: 5px 5px 10px #3f3f3f;
        padding: 20px;
    }

    .content_image_card {
        background-color: white;
        height: 250px;
        box-shadow: 5px 5px 10px #3f3f3f;
        padding: 12px;
        margin: 2% auto;
    }

    .content_image_card img {
        height: 200px;
        width: 100%;
        border: black dashed 1px;
    }

    .content_subject_card {
        width: 100%;
        height: auto;
        background-color: white;
        border: black dashed 1px;
        border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;
        color: black;
        text-align: center;
    }

    .content_purchase ,.content_egp{
        width: 100%;
        height: auto;
        /*background-color: black;*/
        margin: 0 auto;
        color: black;
        box-shadow: 5px 5px 10px #3f3f3f;
    }

    .border-primary{
        border: none !important;
    }


    .content_youtube {
        width: 100%;
        height: auto;
        /*background-color: black;*/
        margin: 0 auto;
        color: black;
        box-shadow: 5px 5px 10px #3f3f3f;
        padding: 12px;
    }

    .content_bottom_banner {
        width: 100%;
        height: auto;
        margin: 0 auto;
    }

    .bottom_banner {
        width: auto;
        height: 100px;
        background: orange;
        border: solid 2px black;
        margin: 2% auto;
    }

    .content_bottom_banner_linkout {
        width: 100%;
        height: auto;
        margin: 0 auto;
    }

    .bottom_banner_linkout {
        width: auto;
        height: 100px;
        background: orange;
        border: solid 2px black;
        margin: 2% auto;
    }

    #sitemap {
        width: 200px;
        height: 64px;
        font-weight: bolder;
        font-size: 22px;
        margin: 0 auto;
    }

    /* purchase taps*/
    .nav-pill-main-div {
        position: relative;
        border-radius: 20px;
        box-shadow: inset -1px -7px 28px 3px rgba(1, 1, 1, 0.11);
        height: 100%;
    }

    ul.tabs {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    ul.tabs li {
        background: none;
        color: #222;
        display: inline-block;
        padding: 10px 15px;
        cursor: pointer;
        transition: 0.3s ease all;
        width: 33%;
    }

    ul.tabs li.current {
        color: #222;
        transition: 0.3s ease all;
    }

    ul.tabs li.current span {
        color: #1AA8E2;
        transition: 0.3s ease all;
    }

    .tab-content {
        display: none;
        padding: 15px;
        transition: 0.3s ease all;
    }

    .tab-content.current {
        display: inherit;
        transition: 0.3s ease all;
    }


    /*------ease effect------*/
    .nav-justified > li {
        float: none;
    }

    .nav-justified > li span {
        width: 100%;
    }

    .customize_solution .nav-justified > li {
        float: none;
    }

    .customize_solution span.ease-effect {
        text-decoration: none;
        -webkit-transition: 0.3s all ease;
        transition: 0.3s ease all;
    }

    .customize_solution span.ease-effect:hover, .customize_solution span.ease-effect:focus, .customize_solution ul.tabs li.current span:hover, .customize_solution ul.tabs li.current span:focus {
        text-decoration: underline;
        /*color: #FFF;*/
        transition: 0.3s ease all;
    }

    .customize_solution span.ease-effect {
        letter-spacing: 2px;
        text-transform: uppercase;
        display: inline-block;
        text-align: center;
        font-weight: bold;
        padding: 14px 0px;
        border-top-right-radius: 2px;
        border-top-left-radius: 2px;
        position: relative;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.1);
    }

    .customize_solution .ease-effect:before {
        -webkit-transition: 0.5s all ease;
        transition: 0.5s all ease;
        position: absolute;
        top: 0;
        left: 50%;
        right: 50%;
        bottom: 0;
        opacity: 0;
        content: '';
        background-color: #1AA8E2;
        z-index: -2;
    }

    .customize_solution .ease-effect:hover:before, .customize_solution .ease-effect:focus:before {
        -webkit-transition: 0.5s all ease;
        transition: 0.5s all ease;
        left: 0;
        right: 0;
        opacity: 1;
    }

    .finbyz-icon {
        height: 100px;
        width: 100px;
    }

    /* end purchase taps*/


    /*mobile*/
    @media only screen and (max-width: 600px) {
        #head_bg, #sidebar, #marquee ,.hide-on-phone {
            display: none
        }

        #container_content {
            width: 100%;
            height: auto;
            margin: 0 auto;
            background-color: white;
            box-shadow: -60px 0 100px -90px #000000, 60px 0px 100px -90px #000000;
        }
    }
    /*end mobile*/
    /*pc*/
    @media only screen and (min-width: 600px) {
        .hide-on-pc {
            display: none
        }
    }
    /*end pc*/
</style>