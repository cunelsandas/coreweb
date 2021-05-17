<!doctype html>
<html lang="en">
<head>
    @include('frontend_layouts2.default_layout2.layout.head')
</head>

<body>
<div id="container_content">
    @include('frontend_layouts2.default_layout2.layout.topmenu')
    <div class="row">
        <div class="col-4">
        @include('frontend_layouts2.default_layout2.layout.sidebar')
        </div>
        <div class="col-xl-8 col-md-8 col-sm-12">
            <div id="content">
                @yield('content')
            </div>
        </div>
    </div>
    @include('frontend_layouts2.default_layout2.layout.footer')
</div>
</body>
</html>

