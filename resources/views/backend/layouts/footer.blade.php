<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.0
    </div>
    <strong>Copyright © <a href="http://itglobal.co.th" target="_blank">บริษัท ไอ.ที.โกลโบล จำกัด</a> โทรศัพท์.053-441700 / โทรสาร. 053-441224 / Line ID: itglobal / Email: itg007@hotmail.com</strong>
{{--    <strong>Copyright © 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights--}}
{{--    reserved.--}}
</footer>
<script>
    $('.nav-link').each((key, val) => {
        let isHref = $(val).attr('href'), originUrl = window.location.href,
            isActive = isHref === originUrl ? 'active' : '',isOpen = isHref === originUrl ? 'menu-open' : '';
        $(val).addClass(isActive);
        $(val).closest('ul.nav-treeview').closest('li.has-treeview').addClass(isOpen)
        $(val).closest('ul.nav-treeview').closest('li.has-treeview').find('.has-link').addClass(isActive);
    });
    $('.my-datepicker').datepicker({
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true,
        language: "th-th"
    });
</script>
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('assets/theme/adminlte3/dist/js/adminlte.js')}}"></script>
