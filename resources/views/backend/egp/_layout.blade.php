<script type="text/x-template" id="module-manage">
    <div class="row">
        <div class="col-12">

            <ul v-if="data.length != 0" class="nav nav-pills flex-column" v-for="val,key in data">
                <li class="nav-item form-inline justify-content-between bg-light">
                    <a class="nav-link" href="javascript:;">
                        <i class="far fa-folder-open"></i> @{{ val }}</a>
                </li>

            </ul>
            <h5 v-if="data.length == 0" class="text-center text-danger">ไม่พบข้อมูล</h5>
        </div>
    </div>
</script>
