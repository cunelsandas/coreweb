<script type="text/x-template" id="module-modal">
    <div class="modal fade" id="module-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" @submit.prevent="save(data.id,$event)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทไฟล์เอกสาร</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
{{--                        <div class="form-group">--}}
{{--                            <label for="fid">ID</label>--}}
{{--                            <input type="text" class="form-control" id="id" name="id" :value="data.id" readonly>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="select-sub">เพิ่มกลุ่มไฟล์เอกสารไปที่เมนู</label>--}}
{{--                            <select name="sub" id="select-sub" class="form-control">--}}

{{--                                @foreach($menuAll as $mna)--}}
{{--                                <option value="{{$mna->id}}">{{$mna->name}} </option> @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="name">ชื่อไฟล์เอกสาร</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="type">ชื่อไฟล์เอกสาร (ภาษาอังกฤษ)</label>
                            <input type="text" class="form-control" id="type" name="type" required>
                            <small id="typeHelp" class="form-text text-muted">*สำหรับค้นหาในหน้าเว็บ
                                ต้องเป็นภาษาอังกฤษและตรงกับระบบ <b style="color: red"> (คำแนะนำ: ห้ามเว้นวรรค และไม่ควรใช้ชื่อซ้ำกัน)</b></small>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="type">ลำดับโมดูลบนหน้าเว็บ</label>--}}
{{--                            <input type="text" class="form-control" id="index_list" name="list" required>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="table_name">ชื่อ Table เก็บข้อมูล</label>
                            <input type="text" name="table_name" id="table_name" class="form-control"
                                   @keyup="checkEmpty($event,'table')" required readonly>
                            <small id="typeHelp" class="form-text text-muted">*ต้องนำหน้าด้วย tb_(ชื่อตาราง) ตั้งเป็นภาษาอังกฤษพิมพ์ชิดกันและควรเกี่ยวข้องกับหัวข้อ</small>
                        </div>
                        <div class="form-group">
                            <label for="table_name">ชื่อ Folder เก็บข้อมูล</label>
                            <input type="text" name="folder_name" id="folder_name" class="form-control" readonly
                                   @keyup="checkEmpty($event,'folder')" required>
                            <small id="typeHelp" class="form-text text-muted">*ตั้งเป็นภาษาอังกฤษพิมพ์ชิดกันและควรเกี่ยวข้องกับหัวข้อ</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="submit">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>

<script>
    $(function(){
        var $type = $('#type');
        var $folder_name = $('#folder_name');
        var $table_name = $('#table_name');
        function onChange() {
            $folder_name.val($type.val());
            $table_name.val('tb_'+$type.val());
        };
        $('#type')
            .change(onChange)
            .keyup(onChange);
    });
</script>
