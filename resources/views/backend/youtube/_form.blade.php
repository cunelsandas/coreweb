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
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="embed">Youtube Code</label>
                            <input type="text" class="form-control" id="embed" name="embed" :value="data.embed"
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="detail">รายละเอียด</label>
                            <textarea id="detail" name="detail" class="form-control" rows="10"
                                      :value="data.detail"></textarea>
                        </div>
                        <div class="form-group">
                            <label v-if="data.embed" for="youtube-example-show">วิดีโอตัวอย่าง</label>
                            <div id="youtube-example-show"></div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" value="1" id="status"
                                   name="status" :checked="data.status == 1">
                            <label class="custom-control-label" for="status">
                                แสดงผลหน้าเว็บ
                            </label>
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
