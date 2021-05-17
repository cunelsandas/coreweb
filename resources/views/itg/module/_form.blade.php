<script type="text/x-template" id="modal-manage">
    <div id="modal-view" class="modal fade">
        <div class="modal-dialog modal-lg">
            <form method="post" @submit.prevent="saveData(data.id,$event)" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">@{{title}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">ชื่อ</label>
                            <input type="text" class="form-control" id="name" name="name" :value="data.name"
                                   autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="type">แสดงไปที่เมนู</label>
                            <select class="form-control" name="type" id="type">
                                <option value="">โปรดเลือกเมนู</option>
                                <option value="main">เนื้อหา</option>
                                <option value="multimedia">มัลติมีเดีย</option>
                                <option value="eservice">บริการออนไลน์</option>
                                <option value="system">ข้อมูลระบบ</option>
                                <option value="admin">ผู้ดูแลระบบ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="route_name">Route Name</label>
                            <select class="form-control" name="route_name" id="route_name">
                                <option value="/" selected>หน้าหลัก</option>
                                <option v-for="val in routes" :value="val" :selected="val == data.route_name">@{{ val
                                    }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="table_name">Table Name</label>
                            <input type="text" name="table_name" id="table_name" class="form-control"
                                   :value="data.table_name">
                        </div>
                        <div class="form-group">
                            <label for="table_name">ลำดับการแสดงผล</label>
                            <input type="number" name="list" id="list" class="form-control" :value="data.list">
                        </div>
                        <div class="form-group row pl-3">
                            <div class="custom-control custom-checkbox col">
                                <input type="checkbox" class="custom-control-input" name="frontend" id="frontend"
                                       value="1" :checked="data.frontend">
                                <label class="custom-control-label" for="frontend">เปิด Module หน้าเว็บ</label>
                            </div>
                            <div class="custom-control custom-checkbox col">
                                <input type="checkbox" class="custom-control-input" name="backend" id="backend"
                                       value="1" :checked="data.backend">
                                <label class="custom-control-label" for="backend">เปิด Module หลังบ้าน</label>
                            </div>
                        </div>
                        <div class="form-group row pl-3">
                            <div class="custom-control custom-checkbox col">
                                <input type="checkbox" class="custom-control-input" name="is_sub" id="is_sub"
                                       value="1" :checked="data.is_sub">
                                <label class="custom-control-label" for="is_sub">เปิด Module Sub หน้าเว็บ</label>
                            </div>
                            <div class="custom-control custom-checkbox col">
                                <input type="checkbox" class="custom-control-input" name="manage_sub" id="manage_sub"
                                       value="1" :checked="data.manage_sub">
                                <label class="custom-control-label" for="manage_sub">เปิด Module Sub หลังบ้าน</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>
