<script type="text/x-template" id="modal-manage">
    <div id="modal-view" class="modal fade">
        <div class="modal-dialog modal-lg">
            <form method="post" @submit.prevent="saveData(data.id,$event)" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@{{title}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="officer-detail-tab" data-toggle="tab"
                                   href="#officer-detail">รายละเอียด</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="officer-img-tab" data-toggle="tab"
                                   href="#officer-img">รูปภาพ</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="officer-detail">
                                <div class="form-group">
                                    <label for="name">ชื่อ - นามสกุล</label>
                                    <input type="text" class="form-control" id="name" name="name" :value="data.name"
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="position">ตำแหน่ง</label>
                                    <input type="text" class="form-control" id="position" name="position"
                                           :value="data.position"
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="block">บล็อกการแสดง</label>
                                    <input type="number" min="1" class="form-control" id="block" name="block"
                                           :value="data.block"
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="list">ลำดับการแสดง</label>
                                    <input type="number" min="1" class="form-control" id="list" name="list"
                                           :value="data.list"
                                           autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="detail">รายละเอียด</label>
                                    <textarea id="detail" name="detail" class="form-control"
                                              rows="10" :value="data.detail"></textarea>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" value="1" id="status"
                                           name="status" :checked="data.status == 1">
                                    <label class="custom-control-label" for="status">
                                        แสดงผลหน้าเว็บ
                                    </label>
                                </div>
                                <file-upload class="mt-2" :preview-size="'250px'" :field-show="1" :img-width="1024"
                                             :quality="0.5" :multi-file="false"></file-upload>
                            </div>
                            <div class="tab-pane fade" id="officer-img">
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
