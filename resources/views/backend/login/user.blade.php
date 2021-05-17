<!doctype html>
<html lang="en">
<head>
    @section('title','Login')
    @include('backend.layouts.head')
    <style>
        body{
            background-image: url({{url('upload/bg/loginwms.png')}});
            background-size: cover;
            background-repeat:no-repeat;
        }
        #content {
            min-height: 100vh;

        }

        #content::before {
            content: "";
            display: block;
            position: fixed;
            z-index: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
        }

        input {
            outline: none;
            border: none;
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        input:focus:-moz-placeholder {
            color: transparent;
        }

        input:focus::-moz-placeholder {
            color: transparent;
        }

        input:focus:-ms-input-placeholder {
            color: transparent;
        }

        textarea:focus::-webkit-input-placeholder {
            color: transparent;
        }

        textarea:focus:-moz-placeholder {
            color: transparent;
        }

        textarea:focus::-moz-placeholder {
            color: transparent;
        }

        textarea:focus:-ms-input-placeholder {
            color: transparent;
        }

        input::-webkit-input-placeholder {
            color: #fff;
        }

        input:-moz-placeholder {
            color: #fff;
        }

        input::-moz-placeholder {
            color: #fff;
        }

        input:-ms-input-placeholder {
            color: #fff;
        }

        label {
            margin: 0;
            display: block;
        }

        /*---------------------------------------------*/
        button {
            outline: none !important;
            border: none;
            background: transparent;
        }

        button:hover {
            cursor: pointer;
        }

        /*//////////////////////////////////////////////////////////////////
        [ login ]*/

        .limiter {
            width: 100%;
            margin: 0 auto;
        }

        .container-login100 {
            width: 100%;
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            z-index: 1;
        }

        .container-login100::before {
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .wrap-login100 {
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            padding: 55px 55px 37px 55px;
            background-color: rgba(0, 0, 0, 0.4);
            /*background: #9152f8;*/
            /*background: -webkit-linear-gradient(top, #7579ff, #b224ef);*/
            /*background: -o-linear-gradient(top, #7579ff, #b224ef);*/
            /*background: -moz-linear-gradient(top, #7579ff, #b224ef);*/
            /*background: linear-gradient(top, #7579ff, #b224ef);*/
        }

        /*------------------------------------------------------------------
        [ Form ]*/

        .login100-form {
            width: 100%;
        }

        .login100-form-logo {
            font-size: 60px;
            color: #333333;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #fff;
            margin: 0 auto;
        }

        .login100-form-title {
            font-size: 30px;
            color: #fff;
            line-height: 1.2;
            text-align: center;
            text-transform: uppercase;

            display: block;
        }


        /*------------------------------------------------------------------
        [ Input ]*/

        .wrap-input100 {
            width: 100%;
            position: relative;
            border-bottom: 2px solid rgba(255, 255, 255, 0.24);
            margin-bottom: 30px;
        }

        .input100 {
            font-size: 16px;
            color: #fff;
            line-height: 1.2;
            display: block;
            width: 100%;
            height: 45px;
            background: transparent;
            padding: 0 5px 0 38px;
        }

        /*---------------------------------------------*/
        .focus-input100 {
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .focus-input100::before {
            content: "";
            display: block;
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;

            background: #fff;
        }

        .focus-input100::after {
            color: #fff;
            content: attr(data-placeholder);
            display: block;
            width: 100%;
            position: absolute;
            top: 6px;
            left: 0;
            padding-left: 5px;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .input100:focus {
            padding-left: 5px;
        }

        .input100:focus + .focus-input100::after {
            top: -22px;
            font-size: 18px;
        }

        .input100:focus + .focus-input100::before {
            width: 100%;
        }

        .has-val.input100 + .focus-input100::after {
            top: -22px;
            font-size: 18px;
        }

        .has-val.input100 + .focus-input100::before {
            width: 100%;
        }

        .has-val.input100 {
            padding-left: 5px;
        }


        /*==================================================================

        [ Button ]*/
        .container-login100-form-btn {
            width: 100%;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .login100-form-btn {
            font-size: 16px;
            color: #555555;
            line-height: 1.2;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            min-width: 120px;
            height: 50px;
            border-radius: 25px;
            background: -webkit-linear-gradient(bottom, #7579ff, #b224ef);
            background: -o-linear-gradient(bottom, #7579ff, #b224ef);
            background: -moz-linear-gradient(bottom, #7579ff, #b224ef);
            background: linear-gradient(bottom, #7579ff, #b224ef);
            position: relative;
            z-index: 1;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .login100-form-btn::before {
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            border-radius: 25px;
            background-color: #fff;
            top: 0;
            left: 0;
            opacity: 1;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .login100-form-btn:hover {
            color: #1e7e34;
            background-color: #1e7e34;
        }

        /*------------------------------------------------------------------
        [ Responsive ]*/
        @media (max-width: 576px) {
            .wrap-login100 {
                padding: 55px 15px 37px 15px;
            }
        }
    </style>
</head>
<body>
<div id="content"
     style="background-image: url({{url('img/header.jpg')}}); background-repeat: no-repeat; background-size: 100% 100%">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 my-lg-5 my-5">
                <div class="wrap-login100 my-lg-5 my-5">
                    <form class="login100-form validate-form" method="POST" action="{{url('wms')}}">
                        <span class="login100-form-logo">
                        <i class="fa fa-user-alt">@csrf</i>
                    </span>
                        <span class="login100-form-title my-3">
                        Log in
                        </span>
                        <h6 class="text-danger text-center">
                            {{Session::get('error_login')}}
                        </h6>
                        <div class="wrap-input100 validate-input" data-validate="Enter username">
                            <input class="input100" type="text" name="username" placeholder="Username"
                                   autocomplete="off" required>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password" required>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                        {{-- <div class="text-center mt-2">
                             <a class="text-light" href="#">
                                 Forgot Password?
                             </a>
                         </div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    (function ($) {
        "use strict";
        $('.input100').each(function () {
            $(this).on('blur', function () {
                if ($(this).val().trim() != "") {
                    $(this).addClass('has-val');
                } else {
                    $(this).removeClass('has-val');
                }
            })
        });
    })(jQuery);
</script>
</body>
</html>
