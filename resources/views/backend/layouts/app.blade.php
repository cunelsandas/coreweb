<!doctype html>
<html lang="en">
<head>
    @include('backend.layouts.head')
    @livewireStyles
</head>
<body class="sidebar-mini layout-navbar-fixed">
<div class="wrapper">
    @include('backend.layouts.navbar')
    @include('backend.layouts.sidebar')
    <div class="content-wrapper">
        <section class="content-header"></section>
        <section class="content">
            @yield('content')
        </section>
        <section class="content-header"></section>
    </div>
    @include('backend.layouts.footer')
</div>
<div id="sidebar-overlay" data-widget="pushmenu"></div>

</body>
</html>

