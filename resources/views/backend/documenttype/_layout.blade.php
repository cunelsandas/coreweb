<script type="text/x-template" id="user-manage">
    <table class="table table-hover table-sm">
        <thead class="thead-dark text-center">
        <tr>
            <th width="50">ลำดับ</th>
            <th>ชื่อ</th>
            <th width="100">จัดการ</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="val,key in data">
            <td class="text-center">@{{ val.list }}</td>
            <td>@{{ val.name }}</td>
            <td class="text-center">
                <div class="btn-group btn-group-sm">
                    <button type="button" title="แก้ไข" class="btn btn-warning" @click="edit(val.id)"><i
                            class="fa fa-edit"></i></button>
                    <button type="button" title="สิทธิ์" class="btn btn-primary" @click="permission(val.id)"><i
                            class="fa fa-user-edit"></i></button>
                    <button type="button" title="ลบ" class="btn btn-danger" @click="remove(val.id)"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</script>
