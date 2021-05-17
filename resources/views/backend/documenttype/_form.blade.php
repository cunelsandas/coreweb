<script type="text/x-template" id="modal-user">
    <div id="modal-view" class="modal fade">
        <div class="modal-dialog modal-lg">
            <form @submit.prevent="save(data.id,$event)" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">@{{title}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="tab-pane fade show active" id="user">
                            <div class="form-group">
                                <label for="name">ชื่อ</label>
                                <input type="text" class="form-control" id="name" name="name" :value="data.name">
                            </div>
                            <div class="form-group">
                                <label for="username">ชื่อผู้ใช้</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       :value="data.username">
                            </div>
                            <div class="form-group">
                                <label for="password">รหัสผ่าน</label>
                                <input type="text" class="form-control" id="password" name="password"
                                       :value="data.password">
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
