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
                            <label for="table_name">เบอร์โทรศัพท์:</label>
                            <input type="text" name="telephone" id="telephone" class="form-control"
                                   :value="data.telephone">
                        </div>
                        <div class="form-group">
                            <label for="table_name">เลขบัตรประจำตัวประชาชน 13 หลัก</label>
                            <input type="text" name="card_id" id="card_id" maxlength="13" class="form-control"
                                   onkeypress="return isNumber(event)"
                                   :value="data.card_id" required>
                        </div>

                        <div class="form-group">
                            <label for="table_name">มีความประสงค์ขอจองคิวรับบริการเรื่อง</label>
                            <select class="form-control" name="queue_for" id="queue_for" required>
                                <option value="">กรุณาเลือก</option>
                                <option value="ทดสอบ1">ทดสอบ1</option>
                                <option value="ทดสอบ2">ทดสอบ2</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="table_name">วันที่มารับบริการ</label>
                                <input type="date" name="date_in" id="date_in" class="form-control"
                                       :value="data.date_in" required>
                            </div>
                            <div class="col form-group">
                                <label for="table_name">เวลาที่มารับบริการ</label>
                                <input type="time" name="time_in" id="time_in" step="1800" min="08:00" max="16:00" class="form-control"
                                       :value="data.time_in" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="submit">บันทึกการจองคิว</button>
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">ปิด</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</script>

<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>


