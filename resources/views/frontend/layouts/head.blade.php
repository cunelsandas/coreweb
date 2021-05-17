<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}">
<title>@yield('title')</title>
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/owlcarousel/owl.theme.default.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/magnific/magnific-popup.css') }}">
{{--<link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">--}}
<link href="{{ asset('assets/font/fontawesome5/css/all.css') }}" rel="stylesheet">
<link href="{{ asset('assets/font/13font/13font.css') }}" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/vue.min.js') }}"></script>
<script src="{{ asset('assets/js/axios.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/paginate.js') }}"></script>
<script src="{{asset('assets/plugins/daolpu/my-upload.js')}}"></script>
<script src="https://kit.fontawesome.com/17c6c4d0fc.js" crossorigin="anonymous"></script>



@include('frontend.layouts.styles')


