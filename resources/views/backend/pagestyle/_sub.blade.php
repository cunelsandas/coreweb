<script type="text/x-template" id="sub-modal">
    <div class="modal fade" id="sub-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" @submit.prevent="save(data.id,$event,data.module)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มโมดูล</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name_sub">ชื่อแสดงในเว็บ</label>
                            <label for="select_module">โมดูล</label>
                            <select name="module_id" id="module_id" class="form-control">
                                @foreach($getmodules as $getmodule)
                                    <option value="{{$getmodule->id}}">{{$getmodule->name}}/{{$getmodule->table_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select_type">รูปแบบ/ประเภท</label>
                            <select name="type_id" class="form-control">
                                @foreach($moduletypes as $moduletype)
                                            <option value="{{$moduletype['module_id']}}">{{$moduletype['type_id']}}{{$moduletype['name']}}{{$moduletype['table_name']}}</option>
                                @endforeach
                            </select>
                            <small id="typeHelp" class="form-text text-muted">*รูปแบบการแสดงผล</small>
                        </div>
                        <div class="form-group">
                            <label for="type">ชื่อตารางเก็บข้อมูล</label>
                            <select name="table_name" class="form-control">
                                @foreach($moduletypes as $moduletype)
                                    <option value="{{$moduletype['table_name']}}">{{$moduletype['table_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">ลำดับโมดูลบนหน้าเว็บ</label>
                            <input type="text" class="form-control" id="list" name="list" :value="data.list" required>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" value="1" id="status"
                                   name="status" :checked="data.status === 1">
                            <label class="custom-control-label" for="status">
                                แสดงผลหน้าเว็บ
                            </label>
                        </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="submit_sub">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
        </div>
            </form>
    </div>
</script>
