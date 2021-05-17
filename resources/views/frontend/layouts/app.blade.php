<!doctype html>
<html lang="en">
<head>
    @include('frontend.layouts.head')
</head>
<body>
@include('frontend.layouts.sidebar')
<div id="content">
    @yield('content')
</div>
<footer class="row">
@include('frontend.layouts.footer')
</footer>
</body>
</html>

