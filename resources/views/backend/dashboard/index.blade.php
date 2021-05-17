@extends('backend.layouts.app')
@section('title','สรุปข้อมูลเว็บไซต์')
@section('content')
    <style>

        .box-content {display:flex; position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); }

        .box-progress {width:200px; height:200px; position:relative; margin:0 20px; }

        .box-progress::after {content:attr(data-count) ''; display:block; position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); font-weight: bolder;font-size: 20px; color: black; }

        .box-progress .progress {width:200px; height:200px; transform:rotate(-90deg); background-color: transparent }

        circle {stroke-width:20px; fill:none; stroke:#333; r:90; cy:100; cx:100; }

        .progress-bar {stroke:#20e9ff; stroke-linecap:round; transition:stroke-dashoffset 700ms ease; animation:strokeColor 1200ms linear infinite; }

        @keyframes strokeColor {
            0%, 100% {stroke:#008694; }
            50% {stroke:#20e9ff; }
        }

        /* ^ top css circle can't run firefox   */

        .ProgressBar,
        .ProgressBar-contentCircle {
            display: table;
            height: 210px;
            position: absolute;
            width: 210px;
        }
        .counter {
            display: inline-grid;
            margin:0 auto;
            font-size:20px;
            color: white;
            background-color: #FF6F6F;
            width:100px;
            border-radius: 10%;
            height:30px;
            vertical-align: middle;
            box-shadow: 2px 2px 3px 2px #484848;
        }
        .counter2 {
            display: inline-grid;
            margin:0 auto;
            font-size:20px;
            color: white;
            background-color: #008BFF;
            width:100px;
            border-radius: 10%;
            height:30px;
            vertical-align: middle;
            box-shadow: 2px 2px 3px 2px #484848;
        }
        .ProgressBar-circle,
        .ProgressBar-background {
            fill: none;
            stroke: #D00463;
            stroke-width: 10;
            stroke-linecap: round;
            stroke-dasharray: 0;
            stroke-dashoffset: 0;
            position: relative;
            z-index: 10;
        }

        .ProgressBar-background {
            stroke: grey;
            stroke-width: 10;
            z-index: 0;
        }

        .ProgressBar-percentage {
            color: #389ba6;
            font-size: 40px;
            text-align: center;
            width: 100%;
            display: table-cell;
            vertical-align: middle;
        }

        /************************/
        /* structure de la page */
        /************************/
        .Content {
            height: 270px;
            margin: -135px 0 0 0;
            position: absolute;
            top: 50%;
            width: 100%;
        }

        .List {
            display: flex;
            list-style: none;
            margin: 10px auto;
            padding: 0px;
            width: 840px;
            height: 210px;
        }

        .List-item {
            float: left;
            width: 210px;
        }

        .Title {
            text-align: center;
        }

        .flip-card1{
            display: flex;
            justify-content: center;
            transform: translate(0%, 50%);
        }
        input{
            display: none;
        }
        label{
            perspective: 1000px;
            transform-style: preserve-3d;
            display: block;
            cursor: pointer;
        }
        .card1-item{
            margin: 0 2%;
        }
        .card1{
            line-height: 8em;
            height: 8em;
            width: 8em;
            transform-style: preserve-3d;
            transition: all 600ms;
            z-index: 9;
        }
        .card1 div{
            position: absolute;
            height: 8em;
            width: 100%;
            text-align: center;
            backface-visibility: hidden;
            border-radius: 50%;
        }
        .card1 .back {
            background-color: #222;
            -webkit-transform: rotateX(180deg);
            transform: rotateX(180deg);
            line-height: 8em;
            box-shadow: 2px 2px 3px 2px #484848;
        }
        :checked + .card1 {
            transform: rotateX(180deg);
        }
        .front1 p{
            margin: 0;
            font-size: 30px;
            color: #fff;
        }
        .back p{
            margin: 0;
            font-size: 30px;
            color: #fff;
        }
        .pink{
            background-color: #f37e7c;
            box-shadow: 2px 2px 3px 2px #a06565;
        }
        .orange{
            background-color: #ff7c4c;
            box-shadow: 2px 2px 3px 2px #ca633d;
        }
        .blue{
            background-color: #459cd6;
            box-shadow: 2px 2px 3px 2px #387dab;
        }

        .title{
            font-size: 24px;
            margin-top: 30px;
            margin-left: 30px;
        }
        .subtitle{
            font-size: 14px;
            color: #8a91bd;
            margin-top: 5px;
            margin-left: 30px;

        }
        .container{
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-wrap: wrap;
            margin: 30px 30px;
        }
        .card{
            display: flex;
            flex-direction: column;
            background-color: #e4dffc;
            flex: 1;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-radius: 3px;
            position: relative;
            margin-bottom: 30px;
        }
        .card::after{
            content: "";
            border-top: 5px solid #a2cbe7;
            border-radius: 3px;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        .card__ig{
            display: flex;
            flex-direction: column;
            background-color: #252b43;
            flex: 1;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            position: relative;
            margin-bottom: 30px;
            margin-top: 5px;
        }
        .card__ig::after {
            content: "";
            border-top: none;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            position: absolute;
            width: 100%;
            height: 5px;
            top: 0;
            left: 0;
            background: linear-gradient(90deg,#fac06c,#db4e93);
        }
        .card__yt::after{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border-top: 5px solid #c2042a;
        }
        .fa-facebook-official, .fa-twitter{
            color: #1ba2f4;
        }
        .fa-youtube-play{
            color: #c2042a;
        }
        .icon{
            font-size: 22px !important;
        }
        .fa-instagram{
            color: red;
            display: block;
            background: linear-gradient(0deg,#fac06c,#db4e93);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .card__name{
            padding: 15px 0;
            color: #8a91bd;
            display: flex;
        }
        .card__number{
            font-size: 40px;
            font-weight: 400;
            color: #1d1c1c;
        }
        .card__followers{
            font-size: 12px;
            text-transform: uppercase;
            color: #8a91bd;
            letter-spacing: 5px;
        }
        .card__change{
            padding: 15px 0;
            color: #079076;
            display: flex;
        }
        span{
            margin-left: 5px;
        }
        .card__triangle-up {
            width: 0;
            height: 0;
            position: relative;
            top: 3px;
            border-right: 5px solid transparent;
            border-top: 5px solid transparent;
            border-left: 5px solid transparent;
            border-bottom: 5px solid #079076;
        }
        .card__change-down{
            padding: 15px 0;
            color: #da4e5b;
            display: flex;
        }
        .card__triangle-down {
            width: 0;
            height: 0;
            position: relative;
            top: 9px;
            border-right: 5px solid transparent;
            border-top: 5px solid #da4e5b;
            border-left: 5px solid transparent;
            border-bottom: 5px solid transparent;
        }
        .card-small{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            background-color: whitesmoke;
            flex: 1;
            align-items: stretch;
            justify-content: space-between;
            padding: 30px 30px;
            border-radius: 3px;
            position: relative;
            margin-bottom: 30px;
        }
        .card-small .card__name{
            flex:0 50%;
        }
        .card-small .fa{
            flex:0 50%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .card-small .card__number{
            flex:0 50%;
            font-size: 36px;
        }
        .card-small .card__number__sm{
            flex:0 50%;
            font-size: 20px;
        }
        .card-small .card__change{
            flex:0 50%;
            position: relative;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .card-small .card__triangle-up {
            width: 0;
            height: 0;
            position: relative;
            top: -3px;
        }
        @media only screen and (min-width: 600px) {
            body{
                margin: 0 auto;
            }
            .container{
                margin: 0;
                flex-direction: row;
            }
            .card, .card__ig, .card__yt{
                margin:15px;
                flex: 0 41% ;
            }
            .card-small{
                margin:15px;
                flex: 0 41%;
                padding: 15px 30px;
            }
            .title, .subtitle{
                padding-left: 10px;
            }
        }
        @media only screen and (min-width: 900px) {
            body{
                max-width: 900px;
                margin: 0 auto;
            }
            .container{
                margin: 0;
                flex-direction: row;

            }
            .card, .card__ig, .card__yt{
                margin:15px;
                flex: 0 21%;
            }
            .card-small{
                margin:15px;
                flex: 0 21%;
                padding: 5px 15px;
            }
            .title, .subtitle{
                padding-left: 0px;
            }
        }
        @media only screen and (min-width: 1200px) {
            body{
                max-width: 100%;
                margin: 0 auto;
            }
            .container{
                margin: 0;
                flex-direction: row;
            }
            .card, .card__ig, .card__yt{
                margin:15px;
                flex: 0 21%;
            }
            .card-small{
                margin:15px;
                flex: 0 21%;
            }
            .title, .subtitle{
                padding-left: 20px;
            }
        }

        .wrimagecard{
            margin-top: 0;
            margin-bottom: 1.5rem;
            text-align: left;
            position: relative;
            background: #fff;
            box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .wrimagecard .fa{
            position: relative;
            font-size: 70px;
        }
        .wrimagecard-topimage_header{
            padding: 20px;
        }
        a.wrimagecard:hover, .wrimagecard-topimage:hover {
            box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);
        }
        .wrimagecard-topimage a {
            width: 100%;
            height: 100%;
            display: block;
        }
        .wrimagecard-topimage_title {
            padding: 20px 24px;
            height: 120px;
            padding-bottom: 0.75rem;
            position: relative;
        }
        .wrimagecard-topimage a {
            border-bottom: none;
            text-decoration: none;
            color: #525c65;
            transition: color 0.3s ease;
        }


        /* -- usable codes start -- */

        html,
        body,
        div,
        span,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        code,
        del,
        dfn,
        em,
        img,
        q,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        dialog,
        figure,
        footer,
        header,
        hgroup,
        nav,
        section {
            margin: 0;
            padding: 0;
            border: 0;
            vertical-align: baseline;
            text-decoration: none;
            list-style: none;
        }
        img {
            width: 100%
        }
        .anim04c {
            -webkit-transition: all .4s cubic-bezier(.5, .35, .15, 1.4);
            transition: all .4s cubic-bezier(.5, .35, .15, 1.4);
        }

        html,
        body {

        }
        body {
            overflow-x: hidden;
            overflow-y: auto;
        }
        /*-----*/

        .outer {
            position: relative;
            top: 50%;
            z-index: 1;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            cursor: pointer;
        }
        /*-----*/

        .signboard {
            width: 100px;
            height: 100px;
            margin: auto;
            color: #fff;
            border-radius: 10px;
        }
        /*-----*/

        .front {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 3;
            background: #ff726b;
            text-align: center;
        }
        .right1 {
            position: absolute;
            right: : 0;
            z-index: 2;
            -webkit-transform: rotate(-10deg) translate(7px, 8px);
            -moz-transform: rotate(-10deg) translate(7px, 8px);
            -ms-transform: rotate(-10deg) translate(7px, 8px);
            -o-transform: rotate(-10deg) translate(7px, 8px);
            transform: rotate(-10deg) translate(7px, 8px);
            background: #EFC94C;
        }
        .left {
            position: absolute;
            left: 0;
            z-index: 1;
            -webkit-transform: rotate(5deg) translate(-4px, 4px);
            -moz-transform: rotate(5deg) translate(-4px, 4px);
            -ms-transform: rotate(5deg) translate(-4px, 4px);
            -o-transform: rotate(5deg) translate(-4px, 4px);
            transform: rotate(5deg) translate(-4px, 4px);
            background: #3498DB;
        }
        /*-----*/

        .outer:hover .inner {
            -webkit-transform: rotate(0) translate(0);
            -moz-transform: rotate(0) translate(0);
            -ms-transform: rotate(0) translate(0);
            -o-transform: rotate(0) translate(0);
            transform: rotate(0) translate(0);
        }
        /*-----*/

        .outer:active .inner {
            -webkit-transform: rotate(0) translate(0) scale(0.9);
            -moz-transform: rotate(0) translate(0) scale(0.9);
            -ms-transform: rotate(0) translate(0) scale(0.9);
            -o-transform: rotate(0) translate(0) scale(0.9);
            transform: rotate(0) translate(0) scale(0.9);
        }
        .outer:active .front .date {
            -webkit-transform: scale(2);
        }
        .outer:active .front .day,
        .outer:active .front .month {
            visibility: hidden;
            opacity: 0;
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
        }
        .outer:active .right1 {
            -webkit-transform: rotate(-5deg) translateX(80px) scale(0.9);
            -moz-transform: rotate(-5deg) translateX(80px) scale(0.9);
            -ms-transform: rotate(-5deg) translateX(80px) scale(0.9);
            -o-transform: rotate(-5deg) translateX(80px) scale(0.9);
            transform: rotate(-5deg) translateX(80px) scale(0.9);
        }
        .outer:active .left {
            -webkit-transform: rotate(5deg) translateX(-80px) scale(0.9);
            -moz-transform: rotate(5deg) translateX(-80px) scale(0.9);
            -ms-transform: rotate(5deg) translateX(-80px) scale(0.9);
            -o-transform: rotate(5deg) translateX(-80px) scale(0.9);
            transform: rotate(5deg) translateX(-80px) scale(0.9);
        }
        /*-----*/

        .outer:active .calendarMain {
            -webkit-transform: scale(1.8);
            opacity: 0;
            visibility: hidden;
        }
        .outer:active .clock {
            -webkit-transform: scale(1.4);
            opacity: 1;
            visibility: visible;
        }
        .outer:active .calendarNormal {
            bottom: -30px;
            opacity: 1;
            visibility: visible;
        }
        .outer:active .year {
            top: -30px;
            opacity: 1;
            visibility: visible;
            letter-spacing: 3px;
        }
        /*-----*/

        .calendarMain {
            width: 100%;
            height: 100%;
            position: absolute;
            opacity: 1;
        }
        .month,
        .day {
            font-size: 10px;
            line-height: 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        .date {
            font-size: 40px;
            line-height: 40px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        /*-----*/

        .clock {
            width: 100%;
            height: 100%;
            position: absolute;
            font-size: 40px;
            line-height: 100px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-align: center;
            opacity: 0;
            visibility: hidden;
        }
        /*-----*/

        .year {
            width: 100%;
            position: absolute;
            top: 0;
            font-size: 14px;
            line-height: 30px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 0;
            text-align: center;
            opacity: 0;
            visibility: hidden;
            color: #ff726b;
        }
        .calendarNormal {
            width: 100%;
            position: absolute;
            bottom: 0;
            font-size: 14px;
            line-height: 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-align: center;
            opacity: 0;
            visibility: hidden;
        }
        .date2 {
            color: #ff726b;
        }
        .day2 {
            color: #3498DB;
        }
        .month2 {
            color: #EFC94C;
        }
        /* -- usable codes end -- */

        /* -- unusable codes (text, logo, etc.) -- */

        .info {
            width: 100%;
            height: 25%;
            position: absolute;
            top: 15%;
            text-align: center;
            opacity: 0;
        }
        .info li {
            width: 100%;
        }
        .hover,
        .click,
        .yeaa {
            font-size: 14px;
            line-height: 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-align: center;
            bottom: 0;
            opacity: 1;
        }
        .dribbble {
            position: absolute;
            top: -60px;
            font-size: 14px;
            opacity: 0;
        }
        em {
            color: #ed4988;
        }
        .designer {
            width: 100%;
            height: 50%;
            position: absolute;
            bottom: 0;
            text-align: center;
            opacity: 0;
        }
        .designer li {
            width: 100%;
            position: absolute;
            bottom: 30%;
        }
        .designer a {
            width: 30px;
            height: 30px;
            display: block;
            position: relative;
            border-radius: 100%;
            margin: auto;
            color: rgba(46, 204, 113, 0.55);
        }
        .designer a:after {
            content: "see designs";
            position: absolute;
            top: 0;
            left: 40px;
            font-size: 14px;
            line-height: 33px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            white-space: nowrap;
        }
        .designer a:hover:after {
            color: #2ecc71;
        }
        .designer img {
            display: block;
            border-radius: 100%;
        }
        body:hover .info,
        body:hover .designer {
            opacity: 1;
        }
        ::selection {
            background: transparent;
        }
        ::-moz-selection {
            background: transparent;
        }

        /* -moz-selection  diable ctrl+a   */



    </style>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div>
                    <div class="card-body">
            <div style="background-color: #ffffff">
                {{--                    <h1 class="ml-4 mt-4"><i class="fa fa-tachometer"></i> สรุปข้อมูลเว็บไซต์</h1>--}}


                    <div class="info anim04c">

                    </div>


                    <!-- main codes start -->
                    <div class="signboard outer">
                        <div class="signboard front inner anim04c">
                            <li class="year anim04c">
                                <span></span>
                            </li>
                            <ul class="calendarMain anim04c">
                                <li class="month anim04c">
                                    <span></span>
                                </li>
                                <li class="date anim04c">
                                    <span></span>
                                </li>
                                <li class="day anim04c">
                                    <span></span>
                                </li>
                            </ul>
                            <li class="clock minute anim04c">
                                <span></span>
                            </li>
                            <li class="calendarNormal date2 anim04c">
                                <span></span>
                            </li>
                        </div>
                        <div class="signboard left inner anim04c">
                            <li class="clock hour anim04c">
                                <span></span>
                            </li>
                            <li class="calendarNormal day2 anim04c">
                                <span></span>
                            </li>
                        </div>
                        <div class="signboard right1 inner anim04c">
                            <li class="clock second anim04c">
                                <span></span>
                            </li>
                            <li class="calendarNormal month2 anim04c">
                                <span></span>
                            </li>
                        </div>
                    </div>
                    <!-- main codes end -->


                    <div class="designer anim04c">
                        <li>
                        </li>
                    </div>


                    <h1 class="title">สัญญาเว็บไซต์</h1>
                    <h3 class="subtitle">{{url('/')}}</h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="#">
                                        <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                                            <center><i class="fa fa-calendar" style="color:#16A085"></i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h4>@สัญญาเริ่มวันที่
                                                <div class="pull-right badge">@foreach($domains as $domain) {{formatDateThaiDMY($domain->start_domain)}}</div>
                                            </h4>
                                            @php
                                                $start_date = \Carbon\Carbon::now();
                                                  $end_date = \Carbon\Carbon::createFromFormat('Y-m-d', $domain->end_domain);
                                                  $different_days = $start_date->diffInDays($end_date);
                                            @endphp

                                            @php
                                                $today = \Carbon\Carbon::now();
                                                $start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $domain->start_domain);
                                                $different_daysCount = $start_date->diffInDays($today);
                                            @endphp

                                            @endforeach

                                            {{--            <p class="card__followers">followers</p>--}}
                                            <div class="card__change">
                                                <div class="card__triangle-up"></div>
                                                <span>{{$different_daysCount}} วัน</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="#">
                                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                            <center><i class = "fa fa-calendar" style="color:#d50f25"></i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h4>@สัญญาสิ้นสุด
                                                <div class="pull-right badge" id="WrControls">@foreach($domains as $domain) {{formatDateThaiDMY($domain->end_domain)}} @endforeach</div></h4>
                                            <div class="card__change-down">
                                                <div class="card__triangle-down"></div>
                                                <span>{{$different_days}} วัน</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="#">
                                        <div class="wrimagecard-topimage_header" style="background-color:  rgba(213, 15, 37, 0.1)">
                                            <center><i class="fa fa-hdd-o" style="color:#16A085"> </i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title" >
                                            <h4>พื้นที่เว็บไซต์
                                                <div class="pull-right badge" id="WrForms">{{number_format($domain->hd_quota),2}} MB</div>
                                            </h4>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="#">
                                        <div class="wrimagecard-topimage_header" style="background-color:  rgba(51, 105, 232, 0.1)">
                                            <center><i class="fa fa-hdd-o" style="color:#3369e8"> </i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h4>พื้นที่คงเหลือ
                                                <div class="pull-right badge" id="WrGridSystem">{{number_format($domain->hd_quota-formatBytes($folder_calculate)),2}} MB</div></h4>
                                            <div class="card__change-down">
                                                <div class="card__triangle-down"></div>
                                                ใช้ไป {{formatBytes($folder_calculate)}} MB
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            {{--                                <div class="col-md-3 col-sm-4">--}}
                            {{--                                    <div class="wrimagecard wrimagecard-topimage">--}}
                            {{--                                        <a href="#">--}}
                            {{--                                            <div class="wrimagecard-topimage_header" style="background-color:  rgba(250, 188, 9, 0.1)">--}}
                            {{--                                                <center><i class="fa fa-info-circle" style="color:#fabc09"> </i></center>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="wrimagecard-topimage_title">--}}
                            {{--                                                <h4>Information--}}
                            {{--                                                    <div class="pull-right badge" id="WrInformation"></div></h4>--}}
                            {{--                                            </div>--}}

                            {{--                                        </a>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-md-3 col-sm-4">--}}
                            {{--                                    <div class="wrimagecard wrimagecard-topimage">--}}
                            {{--                                        <a href="#">--}}
                            {{--                                            <div class="wrimagecard-topimage_header" style="background-color: rgba(121, 90, 71, 0.1)">--}}
                            {{--                                                <center><i class="fa fa-bars" style="color:#795a47"> </i></center>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="wrimagecard-topimage_title">--}}
                            {{--                                                <h4>Navigation--}}
                            {{--                                                    <div class="pull-right badge" id="WrNavigation"></div></h4>--}}
                            {{--                                            </div>--}}

                            {{--                                        </a>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-md-3 col-sm-4">--}}
                            {{--                                    <div class="wrimagecard wrimagecard-topimage">--}}
                            {{--                                        <a href="#">--}}
                            {{--                                            <div class="wrimagecard-topimage_header" style="background-color: rgba(130, 93, 9, 0.1)">--}}
                            {{--                                                <center><i class="fa fa-magic" style="color:#825d09"></i></center>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="wrimagecard-topimage_title">--}}
                            {{--                                                <h4>Themes & Icons--}}
                            {{--                                                    <div class="pull-right badge" id="WrThemesIcons"></div></h4>--}}
                            {{--                                            </div>--}}
                            {{--                                        </a>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="container-fluid">
                            {{--                            <div class="card">--}}
                            {{--                                <p class="card__name"><i class="icon fa fa-calendar" aria-hidden="true"></i><span>@สัญญาเริ่มวันที่</span></p>--}}
                            {{--                                <p class="card__number"> @foreach($domains as $domain) {{formatDateThaiDMY($domain->start_domain)}} @endforeach </p>--}}
                            {{--                                @php--}}
                            {{--                                    $start_date = \Carbon\Carbon::now();--}}
                            {{--                                      $end_date = \Carbon\Carbon::createFromFormat('Y-m-d', $domain->end_domain);--}}
                            {{--                                      $different_days = $start_date->diffInDays($end_date);--}}
                            {{--                                @endphp--}}

                            {{--                                @php--}}
                            {{--                                    $today = \Carbon\Carbon::now();--}}
                            {{--                                    $start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $domain->start_domain);--}}
                            {{--                                    $different_daysCount = $start_date->diffInDays($today);--}}
                            {{--                                @endphp--}}

                            {{--                                --}}{{--            <p class="card__followers">followers</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    <div class="card__triangle-up"></div>--}}
                            {{--                                    <span>{{$different_daysCount}} วัน</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD-->--}}
                            {{--                            <div class="card">--}}
                            {{--                                <p class="card__name"><i class="icon fa fa-calendar" aria-hidden="true"></i><span>@สัญญาสิ้นสุดวันที่</span></p>--}}
                            {{--                                <p class="card__number">@foreach($domains as $domain) {{formatDateThaiDMY($domain->end_domain)}} @endforeach </p>--}}
                            {{--                                --}}{{--            <p class="card__followers">followers</p>--}}
                            {{--                                <div class="card__change-down">--}}
                            {{--                                    <div class="card__triangle-down"></div>--}}
                            {{--                                    <span>{{$different_days}} วัน</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD-->--}}
                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin: 0 auto">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="#">
                                        <div class="wrimagecard-topimage_title" style="height: 430px;text-align: center">
                                            <p class="card__number" style="color: green">@foreach($domains as $domain) {{number_format($domain->hd_quota-formatBytes($folder_calculate)),2}} MB  @endforeach </p>
                                            {{--                                            {{number_format(($domain->hd_quota-formatBytes($folder_calculate))/1024,2)}} GB--}}


                                            {{--            <p class="card__followers">followers</p>--}}
                                            <label>ใช้ไปแล้ว {{formatBytes($folder_calculate)}} MB</label>
                                            <div class="card__triangle-down" style="margin: 0 auto"></div>
                                            <div class="card__change-down">
                                                <label style="margin: 0 auto">จากทั้งหมด {{($domain->hd_quota)}} MB </label>
                                            </div>  <!-- calculate percent ($usehd_quota*100)/hd_quota   &&& progressbar for status disk-->
                                            {{--                                <div class="box-progress progress-1" style="margin: 0 auto" data-count="0" percent="{{formatBytes($folder_calculate)*100/$domain->hd_quota}}">--}}
                                            {{--                                    <div>--}}
                                            {{--                                    <svg class="progress" xmlns="http://www.w3.org/2000/svg">--}}
                                            {{--                                        <circle class="progress-bg" r="90" />--}}
                                            {{--                                        <circle class="progress-bar" r="90" />--}}
                                            {{--                                    </svg>--}}
                                            {{--                                    </div>--}}   {{-- old circle can't run firefox--}}

                                            <div class="box-progress progress-1" style="margin: 0 auto">
                                                <li class="List-item" style="list-style: none">
                                                    <div class="ProgressBar ProgressBar--animateAll" data-progress="{{formatBytes($folder_calculate)*100/$domain->hd_quota}}">
                                                        <svg class="ProgressBar-contentCircle">
                                                            <!-- on défini le l'angle et le centre de rotation du cercle -->
                                                            <circle transform="rotate(-90, 100, 100)" class="ProgressBar-background" cx="100" cy="100" r="95" />
                                                            <circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle" cx="100" cy="100" r="95" />
                                                            <span class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                                                        </svg>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- CARD-->
                    {{--        <div class="card__ig">--}}
                    {{--            <p class="card__name"><i class="icon fa fa-instagram" aria-hidden="true"></i><span>@RamosDev</span></p>--}}
                    {{--            <p class="card__number">11k</p>--}}
                    {{--            <p class="card__followers">followers</p>--}}
                    {{--            <div class="card__change">--}}
                    {{--                <div class="card__triangle-up"></div>--}}
                    {{--                <span>1099 Today</span>--}}
                    {{--            </div>--}}
                    {{--        </div><!-- CARD-->--}}
                    {{--        <div class="card card__yt">--}}
                    {{--            <p class="card__name"><i class="icon fa fa-youtube-play" aria-hidden="true"></i><span>@RamosDev</span></p>--}}
                    {{--            <p class="card__number">8239</p>--}}
                    {{--            <p class="card__followers">followers</p>--}}
                    {{--            <div class="card__change-down">--}}
                    {{--                <div class="card__triangle-down"></div>--}}
                    {{--                <span>1443 Today</span>--}}
                    {{--            </div>--}}
                    {{--        </div><!-- CARD-->--}}
                    <!-- SMALL CARDS -->

                        @php

                            function formatDateThaiDMY($strDate)
                            {
                                $strYear = date("Y",strtotime($strDate))+543;
                                $strMonth= date("n",strtotime($strDate));
                                $strDay= date("j",strtotime($strDate));
                                $strHour= date("H",strtotime($strDate));
                                $strMinute= date("i",strtotime($strDate));
                                $strSeconds= date("s",strtotime($strDate));
                                $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                $strMonthThai=$strMonthCut[$strMonth];
                                return "$strDay $strMonthThai $strYear";
                            }

                        @endphp

                    </div><!-- CONTAINER -->

                    <script>
                        function progressCircle(boxTarget){
                            var value = $(''+boxTarget+'').attr('percent'),
                                progressBar = $(''+boxTarget+' .progress-bar'),
                                countText = $(''+boxTarget+''),
                                delayAnimateProgress = 500;

                            var radius = progressBar.attr('r'),
                                progressBarDefault = 2 * Math.PI * radius;

                            var durationCount,
                                progress,
                                dashoffset;

                            var count,
                                maxCount;


                            if(value < 0) value = 0;
                            if(value > 100) value = 100;

                            durationCount = 450 / value;
                            progress = value / 100;
                            dashoffset = progressBarDefault * (1 - progress);

                            count = 0;
                            maxCount = value;

                            // Set Defualt
                            progressBar.css({'stroke-dasharray':progressBarDefault, 'stroke-dashoffset':progressBarDefault});

                            setTimeout(function(){
                                progressBar.css({'stroke-dashoffset':dashoffset});

                                var animateCount = setInterval(function(){
                                    if(count < maxCount){
                                        count++;
                                        countText.attr('data-count', count);
                                    } else{
                                        clearInterval(animateCount);
                                    }
                                }, durationCount);
                            }, delayAnimateProgress);
                        }

                        progressCircle('.progress-1');
                        progressCircle('.progress-2');
                    </script>
                    <h1 class="title">ระหว่างวันที่ {{formatDateThaiDMY($firstDayofMonth)}} - {{formatDateThaiDMY($lastDayofMonth)}}</h1>
                    <div class="container-fluid">
                        <div class="row">
                            {{--                            <div class="col-md-3 col-sm-4">--}}
                            {{--                                <div class="wrimagecard wrimagecard-topimage">--}}
                            {{--                                    --}}
                            {{--                                    <span>กิจกรรม </span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$countactivitys}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>78%</span>--}}
                            {{--                                </div>--}}

                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm" style="color: orange">{{$countactivityalls}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>78%</span>--}}
                            {{--                                </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}

                            <div class="col-lg-6 col-md-12 col-sm-12" style="margin: 0 auto">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="{{url('/wms/catalog/activity')}}">
                                        <div class="wrimagecard-topimage_header" style="background-color:  rgba(250, 188, 9, 0.1)">
                                            <center><i class="fa fa-tasks" style="color:#fabc09"> </i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h4>กิจกรรม
                                                <div class="pull-right badge" id="WrGridSystem">อัปโหลด <font style="text-decoration: underline;">{{$countactivitys}}</font> กิจกรรม</div></h4>
                                            <div class="card__change">
                                                <div class="card__triangle-up"></div>
                                                รวมทั้งหมด {{$countactivityalls}} กิจกรรม
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            {{--                            <div class="card-small">--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>ภาพกิจกรรม</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$countphotoactivitys}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>8%</span>--}}
                            {{--                                </div>--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm">{{$countphotoactivityalls}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>8%</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}
                            {{--                            <div class="card-small">--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>ภาพการท่องเที่ยว</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$countphototravels}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>1250%</span>--}}
                            {{--                                </div>--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm">{{$countphototravelalls}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>1250%</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}
                            <div class="col-lg-6 col-md-12 col-sm-12" style="margin: 0 auto">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="{{url('/wms/catalog/mission')}}">
                                        <div class="wrimagecard-topimage_header" style="background-color:  rgba(121, 90, 71, 0.1)">
                                            <center><i class="fa fa-bullseye" style="color:#795a47"> </i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h4>ภารกิจ
                                                <div class="pull-right badge" id="WrGridSystem">อัปโหลด <font style="text-decoration: underline;">{{$countmissions_m}}</font> กิจกรรม</div></h4>
                                            <div class="card__change">
                                                <div class="card__triangle-up"></div>
                                                รวมทั้งหมด {{$countmissionalls}} ภารกิจ
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="{{url('/wms/catalog/news')}}">
                                        <div class="wrimagecard-topimage_header" style="background-color: rgba(51, 105, 232, 0.1)">
                                            <center><i class="fa fa-newspaper-o" style="color:#3b5998"> </i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h4>ข่าวประชาสัมพันธ์
                                                <div class="pull-right badge" id="WrGridSystem">อัปโหลด <font style="text-decoration: underline;">{{$countnew_m}}</font> ข่าวประชาสัมพันธ์</div></h4>
                                            <div class="card__change" style="width: 100%">
                                                <div class="card__triangle-up"></div>
                                                รวมทั้งหมด {{$countnewalls}} ข่าวประชาสัมพันธ์
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="{{url('/wms/travel/travel')}}">
                                        <div class="wrimagecard-topimage_header" style="background-color:  rgba(250, 188, 9, 0.1)">
                                            <center><i class="fa fa-car" style="color:#fabc09"> </i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h4>ท่องเที่ยว
                                                <div class="pull-right badge" id="WrGridSystem">อัปโหลด <font style="text-decoration: underline;">{{$counttravel_m}}</font> สถานที่ท่องเที่ยว</div></h4>
                                            <div class="card__change" style="width: 100%">
                                                <div class="card__triangle-up"></div>
                                                รวมทั้งหมด {{$counttravelalls}} สถานที่ท่องเที่ยว
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="{{url('/wms/travel/otops')}}">
                                        <div class="wrimagecard-topimage_header" style="background-color:  rgba(250, 188, 9, 0.1)">
                                            <center><i class="fa fa-cubes" style="color:green"> </i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h4>สินค้าพื้นบ้าน
                                                <div class="pull-right badge" id="WrGridSystem">อัปโหลด <font style="text-decoration: underline;">{{$counttravel_m}}</font> ผลิตภัณฑ์</div></h4>
                                            <div class="card__change" style="width: 100%">
                                                <div class="card__triangle-up"></div>
                                                รวมทั้งหมด {{$counttravelalls}} ผลิตภัณฑ์
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="wrimagecard wrimagecard-topimage">
                                    <a href="{{url('/wms/youtube')}}">
                                        <div class="wrimagecard-topimage_header" style="background-color:  rgba(250, 188, 9, 0.1)">
                                            <center><i class="fa fa-youtube-play" style="color:red"> </i></center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h4>วีดีโอ
                                                <div class="pull-right badge" id="WrGridSystem">อัปโหลด <font style="text-decoration: underline;">{{$counttravel_m}}</font> คลิป</div></h4>
                                            <div class="card__change" style="width: 100%">
                                                <div class="card__triangle-up"></div>
                                                รวมทั้งหมด {{$counttravelalls}} คลิป
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            {{--                            <div class="card-small">--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>ภารกิจ</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$countmissions_m}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>1250%</span>--}}
                            {{--                                </div>--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm" style="color: orange">{{$countmissionalls}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>1250%</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}
                            {{--                            <div class="card-small">--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>สถานที่ท่องเที่ยว</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$counttravel_m}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>25%</span>--}}
                            {{--                                </div>--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm" style="color: orange">{{$counttravelalls}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>25%</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}
                            {{--                            <div class="card-small">--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>สินค้าพื้นบ้าน</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$countotop_m}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>25%</span>--}}
                            {{--                                </div>--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm" style="color: orange">{{$countotopalls}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>25%</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}
                            {{--                            <div class="card-small">--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>ประชาสัมพันธ์</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$countnew_m}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>80%</span>--}}
                            {{--                                </div>--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm" style="color: orange">{{$countnewalls}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>80%</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}
                            {{--                            <div class="card-small">--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>แบนเนอร์</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$countphotobanners}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>25%</span>--}}
                            {{--                                </div>--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm" style="color: orange">{{$countphotobanneralls}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>25%</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}

                            {{--                            <div class="card-small">--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>ภาพข่าวประขาสัมพันธ์</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$countphotonews}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>100%</span>--}}
                            {{--                                </div>--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm">{{$countphotonewalls}}</p>--}}
                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>100%</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}
                            {{--                            <div class="card-small">--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>วีดีโอ</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa-youtube-play" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number">{{$countyoutubes}}</p>--}}

                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>50%</span>--}}
                            {{--                                </div>--}}
                            {{--                                <p class="card__name">--}}
                            {{--                                    <span>รวมทั้งหมด</span>--}}
                            {{--                                </p>--}}
                            {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
                            {{--                                <p class="card__number__sm" style="color: orange">{{$countyoutubealls}}</p>--}}

                            {{--                                <div class="card__change">--}}
                            {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
                            {{--                                    --}}{{--                <span>50%</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- CARD small-->--}}
                        </div>
                    </div><!-- CONTAINER -->


                    <div class="col-lg-12 col-sm-12">
                        <div class="wrimagecard wrimagecard-topimage">
                            <div class="wrimagecard-topimage_title" style="height: 380px;text-align: center">
                                <h1 class="title">การใช้งาน E-Service</h1>
                                {{--                            <h1 class="title">E-Service ระหว่างวันที่ {{formatDateThaiDMY($firstDayofMonth)}} - {{formatDateThaiDMY($lastDayofMonth)}}</h1>--}}

                                <div class="flip-card1" style="margin-top: -5%">
                                    <div class="card1-item" >
                                        <label>ร้องเรียนร้องทุกข์</label>
                                        <label>
                                            <input type="checkbox"/>
                                            <div class="card1">
                                                <div class="front1 pink"><p>{{$counthelpmealls}}</p></div>
                                                <div class="back"><p>TEST</p></div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="card1-item">
                                        <label>ร้องเรียนการทุจริต</label>
                                        <label>
                                            <input type="checkbox"/>
                                            <div class="card1">
                                                <div class="front1 orange"><p>{{$countcorruptionalls}}</p></div>
                                                <div class="back"><p>TEST</p></div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="card1-item">
                                        <label>ชำระภาษี</label>
                                        <label>
                                            <input type="checkbox"/>
                                            <div class="card1">
                                                <div class="front1 blue"><p>{{$countpaytaxalls}}</p></div>
                                                <div class="back"><p>TEST</p></div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                            <div class="flip-card1">--}}
                        {{--                                <div class="card1-item" >--}}
                        {{--                                    <label>ร้องเรียนร้องทุกข์</label>--}}
                        {{--                                    <label>--}}
                        {{--                                        <input type="checkbox"/>--}}
                        {{--                                        <div class="card1">--}}
                        {{--                                            <div class="front pink"><p>ร้องทุกข์</p></div>--}}
                        {{--                                            <div class="back"><p>HELLO</p></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="card1-item">--}}
                        {{--                                    <label>ร้องเรียนการทุจริต</label>--}}
                        {{--                                    <label>--}}
                        {{--                                        <input type="checkbox"/>--}}
                        {{--                                        <div class="card1">--}}
                        {{--                                            <div class="front orange"><p>PIKA</p></div>--}}
                        {{--                                            <div class="back"><p>CHU</p></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="card1-item">--}}
                        {{--                                    <label>ชำระภาษี</label>--}}
                        {{--                                    <label>--}}
                        {{--                                        <input type="checkbox"/>--}}
                        {{--                                        <div class="card1">--}}
                        {{--                                            <div class="front blue"><p></p></div>--}}
                        {{--                                            <div class="back"><p></p></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </label>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                    </div>



    {{--                        <h1 class="title">Overview Counter</h1>--}}
    {{--                        <div class="container">--}}
    {{--                            <div class="card-small" style="background-color: #d2ddf5">--}}
    {{--                                <p class="card__name">--}}
    {{--                                    <span>กิจกรรม </span>--}}
    {{--                                </p>--}}
    {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
    {{--                                <p class="card__number">{{$countactivityalls}}</p>--}}
    {{--                                <div class="card__change">--}}
    {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
    {{--                                    --}}{{--                <span>78%</span>--}}
    {{--                                </div>--}}
    {{--                            </div><!-- CARD small-->--}}
    {{--                            <div class="card-small" style="background-color: #d2ddf5">--}}
    {{--                                <p class="card__name">--}}
    {{--                                    <span>ภาพกิจกรรม</span>--}}
    {{--                                </p>--}}
    {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
    {{--                                <p class="card__number">{{$countphotoactivityalls}}</p>--}}
    {{--                                <div class="card__change">--}}
    {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
    {{--                                    --}}{{--                <span>8%</span>--}}
    {{--                                </div>--}}
    {{--                            </div><!-- CARD small-->--}}
    {{--                            <div class="card-small" style="background-color: #d2ddf5">--}}
    {{--                                <p class="card__name">--}}
    {{--                                    <span>ภาพการท่องเที่ยว</span>--}}
    {{--                                </p>--}}
    {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
    {{--                                <p class="card__number">{{$countphototravelalls}}</p>--}}
    {{--                                <div class="card__change">--}}
    {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
    {{--                                    --}}{{--                <span>1250%</span>--}}
    {{--                                </div>--}}
    {{--                            </div><!-- CARD small-->--}}
    {{--                            <div class="card-small" style="background-color: #d2ddf5">--}}
    {{--                                <p class="card__name">--}}
    {{--                                    <span>ภาพภารกิจ</span>--}}
    {{--                                </p>--}}
    {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
    {{--                                <p class="card__number">{{$countphotomissionalls}}</p>--}}
    {{--                                <div class="card__change">--}}
    {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
    {{--                                    --}}{{--                <span>1250%</span>--}}
    {{--                                </div>--}}
    {{--                            </div><!-- CARD small-->--}}
    {{--                            <div class="card-small" style="background-color: #d2ddf5">--}}
    {{--                                <p class="card__name">--}}
    {{--                                    <span>แบนเนอร์</span>--}}
    {{--                                </p>--}}
    {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
    {{--                                <p class="card__number">{{$countphotobanneralls}}</p>--}}
    {{--                                <div class="card__change">--}}
    {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
    {{--                                    --}}{{--                <span>25%</span>--}}
    {{--                                </div>--}}
    {{--                            </div><!-- CARD small-->--}}
    {{--                            <div class="card-small" style="background-color: #d2ddf5">--}}
    {{--                                <p class="card__name">--}}
    {{--                                    <span>ข่าวประชาสัมพันธ์</span>--}}
    {{--                                </p>--}}
    {{--                                <i class="icon fa" aria-hidden="true"></i>--}}
    {{--                                <p class="card__number">{{$countnewalls}}</p>--}}
    {{--                                <div class="card__change">--}}
    {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
    {{--                                    --}}{{--                <span>80%</span>--}}
    {{--                                </div>--}}
    {{--                            </div><!-- CARD small-->--}}
    {{--                            <div class="card-small" style="background-color: #d2ddf5">--}}
    {{--                                <p class="card__name">--}}
    {{--                                    <span>ภาพข่าวประขาสัมพันธ์</span>--}}
    {{--                                </p>--}}
    {{--                                <i class="icon fa fa" aria-hidden="true"></i>--}}
    {{--                                <p class="card__number">{{$countphotonewalls}}</p>--}}
    {{--                                <div class="card__change">--}}
    {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
    {{--                                    --}}{{--                <span>100%</span>--}}
    {{--                                </div>--}}
    {{--                            </div><!-- CARD small-->--}}
    {{--                            <div class="card-small" style="background-color: #d2ddf5">--}}
    {{--                                <p class="card__name">--}}
    {{--                                    <span>วีดีโอ</span>--}}
    {{--                                </p>--}}
    {{--                                <i class="icon fa fa-youtube-play" aria-hidden="true"></i>--}}
    {{--                                <p class="card__number">{{$countyoutubealls}}</p>--}}

    {{--                                <div class="card__change">--}}
    {{--                                    --}}{{--                <div class="card__triangle-up"></div>--}}
    {{--                                    --}}{{--                <span>50%</span>--}}
    {{--                                </div>--}}
    {{--                            </div><!-- CARD small-->--}}

    {{--                        </div><!-- CONTAINER -->--}}
    </body>
    </html>

    <body class="dashboard">


    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-8 pl-5">
                <h2>สรุปข้อมูลเว็บไซต์รายวัน </h2>
            </div>
            {{--                <div class="col-lg-4  pt-2">--}}
            {{--                    <p class="time">20/12/2018 10:23:45</p>--}}
            {{--                </div>--}}
        </div>
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="wrimagecard wrimagecard-topimage">
                    <div class="wrimagecard-topimage_title" style="text-align: center">
                        <h2 class="mt-4 text-dark">1839<small></small></h2>
                    </div>
                    <canvas id="payments-chart" style="max-height:300px"></canvas>
                    <div style="padding: 15px;margin-left:5%;text-align: center;cursor: pointer">
                        <label style="margin: 0 auto;text-align: center">เมื่อวาน , วันนี้ , รวมทั้งหมด</label>
                        <div class="counter" data-count="0">0</div>
                        <div class="counter" data-count="5">0</div>
                        <div class="counter" data-count="1839">0</div>
                    </div>

                </div>

                {{--            <div class="card p-4 " style="background-color: #ffffff">--}}
                {{--                <div class="card-header bg-transparent border-bottom-0">อัพโหลด <em class=""></em><br>--}}
                {{--                    <h2 class="mt-4 text-dark"><i class="fa fa-arrow-up text-success"></i> 53<small>%</small></h2>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <canvas id="sales-chart" style="max-height:300px"></canvas>--}}
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="wrimagecard wrimagecard-topimage">
                    <div class="wrimagecard-topimage_title" style="text-align: center">
                        <h2 class="mt-4 text-dark">25<small></small></h2>
                    </div>
                    <canvas id="sales-chart" style="max-height:300px"></canvas>
                    <div style="padding: 15px;margin-left:5%;text-align: center;cursor:pointer;">
                        <label style="margin: 0 auto;text-align: center">เมื่อวาน , วันนี้ , รวมทั้งหมด</label>
                        <div class="counter2" data-count2="10">0</div>
                        <div class="counter2" data-count2="5">0</div>
                        <div class="counter2" data-count2="25">0</div>
                    </div>
                </div>

                {{--                            <div class="card p-4 " style="background-color: #ffffff">--}}
                {{--                                <div class="card-header bg-transparent border-bottom-0">อัพโหลด <em class=""></em><br>--}}
                {{--                                    <h2 class="mt-4 text-dark"><i class="fa fa-arrow-up text-success"></i> 53<small>%</small></h2>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <canvas id="sales-chart" style="max-height:300px"></canvas>--}}
            </div>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="wrimagecard wrimagecard-topimage">
                <div class="wrimagecard-topimage_title" style="height:350px;text-align: center">
                    <div class="card-header bg-transparent border-bottom-0">สรุปผลการประเมินความพึงพอใจ <i class=""></i></div>
                    <div class="row text-center mt-5">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <span class="text-light-grey">Negative</span>
                                </div>
                                <div class="col-12 mt-4">
                                    <h2><i class="bg-frown fa fa-frown fa-5x"> </i></h2>
                                </div>

                                <div class="col-12 mt-4">
                                    <h2 class="text-dark"> 25<small>%</small></h2>
                                </div>
                                <div class="col-12 mt-1">
                                    {{--                            <span class="text-light-grey">1 reviews</span>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <span class="text-light-grey">Positive</span>
                                </div>
                                <div class="col-12 mt-4">

                                    <h2><i class="bg-happy fa fa-smile fa-5x bg-happy"></i></h2>

                                </div>
                                <div class="col-12 mt-4">
                                    <h2 class="text-dark"> 75<small>%</small></h2>
                                </div>
                                <div class="col-12 mt-1">
                                    {{--                            <span class="text-light-grey">3 reviews</span>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    {{--    <div class="row mt-5 card-deck px-3">--}}

    {{--        <div class="card p-3" style="background-color: #ffffff">Test block</div>--}}

    {{--        <div class="card p-3" style="background-color: #ffffff">Test block</div>--}}

    {{--        <div class="card p-3" style="background-color: #ffffff">Test block</div>--}}

    {{--        <div class="card p-3" style="background-color: #ffffff">Test block</div>--}}

    {{--        <div class="card p-3" style="background-color: #ffffff">Test block</div>--}}

    {{--    </div>--}}

    {{--    <div class="container-fluid">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-12">--}}
    {{--                <h1 class="text-center mt-5">DashBoard</h1>--}}

    {{--                <p>สัญญาเริ่มวันที่ : @foreach($domains as $domain) {{$domain->start_domain}} @endforeach </p>--}}

    {{--                <p>สัญญาสิ้นสุดวันที่ : @foreach($domains as $domain) {{$domain->end_domain}} @endforeach </p>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="col-lg-3 d-none d-lg-block">--}}
    {{--            <div class="card border-0 h-100">--}}
    {{--                <div class="card-body" style="background-color: #ffffff">--}}
    {{--                    <p class="card-text mb-2">--}}
    {{--                    <h5 class="card-title">สวัสดี , {{session('username')}}</h5>--}}
    {{--                    </p>--}}
    {{--                    <p class="card-text mb-2">--}}
    {{--                    <h6 class="card-subtitle text-muted">นี่คือข้อมูลเกี่ยวกับ {{$title}}</h6>--}}
    {{--                    </p>--}}

    {{--                    <p class="text-truncate">--}}
    {{--                        <a class="card-link" href="#!"title="แก้ไข" @click="viewData(statistics.id)">--}}

    {{--                        </a>--}}
    {{--                    </p>--}}
    {{--                    <p class="card-text mb-2">--}}
    {{--                        จำนวนการเข้าชม 50 <i class="fa fa-eye text-primary"></i>--}}
    {{--                    </p>--}}
    {{--                    <p class="card-text mb-2">จำนวนข้อมูลทั้งหมด @{{ statistics.record }} record</p>--}}
    {{--                    <p class="card-text mb-2">--}}
    {{--                        จำนวนการเข้าชมทั้งหมด 1 <i class="fa fa-eye text-primary"></i>--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}

    {{--        <div class="row">--}}
    {{--            <div class="col-12">--}}
    {{--                <h1 class="text-center mt-5">Activity on Web</h1>--}}
    {{--                <p>กิจกรรมอัพโหลดเดือนนี้ : {{$countactivitys}} กิจกรรม</p>--}}
    {{--                <ul>--}}
    {{--                    <li>ภาพกิจกรรม : {{$countphotoactivitys}} ภาพ</li>--}}
    {{--                    <li>ภาพการท่องเที่ยว : {{$countphototravels}} ภาพ</li>--}}
    {{--                    <li>ภาพภารกิจ : {{$countphotomissions}} ภาพ</li>--}}
    {{--                    <li>แบนเนอร์ : {{$countphotobanners}} ภาพ</li>--}}
    {{--                </ul>--}}
    {{--                <p>ข่าวประชาสัมพันธ์ : {{$countnews}} ข่าว </p>--}}
    {{--                <ul>--}}
    {{--                    <li>ภาพข่าวประขาสัมพันธ์ : {{$countphotoactivitys}} ภาพ</li>--}}
    {{--                    <li>วีดีโอ : {{$countyoutubes}} วีดีโอ</li>--}}
    {{--                </ul>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    <script>
        $(document).ready(function () {

            var monthNames = [ "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" ];
            var dayNames= [ "อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัส","ศุกร์","เสาร์" ];

            var newDate = new Date();
            newDate.setDate(newDate.getDate());

            setInterval( function() {
                var hours = new Date().getHours();
                $(".hour").html(( hours < 10 ? "0" : "" ) + hours);
                var seconds = new Date().getSeconds();
                $(".second").html(( seconds < 10 ? "0" : "" ) + seconds);
                var minutes = new Date().getMinutes();
                $(".minute").html(( minutes < 10 ? "0" : "" ) + minutes);

                $(".month span,.month2 span").text(monthNames[newDate.getMonth()]);
                $(".date span,.date2 span").text(newDate.getDate());
                $(".day span,.day2 span").text(dayNames[newDate.getDay()]);
                $(".year span").html(newDate.getFullYear());
            }, 1000);



            $(".outer").on({
                mousedown:function(){
                    $(".dribbble").css("opacity","1");
                },
                mouseup:function(){
                    $(".dribbble").css("opacity","0");
                }
            });



        });
    </script>
    <script>
        $('.counter').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');

            $({ countNum: $this.text()}).animate({
                    countNum: countTo
                },

                {

                    duration: 5000,
                    easing:'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                        //alert('finished');
                    }

                });



        });
        $('.counter2').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count2');

            $({ countNum: $this.text()}).animate({
                    countNum: countTo
                },

                {

                    duration: 5000,
                    easing:'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                        //alert('finished');
                    }

                });



        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script>
        (function ($){

            $.fn.bekeyProgressbar = function(options){

                options = $.extend({
                    animate     : true,
                    animateText : true
                }, options);

                var $this = $(this);

                var $progressBar = $this;
                var $progressCount = $progressBar.find('.ProgressBar-percentage--count');
                var $circle = $progressBar.find('.ProgressBar-circle');
                var percentageProgress = $progressBar.attr('data-progress');
                var percentageRemaining = (100 - percentageProgress);
                var percentageText = $progressCount.parent().attr('data-progress');

                //Calcule la circonférence du cercle
                var radius = $circle.attr('r');
                var diameter = radius * 2;
                var circumference = Math.round(Math.PI * diameter);

                //Calcule le pourcentage d'avancement
                var percentage =  circumference * percentageRemaining / 100;

                $circle.css({
                    'stroke-dasharray' : circumference,
                    'stroke-dashoffset' : percentage
                })

                //Animation de la barre de progression
                if(options.animate === true){
                    $circle.css({
                        'stroke-dashoffset' : circumference
                    }).animate({
                        'stroke-dashoffset' : percentage
                    }, 3000 )
                }

                //Animation du texte (pourcentage)
                if(options.animateText == true){

                    $({ Counter: 0 }).animate(
                        { Counter: percentageText },
                        { duration: 3000,
                            step: function () {
                                $progressCount.text( Math.ceil(this.Counter) + '%');
                            }
                        });

                }else{
                    $progressCount.text( percentageText + '%');
                }

            };

        })(jQuery);

        $(document).ready(function(){

            $('.ProgressBar--animateNone').bekeyProgressbar({
                animate : false,
                animateText : false
            });

            $('.ProgressBar--animateCircle').bekeyProgressbar({
                animate : true,
                animateText : false
            });

            $('.ProgressBar--animateText').bekeyProgressbar({
                animate : false,
                animateText : true
            });

            $('.ProgressBar--animateAll').bekeyProgressbar();

        })
    </script>
    <script>
        $(document).ready(function() {
            $("#sidebar").click(function() {
                $("#extended").toggle();
            });
            $("#close-extended").click(function() {
                $("#extended").toggle();
            });
            // $("#users-tab").click(function(){
            // $('#extended').toggle()
            // })
        })
    </script>
    <script>
        var ctx = document.getElementById('payments-chart').getContext("2d");
        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(0, "rgba(250, 174, 229, 0.6)");
        gradientFill.addColorStop(1, "rgba(252, 140, 221, 0.1)");
        var options = {
            elements: {
                line: {
                    tension: 0
                }
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                    },
                }]
            },
        };
        let chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์", "อาทิตย์"],
                datasets: [{
                    label: "ยอดดูต่อวัน",
                    borderColor: '#D82583',
                    pointBorderColor: '#D82583',
                    pointBackgroundColor: '#D82583',
                    pointHoverBackgroundColor: '#D82583',
                    pointHoverBorderColor: '#D82583',
                    pointBorderWidth: 5,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 1,
                    pointRadius: 3,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 3,
                    data: [45, 60, 62, 50, 30, 37, 0]
                }]
            },
            options: {
                legend: {
                    position: "bottom"
                },
                elements: {
                    line: {
                        tension: 0
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "bold",
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            padding: 20
                        },
                        gridLines: {
                            drawTicks: false,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            zeroLineColor: "transparent"
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "bold"
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('sales-chart').getContext("2d");
        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(0, "rgba(225, 243, 252, 0.6)");
        gradientFill.addColorStop(1, "rgba(144, 218, 255, 0.6)");
        var options = {
            elements: {
                line: {
                    tension: 0
                }
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                    },
                }]
            },
        };
        let salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์","อาทิตย์"],
                datasets: [{
                    label: "อัปโหลดวันนี้",
                    borderColor: '#339FFF',
                    pointBorderColor: '#3358FF',
                    pointBackgroundColor: '#3358FF',
                    pointHoverBackgroundColor: '#3358FF',
                    pointHoverBorderColor: '#3358FF',
                    pointBorderWidth: 5,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 1,
                    pointRadius: 3,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 3,
                    data: [40, 10, 20, 5, 60, 2,0]
                }]
            },
            options: {
                tooltips: {
                    // Disable the on-canvas tooltip
                    enabled: false,
                    custom: function(tooltipModel) {
                        // Tooltip Element
                        var tooltipEl = document.getElementById('chartjs-tooltip');
                        // Create element on first render
                        if (!tooltipEl) {
                            tooltipEl = document.createElement('div');
                            tooltipEl.id = 'chartjs-tooltip';
                            tooltipEl.innerHTML = "<table></table>";
                            document.body.appendChild(tooltipEl);
                        }
                        // Hide if no tooltip
                        if (tooltipModel.opacity === 0) {
                            tooltipEl.style.opacity = 0;
                            return;
                        }
                        // Set caret Position
                        tooltipEl.classList.remove('above', 'below', 'no-transform');
                        if (tooltipModel.yAlign) {
                            tooltipEl.classList.add(tooltipModel.yAlign);
                        } else {
                            tooltipEl.classList.add('no-transform');
                        }

                        function getBody(bodyItem) {
                            return bodyItem.lines;
                        }
                        // Set Text
                        if (tooltipModel.body) {
                            var titleLines = tooltipModel.title || [];
                            var bodyLines = tooltipModel.body.map(getBody);
                            var innerHtml = '<thead>';
                            titleLines.forEach(function(title) {
                                innerHtml += '<tr><th>' + title + '</th></tr>';
                            });
                            innerHtml += '</thead><tbody>';
                            bodyLines.forEach(function(body, i) {
                                var colors = tooltipModel.labelColors[i];
                                var style = 'background:' + colors.backgroundColor;
                                style += '; border-color:' + colors.borderColor;
                                style += '; border-width: 5px';
                                var span = '<span style="' + style + '"></span>';
                                innerHtml += '<tr><td>' + span + body + '</td></tr>';
                            });
                            innerHtml += '</tbody>';
                            var tableRoot = tooltipEl.querySelector('table');
                            tableRoot.innerHTML = innerHtml;
                        }
                        // `this` will be the overall tooltip
                        var position = this._chart.canvas.getBoundingClientRect();
                        // Display, position, and set styles for font
                        tooltipEl.style.opacity = 1;
                        tooltipEl.style.position = 'absolute';
                        tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
                        tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
                        tooltipEl.style.fontFamily = tooltipModel._bodyFontFamily;
                        tooltipEl.style.fontSize = tooltipModel.bodyFontSize + 'px';
                        tooltipEl.style.fontStyle = tooltipModel._bodyFontStyle;
                        tooltipEl.style.padding = tooltipModel.yPadding + 'px ' + tooltipModel.xPadding + 'px';
                        tooltipEl.style.pointerEvents = 'none';
                    }
                },
                legend: {
                    position: "bottom"
                },
                elements: {
                    line: {
                        tension: 0
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "bold",
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            padding: 20
                        },
                        gridLines: {
                            drawTicks: false,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            zeroLineColor: "transparent"
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "bold"
                        }
                    }]
                }
            }
        });
    </script>


    </body>


@endsection
