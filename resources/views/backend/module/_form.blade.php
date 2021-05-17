<script type="text/x-template" id="module-modal">
    <div class="modal fade" id="module-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" @submit.prevent="save(data.id,$event)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มโมดูล</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">ชื่อแสดงในเว็บ</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="type">ชื่อโมดูล</label>
                            <input type="text" class="form-control" id="type" name="type" required>
                            <small id="typeHelp" class="form-text text-muted">*สำหรับค้นหาในหน้าเว็บ
                                ต้องเป็นภาษาอังกฤษและตรงกับระบบ</small>
                        </div>
                        <div class="form-group">
                            <label for="type">ลำดับโมดูลบนหน้าเว็บ</label>
                            <input type="text" class="form-control" id="index_list" name="list" required>
                        </div>
                        <div class="form-group">
                            <label for="table_name">ชื่อ Table เก็บข้อมูล</label>
                            <input type="text" name="table_name" id="table_name" class="form-control"
                                   @keyup="checkEmpty($event,'table')" required>
                            <small id="typeHelp" class="form-text text-muted">*ต้องนำหน้าด้วย tb_(ชื่อตาราง) ตั้งเป็นภาษาอังกฤษพิมพ์ชิดกันและควรเกี่ยวข้องกับหัวข้อ</small>
                        </div>
                        <div class="form-group">
                            <label for="table_name">ชื่อ Folder เก็บข้อมูล</label>
                            <input type="text" name="folder_name" id="folder_name" class="form-control"
                                   @keyup="checkEmpty($event,'folder')" required>
                            <small id="typeHelp" class="form-text text-muted">*ตั้งเป็นภาษาอังกฤษพิมพ์ชิดกันและควรเกี่ยวข้องกับหัวข้อ</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="submit">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>
