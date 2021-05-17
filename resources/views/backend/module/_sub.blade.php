<script type="text/x-template" id="sub-modal">
    <div class="modal fade" id="sub-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" @submit.prevent="save(data.id,$event,data.module)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มโมดูล</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name_sub">ชื่อแสดงในเว็บ</label>
                            <input type="text" class="form-control" id="name_sub" name="name" :value="data.name"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="type_sub">ชื่อโมดูล</label>
                            <input type="text" class="form-control" id="type_sub" name="type" :value="data.type"
                                   required>
                            <small id="typeHelp" class="form-text text-muted">*สำหรับค้นหาในหน้าเว็บ
                                ต้องเป็นภาษาอังกฤษและตรงกับระบบ</small>
                        </div>
                        <div class="form-group">
                            <label for="type">ลำดับโมดูลบนหน้าเว็บ</label>
                            <input type="text" class="form-control" id="list" name="list" :value="data.list" required>
                        </div>
                        <div class="form-group">
                            <label for="table_name_sub">ชื่อ Table เก็บข้อมูล</label>
                            {{--<input type="text" name="table_name" id="table_name_sub" class="form-control"
                                   :value="data.table_name" required>--}}
                            <select name="table_name" id="table_name_sub" class="form-control" required>
                                <option v-for="val,key in table" :value="val.table_name"
                                        :selected="val.table_name == data.table_name">@{{ val.table_name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="folder_name_sub">ชื่อ Folder เก็บข้อมูล</label>
                            <select name="folder_name" id="folder_name_sub" class="form-control" required>
                                <option v-for="val,key in folder" :value="val.folder_name"
                                        :selected="val.folder_name == data.folder_name">@{{ val.folder_name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="submit_sub">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>
