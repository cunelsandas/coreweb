<meta charset="utf-8">
<title>PHP Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
{{--<link href="{{ asset('assets/css/css2.css') }}" rel="stylesheet">--}}
{{--<link href="{{ asset('assets/css/cssmain.css') }}" rel="stylesheet">--}}
<link href="{{ asset('assets/css/bootstrap-4.4.1.css') }}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">

<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/owlcarousel/owl.theme.default.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/magnific/magnific-popup.css') }}">
{{--<link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">--}}
<link href="{{ asset('assets/font/fontawesome5/css/all.css') }}" rel="stylesheet">
<link href="{{ asset('assets/font/13font/13font.css') }}" rel="stylesheet">

<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-4.4.1.js') }}"></script>
<script src="{{ asset('assets/js/vue.min.js') }}"></script>
<script src="{{ asset('assets/js/axios.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/paginate.js') }}"></script>
<script src="{{asset('assets/plugins/daolpu/my-upload.js')}}"></script>

@include('frontend.default_layout2.layout.styles')