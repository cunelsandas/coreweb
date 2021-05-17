<script type="text/x-template" id="modal-manage">
    <div id="modal-view" class="modal fade">
        <div class="modal-dialog modal-lg" style="min-width: 95%!important;">
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
                            <label for="type">ประเภท</label>
                            <input type="text" class="form-control" id="type" name="type" :value="data.type"
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="detail">รายละเอียด</label>
                            <textarea id="detail" class="form-control textarea-detail" rows="10"></textarea>
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
