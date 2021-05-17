<script type="text/x-template" id="permission-manage">
    <div class="modal fade" id="permission-modal">
        <div class="modal-dialog modal-lg " role="document">
            <form @submit.prevent="save(data.id,$event)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">กำหนดสิทธิ์</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="modules"></label>
                                <select name="modules" id="modules" class="form-control" multiple size="10">
                                    <option v-for="val,key in data.modules" value="val.id">@{{ val.name }}</option>
                                </select>
                            </div>
                            <div class="col-2 my-auto text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i
                                            class="fas fa-angle-double-right"></i></button>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fas fa-angle-double-left"></i></button>
                                </div>
                            </div>
                            <div class="col">
                                <label for="userPermission"></label>
                                <select name="userPermission" id="userPermission" class="form-control" multiple
                                        size="10">
                                    <option v-for="val,key in data.permission" value="">@{{ val.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>
