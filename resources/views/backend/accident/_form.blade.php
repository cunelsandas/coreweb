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
                        <div class="row">
                        <div class="form-group col-6">
                            <label for="name">วันที่</label>
                            <input type="date" class="form-control" id="dateac" name="dateac" :value="data.dateac"
                                   autocomplete="off" required>
                        </div>
                            <div class="form-group col-6">
                                <label for="table_name">ช่วงเวลา</label>
                                <input type="time" name="time" id="time" class="form-control"
                                       :value="data.time">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="table_name">ประเภท</label>
                            <select name="ac_type" id="ac_type" class="form-control">
                                <option value="อัคคีภัย">อัคคีภัย</option>
                                <option value="อุบัติเหตุทางถนน">อุบัติเหตุทางถนน</option>
                                <option value="อุบัติเหตุทั่วไป">อุบัติเหตุทั่วไป</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="table_name">หมู่ที่</label>
                            <input type="text" name="moo" id="moo" class="form-control"
                                   :value="data.moo">
                        </div>

                        <div class="form-group">
                            <label for="table_name">สถานที่เกิดเหตุ</label>
                            <input type="text" name="address" id="address" class="form-control"
                                   :value="data.address">
                        </div>
                        <div class="row">
                        <div class="form-group col-4">
                            <label for="table_name">ผู้ป่วย</label>
                            <input type="number" name="sick" id="sick" class="form-control"
                                   :value="data.sick" placeholder="0" min="0" step="1">
                        </div>
                        <div class="form-group col-4">
                            <label for="table_name">ผู้บาดเจ็บ</label>
                            <input type="number" name="injury" id="injury" class="form-control"
                                   :value="data.injury" placeholder="0" min="0" step="1">
                        </div>
                        <div class="form-group col-4">
                            <label for="table_name">ผู้เสียชีวิต</label>
                            <input type="number" name="dead" id="dead" class="form-control"
                                   :value="data.dead" placeholder="0" min="0" step="1">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="table_name">นำส่งโรงพยาบาล</label>
                            <input type="text" name="hospital" id="hospital" class="form-control"
                                      :value="data.hospital"/>
                        </div>
                        <div class="form-group">
                            <label for="table_name">รายละเอียด</label>
                            <textarea rows="4" name="detail" id="detail" class="form-control"
                                   :value="data.detail"/>
                        </div>


{{--                        <div class="form-group">--}}
{{--                        <input type="text"  name="f_lat" id="f_lat" class="form-control" :value="data.lat" readonly>--}}
{{--                        <input type="text"  name="f_lng" id="f_lng" class="form-control" :value="data.lng" readonly>--}}
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="submit">บันทึก</button>
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</script>


