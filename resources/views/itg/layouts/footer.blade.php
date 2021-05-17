<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.0
    </div>
    <strong>Copyright © 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>
<script>
    let originUrl = window.location.href;
    $('.nav-link').each((key, val) => {
        let isHref = $(val).attr('href'), isActive = isHref === originUrl ? 'active' : '';
        $(val).addClass(isActive)
    });
    $('.my-datepicker').datepicker({
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true,
        language: "th-th"
    });
</script>
<script src="{{asset('assets/theme/adminlte3/dist/js/adminlte.js')}}"></script>
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
