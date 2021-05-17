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
                            <label for="name">ชื่อผู้แจ้งซ่อม</label>
                            <input type="text" class="form-control" id="postby" name="postby" :value="data.postby"
                                   autocomplete="off" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="table_name">ที่อยู่</label>
                            <input type="text" name="address" id="address" class="form-control"
                                   :value="data.address" readonly>
                        </div>

                        <div class="form-group">
                            <label for="table_name">อีเมล์/เบอร์ติดต่อ:</label>
                            <input type="text" name="email" id="email" class="form-control"
                                   :value="data.email" readonly>
                        </div>

                        <div class="form-group">
                            <label for="table_name" style="color:red;">หมายเลขเสาไฟ/สถานที่ 1</label>
                            <input type="text" name="subject1" id="subject1" class="form-control"
                                   :value="data.subject1" readonly>
                        </div>
                        <div class="form-group">
                            <label for="table_name" style="color:red;">หมายเลขเสาไฟ/สถานที่ 2</label>
                            <input type="text" name="subject2" id="subject2" class="form-control"
                                   :value="data.subject2" readonly>
                        </div>
                        <div class="form-group">
                            <label for="table_name" style="color:red;">หมายเลขเสาไฟ/สถานที่ 3</label>
                            <input type="text" name="subject3" id="subject3" class="form-control"
                                   :value="data.subject3" readonly>
                        </div>
                        <div class="form-group">
                            <label for="table_name" style="color:red;">หมายเลขเสาไฟ/สถานที่ 4</label>
                            <input type="text" name="subject4" id="subject4" class="form-control"
                                   :value="data.subject4" readonly>
                        </div>
                        <div class="form-group">
                            <label for="table_name" style="color:red;">หมายเลขเสาไฟ/สถานที่ 5</label>
                            <input type="text" name="subject5" id="subject5" class="form-control"
                                   :value="data.subject5" readonly>
                        </div>

                        <div class="form-group">
                            <label for="table_name">รายละเอียด:</label>
                            <textarea type="text" name="detail" id="detail" class="form-control"
                                   :value="data.detail" readonly/>
                        </div>

{{--                        <div class="form-group">--}}
{{--                        <input type="text"  name="f_lat" id="f_lat" class="form-control" :value="data.f_lat" readonly>--}}
{{--                        <input type="text"  name="f_lng" id="f_lng" class="form-control" :value="data.f_lng" readonly>--}}
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


