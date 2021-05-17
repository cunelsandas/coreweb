<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}">
<title>@yield('title','ITG Manager')</title>
<link href="{{ asset('assets/theme/adminlte3/dist/css/adminlte.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/datepicker.css') }}" rel="stylesheet">
<link href="{{ asset('assets/font/fontawesome5/css/all.css') }}" rel="stylesheet">
<link href="{{ asset('assets/font/13font/13font.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/img-filter.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/vue.min.js') }}"></script>
<script src="{{ asset('assets/js/axios.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/paginate.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker-thai.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.th.js') }}"></script>
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script id="tiny-mce-asset" data-css="{{asset('assets/font/13font/13font.css')}}" data-upload="{{url('tiny')}}"
        src="{{ asset('assets/plugins/tinymce/tinymce.custom.js') }}"></script>
<script src="{{asset('assets/plugins/daolpu/my-upload.js')}}"></script>
