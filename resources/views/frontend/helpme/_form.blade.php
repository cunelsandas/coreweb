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
        z-index: 30;
        position: fixed;
        display: inline-block;
        float: left;
    }
    .modal{
        z-index: 30;
    }
    .modal-backdrop{
        z-index: 10;
    }
</style>
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
                            <input type="text" class="form-control" id="postby" name="postby" :value="data.postby"
                                   autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label for="table_name">ที่อยู่</label>
                            <input type="text" name="address" id="address" class="form-control"
                                   :value="data.address">
                        </div>

                        <div class="form-group">
                            <label for="table_name">อีเมล์/เบอร์ติดต่อ:</label>
                            <input type="text" name="email" id="email" class="form-control"
                                   :value="data.email">
                        </div>

                        <div class="form-group">
                            <label for="table_name">เรื่อง</label>
                            <input type="text" name="subject" id="subject" class="form-control"
                                   :value="data.subject">
                        </div>

                        <div class="form-group">
                            <label for="table_name">รายละเอียด:</label>
                            <input type="text" name="detail" id="detail" class="form-control"
                                   :value="data.detail">
                        </div>

                        <div class="form-group">
                        <input type="text"  name="f_lat" id="f_lat" class="form-control" :value="data.lat" readonly hidden>
                        <input type="text"  name="f_lng" id="f_lng" class="form-control" :value="data.lng" readonly hidden>
                        </div>

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


