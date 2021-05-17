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
                            <li class="nav-item">
                                <a class="nav-link" id="paytax-img-tab" data-toggle="tab"
                                   href="#paytax-img">สลิปธนาคาร</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="paytax-detail">
                                <div class="form-group">
                                    <label for="name">ชื่อ</label>
                                    <input type="text" class="form-control" id="postby" name="postby" :value="data.postby" readonly
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">เลขบัตรประจำตัวประชาชน 13 หลัก</label>
                                    <input type="text" class="form-control" id="subject" name="subject" :value="data.subject" readonly
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">ที่อยู่</label>
                                    <input type="text" class="form-control" id="address" name="address" :value="data.address" readonly
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">อีเมล์/เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" id="email" name="email" :value="data.email" readonly
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">เวลาชำระภาษี(อ้างอิงตามสลิปธนาคาร)</label>
                                    <input type="text" class="form-control" id="datetime_pay" name="datetime_pay" :value="data.datetime_pay" readonly
                                           autocomplete="off" required>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="detail">รายละเอียด</label>--}}
{{--                                    <textarea id="detail" name="detail" class="form-control"--}}
{{--                                              rows="10" :value="data.detail"></textarea>--}}
{{--                                </div>--}}
                                {{--                                <div class="custom-control custom-checkbox">--}}
                                {{--                                    <input class="custom-control-input" type="checkbox" value="1" id="status"--}}
                                {{--                                           name="status" :checked="data.status == 1">--}}
                                {{--                                    <label class="custom-control-label" for="status">--}}
                                {{--                                        แสดงผลหน้าเว็บ--}}
                                {{--                                    </label>--}}
                                {{--                                </div>--}}
                                <div class="form-group">
                                    <label for="process">สถานะการโอนเงิน</label>
                                    <span class="label label-danger" style="color: red">**กรุณาตรวจสอบเวลาชำระภาษีในสลิปธนาคาร**</span>
                                    <select class="form-control" id="process" name="process">
                                        <option value="กำลังตรวจสอบข้อมูลการชำระภาษี">กำลังตรวจสอบข้อมูลการชำระภาษี</option>
                                        <option value="ชำระภาษีเรียบร้อยแล้ว">ชำระภาษีเรียบร้อยแล้ว</option>
                                    </select>
                                </div>
{{--                                <file-upload class="mt-2" :preview-size="'250px'" :field-show="2" :img-width="1024"--}}
{{--                                             :quality="0.5" :multi-file="true"></file-upload>--}}
                            </div>
                            {{--แสดงรูปภาพ--}}
                            <div class="tab-pane fade" id="paytax-img">
                                <div class="row">
                                    <div v-for="val in files.img" class="col-lg-4 show-file my-2">
                                        <div class="card h-100">
                                            <img :src="val.url" class="card-img-top">
                                            <div class="card-body text-center">
                                                <p class="card-text"> @{{ val.name }}</p>
                                                <a class="btn btn-danger text-white" title="ลบ"
                                                   @click="deleteFile(val.id,$event)">
                                                    <i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-center">
                                        <h1 v-if="!files.img">
                                            ไม่มีรูป
                                        </h1>
                                    </span>
                            </div>
                            <div class="tab-pane fade" id="paytax-file">
                                <div class="row">
                                    <div v-for="val in files.file" class="col-lg-4 show-file my-2">
                                        <div class="card h-100">
                                            <div class="card-img p-1 text-center">
                                                <i v-if="val.type == 'doc' || val.type == 'docx'"
                                                   class="fas fa-10x fa-file-word text-primary"></i>
                                                <i v-if="val.type == 'xls' || val.type == 'xlsx'"
                                                   class="fas fa-10x fa-file-excel text-success"></i>
                                                <i v-if="val.type == 'pdf'"
                                                   class="fas fa-10x fa-file-pdf text-danger"></i>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text"> @{{ val.name }}</p>
                                                <a class="btn btn-danger text-white" title="ลบ"
                                                   @click="deleteFile(val.id,$event)">
                                                    <i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-center">
                                        <h1 v-if="!files.file">
                                            ไม่มีไฟล์
                                        </h1>
                                    </span>
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
