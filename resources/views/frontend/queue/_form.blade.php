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
                            <input type="text" name="card_id" id="card_id" maxlength="13" class="form-control" onkeypress="return isNumber(event)"
                                   :value="data.card_id">
                        </div>

                        <div class="form-group">
                            <label for="table_name">มีความประสงค์ขอจองคิวรับบริการเรื่อง</label>
                            <select name="queue_for" id="queue_for">
                                <option value="ทดสอบ1">ทดสอบ1</option>
                                <option value="ทดสอบ2">ทดสอบ2</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="table_name">ที่อยู่</label>
                            <input type="text" name="address" id="address" class="form-control"
                                   :value="data.address">
                        </div>


{{--                        <div class="form-group">--}}
{{--                            <label for="table_name">รายละเอียด:</label>--}}
{{--                            <input type="text" name="detail" id="detail" class="form-control"--}}
{{--                                   :value="data.detail">--}}
{{--                        </div>--}}
                        <div>
                        <file-upload class="mt-2" :preview-size="'250px'" :field-show="2"
                                     :img-width="1024"
                                     :quality="0.5" :multi-file="true"></file-upload>

{{--                        <div class="form-group">--}}
{{--                            <input type="text"  name="f_lat" id="f_lat" class="form-control" :value="data.lat" readonly hidden>--}}
{{--                            <input type="text"  name="f_lng" id="f_lng" class="form-control" :value="data.lng" readonly hidden>--}}
{{--                        </div>--}}

{{--                        <div id="map2"></div>--}}

{{--                        <div class="form-group">--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <br>--}}
{{--                                <label><b>ค้นหาสถานที่:</b></label>--}}
{{--                                <input class="form-control" type="text" name="mapsearch" id="mapsearch">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                        <div>
                            <label for="table_name">วัน:เวลา ชำระภาษี(อ้างอิงตามสลิปธนาคาร)</label>
                            <input type="datetime-local" name="datetime_pay" id="datetime_pay" maxlength="13" class="form-control"
                                   :value="data.datetime_pay">
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="submit">บันทึก</button>
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


