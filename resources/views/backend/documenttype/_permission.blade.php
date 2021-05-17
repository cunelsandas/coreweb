<script type="text/x-template" id="permission-manage">
    <div class="modal fade" id="permission-modal">
        <div class="modal-dialog modal-lg " role="document">
            <form @submit.prevent="save(data.user_id,$event)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">กำหนดสิทธิ์</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-for="val,key in data.permission" class="custom-control custom-checkbox">
                            <input name="permission[]" type="checkbox" class="custom-control-input"
                                   :id="'check-'+key" :value="val.value" :checked="val.permission">
                            <label class="custom-control-label" :for="'check-'+key">@{{ val.name }}</label>
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
