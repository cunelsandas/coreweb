<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */

    /* Optional: Makes the sample page fill the window. */
    #map2 {
        height: 400px;
        width: 100%;
    }
    .pac-container {
        background-color: #FFF;
        z-index: 2000;
        position: fixed;
        display: inline-block;
        float: left;
    }
    .modal{
        z-index: 2000;
    }
    .modal-backdrop{
        z-index: 10;
    }
</style>
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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="catalog-detail-tab" data-toggle="tab"
                                   href="#catalog-detail">รายละเอียด</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="catalog-img-tab" data-toggle="tab" href="#catalog-img">รูปภาพ</a>
                            </li>
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link" id="catalog-file-tab" data-toggle="tab"--}}
                            {{--                                   href="#catalog-file">ไฟล์เอกสาร</a>--}}
                            {{--                            </li>--}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="catalog-detail">
                                <div class="form-group">
                                    <label for="name">ชื่อกิจกรรม</label>
                                    <input type="text" id="name" name="name" :value="data.name"
                                           autocomplete="off" class="form-control form-control-sm">
                                </div>
                                <div class="form-group">
                                    <label for="detail">รายละเอียด</label>
                                    <textarea name="detail" id="detail" class="form-control textarea-detail" rows="10"
                                              :value="data.detail"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">ลิงค์</label>
                                    <input type="text" id="link" name="link" :value="data.link"
                                           autocomplete="off" class="form-control form-control-sm">
                                </div>
                                <label for="detail">ปักหมุดแผนที่</label>
                                <div class="form-group">
                                    <label style="text-align: center"><b>กรุณาค้นหาสถานที่ (เช่น ชื่อสถานที่ท่องเที่ยว, จังหวัด, สถานที่ใกล้เคียง):</b></label>
                                    <input class="form-control" type="text" name="mapsearch" id="mapsearch">
                                </div>
                                <div id="map2"></div>
                                <label for="detail">Latitude : Longitude</label>
                                <div class="form-group row" style="margin: 1% auto">
                                    <input type="text"  name="f_lat" id="f_lat" class="form-control col-3" :value="data.f_lat" readonly>
                                    <input type="text"  name="f_lng" id="f_lng" class="form-control col-3" :value="data.f_lng" readonly>
                                </div>

                                <file-upload class="mt-2" :preview-size="'250px'" :field-show="2"
                                             :img-width="1024"
                                             :quality="0.5" :multi-file="true"></file-upload>
                            </div>
                            {{--แสดงรูปภาพ--}}

                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="1" id="status"
                                       name="status" :checked="data.status === 1">
                                <label class="custom-control-label" for="status">
                                    แสดงผลหน้าเว็บ
                                </label>
                            </div>
                            <div class="tab-pane fade" id="catalog-img">
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
                            <div class="tab-pane fade" id="catalog-file">
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
                                {{--                                <span class="text-center">--}}
                                {{--                                        <h1 v-if="!files.file">--}}
                                {{--                                            ไม่มีไฟล์--}}
                                {{--                                        </h1>--}}
                                {{--                                    </span>--}}
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
