<script type="text/x-template" id="modal-menu">
    <div id="modal-view" class="modal fade">
        <div class="modal-dialog modal-lg">
            <form @submit.prevent="save(data.id,$event)" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">@{{title}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="select-sub">ประเภทเมนู</label>
                            <select name="sub" id="select-sub" class="form-control">
                                <option value="">เป็นเมนูหลัก</option>
                                <option v-for="val,key in menu" :selected="val.id == data.sub" :value="val.id">
                                    เป็นเมนูย่อยของ - @{{ val.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">ชื่อเมนู</label>
                            <input type="text" class="form-control" id="name" name="name" :value="data.name" required>
                        </div>
                        <div class="form-group">
                            <label for="url">ลิงก์เมนูไปที่</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="type-in" name="type" class="custom-control-input"
                                       value="0" :checked="data.type == 0"
                                       @click="setDisabled('#select-url','#input-url')">
                                <label class="custom-control-label" for="type-in">ลิงค์ภายใน</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="type-out" name="type" class="custom-control-input"
                                       value="1" :checked="data.type == 1"
                                       @click="setDisabled('#input-url','#select-url')">
                                <label class="custom-control-label" for="type-out">ลิงค์ภายนอก</label>
                            </div>
                            <div class="input-group mb-3">
                                <select name="url" id="select-url" class="form-control" :hidden="data.type == 1"
                                        :disabled="data.type == 1" @change="setUrl($event.target.value, 0)" required>
                                    <option value="">เลือก</option>
                                    <option v-for="val,key in module" :selected="val.url == data.url" :value="val.url">
                                        @{{ val.name }}
                                    </option>
                                </select>
                                <input type="text" name="url" id="input-url" class="form-control" :value="data.url"
                                       :hidden="data.type == 0" :disabled="data.type == 0"
                                       @change="setUrl($event.target.value, 1)" required>
                                <div class="input-group-append">
                                    <a :href="data.url" target="_blank" id="test-link" class="btn btn-secondary">ทดสอบลิงค์</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">ลำดับการแสดง</label>
                            <input type="number" min="1" class="form-control" id="list" name="list" :value="data.list"
                                   required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="target" name="target"
                                       value="1" :checked="data.target == 1">
                                <label class="custom-control-label" for="target">เปิดลิงค์ในแท็บใหม่</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="status" name="status"
                                       value="1" :checked="data.status == 1">
                                <label class="custom-control-label" for="status">แสดงผลเมนู</label>
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
