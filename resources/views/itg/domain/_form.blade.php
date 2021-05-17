<script type="text/x-template" id="modal-domains">
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-lg">
            <form @submit.prevent="saveData(data.id,$event)" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@{{title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">ชื่อองค์กร</label>
                            <input :value="data.name" type="text" class="form-control form-control-sm" id="name"
                                   name="name" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="start_domain">วันเริ่มสัญญา</label>
                            <input :value="data.start_domain" type="text"
                                   class="form-control form-control-sm my-datepicker" id="start_domain"
                                   name="start_domain" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="end_domain">วันหมดสัญญา</label>
                            <input :value="data.end_domain" type="text"
                                   class="form-control form-control-sm my-datepicker" id="end_domain" name="end_domain"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="domain_name">Domain Name</label>
                            <input :value="data.domain_name" type="text" class="form-control form-control-sm"
                                   id="domain_name" name="domain_name" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="host_name">Host Name</label>
                            <input :value="data.host_name" type="text" class="form-control form-control-sm"
                                   id="host_name" name="host_name" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="hd_quota">พื้นที่เก็บข้อมูล (Megabyte)</label>
                            <input :value="data.hd_quota" type="number" step="100" min="0" class="form-control form-control-sm"
                                   id="hd_quota" name="hd_quota" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="egp_code">รหัสจัดซื้อจัดจ้าง EGP (EGP Code)</label>
                            <input :value="data.egp_code" type="text" class="form-control form-control-sm"
                                   id="egp_code" name="egp_code" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="host_name">Database Name</label>
                            <input :value="data.database_name" type="text" class="form-control form-control-sm"
                                   id="database_name" name="database_name" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="user_database">User Database</label>
                            <input :value="data.user_database" type="text" class="form-control form-control-sm"
                                   id="user_database" name="user_database" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password_database">Password Database</label>
                            <input :value="data.password_database" type="text" class="form-control form-control-sm"
                                   id="password_database" name="password_database" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>
