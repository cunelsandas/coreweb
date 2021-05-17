<!doctype html>
<html lang="en">
<head>
    @include('itg.layouts.head')
</head>
<body class="sidebar-mini layout-navbar-fixed">
<div class="wrapper">
    @include('itg.layouts.navbar')
    @include('itg.layouts.sidebar')
    <div class="content-wrapper">
        <section class="content-header"></section>
        <section class="content">
            @yield('content')
        </section>
        <section class="content-header"></section>
    </div>
    @include('itg.layouts.footer')
</div>
<div id="sidebar-overlay" data-widget="pushmenu"></div>
</body>
</html>

