<script type="text/x-template" id="table-domains">
    <table class="table table-sm table-responsive-sm table-borderless table-hover my-2">
        <thead class="thead-dark">
        <tr>
            <th width="50">ลำดับ</th>
            <th>ชื่อองค์กร</th>
            <th>วันเริ่มสัญญา</th>
            <th>วันสิ้นสุดสัญญา</th>
            <th width="50">จัดการ</th>
        </tr>
        </thead>
        <tbody>
        <tr v-if="data.length == 0">
            <td colspan="5" class="text-danger text-center">ไม่พบข้อมูล</td>
        </tr>
        <tr v-for="val,key in data">
            <td class="text-center">@{{ val.list }}</td>
            <td>@{{ val.name }}</td>
            <td>@{{ val.start_domain }}</td>
            <td>@{{ val.end_domain }}</td>
            <td>
                <div class="btn-group btn-group-sm">
                    <button @click="permission(val.field)" type="button" class="btn btn-primary" data-placement="bottom"
                            title="กำหนดสิทธิ์"><i class="fas fa-users-cog"></i></button>
                    <button @click="edit(val.field)" type="button" class="btn btn-warning" data-placement="bottom"
                            title="แก้ไข"><i class="fa fa-edit"></i></button>
                    <button @click="remove(val.field)" type="button" class="btn btn-danger" data-placement="bottom"
                            title="ลบ"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>,
</script>
