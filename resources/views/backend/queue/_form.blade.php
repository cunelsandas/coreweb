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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="paytax-detail-tab" data-toggle="tab"
                                   href="#paytax-detail">รายละเอียด</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="paytax-detail">
                                <div class="form-group">
                                    <label for="name">ชื่อ</label>
                                    <input type="text" class="form-control" id="name" name="name" :value="data.name"
                                           readonly
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="card_id">เลขบัตรประจำตัวประชาชน 13 หลัก</label>
                                    <input type="text" class="form-control" id="card_id" name="card_id"
                                           :value="data.card_id" readonly
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="telephone">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone"
                                           :value="data.telephone" readonly
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="queue_for">เรื่องที่ขอรับบริการ</label>
                                    <input type="text" class="form-control" id="queue_for" name="queue_for"
                                           :value="data.queue_for" readonly
                                           autocomplete="off" required>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="date_in">วันที่รับบริการ</label>
                                        <input type="text" class="form-control" id="date_in" name="date_in"
                                               :value="data.date_in" readonly
                                               autocomplete="off" required>
                                    </div>
                                    <div class="col form-group">
                                        <label for="time_in">เวลาที่รับบริการ</label>
                                        <input type="text" class="form-control" id="time_in" name="time_in"
                                               :value="data.time_in" readonly
                                               autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="process">สถานะการจองคิว</label>
                                    <select class="form-control" id="process" name="process">
                                        <option value="">กรุณาเลือกสถานะ</option>
                                        <option value="กำลังตรวจสอบการจองคิว">กำลังตรวจสอบการจองคิว</option>
                                        <option value="การจองคิวสำเร็จ">การจองคิวสำเร็จ</option>
                                        <option value="การจองคิวถูกยกเลิก">การจองคิวถูกยกเลิก</option>
                                    </select>
                                </div>
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
