{{--table-detail--}}
<script type="text/x-template" id="table-manage">
    <table class="table table-sm table-hover table-borderless">
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
                    <button @click="edit(val.id)" type="button" class="btn btn-warning"title="แก้ไข"><i class="fa fa-edit"></i></button>
                    <button @click="remove(val.id)" type="button" class="btn btn-danger"title="ลบ"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>
        <tr v-if="!data || data.length == 0">
            <td class="text-center text-danger" colspan="3">ไม่พบข้อมูล</td>
        </tr>
        </tbody>
    </table>
</script>
