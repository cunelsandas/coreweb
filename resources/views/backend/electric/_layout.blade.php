{{--table-detail--}}


<script type="text/x-template" id="table-manage">


    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark text-center">
        <tr>
            <th width="10">ลำดับ</th>
            <th width="10">วันที่</th>
            <th width="20">ผู้แจ้งซ่อม</th>
            <th width="40">หมายเลขเสาไฟฟ้า/สถานที่</th>
            <th width="10">สถานะ</th>
            <th width="10">จัดการ</th>

        </tr>
        </thead>
        <tbody>
        <tr v-for="val,key in data">
            <td class="text-center">@{{ val.list }}</td>
            <td class="text-center">@{{ val.created_at }}</td>
            <td class="text-center">@{{ val.postby }}</td>
            <td class="text-center">@{{ val.subject1 }} | @{{ val.subject2 }} | @{{ val.subject3 }} | @{{ val.subject4 }} | @{{ val.subject5 }}</td>
            <td class="text-center">@{{ val.status }}</td>
            <td class="text-center">
                <div class="btn-group btn-group-sm">
                    <button @click="edit(val.id)" type="button" class="btn btn-warning"title="แก้ไข"><i class="fa fa-edit"></i></button>
                </div>
                <button @click="remove(val.id)" type="button" class="btn btn-danger"title="ลบ"><i class="fa fa-trash"></i></button>
        </tr>
        <tr v-if="!data || data.length == 0">
            <td class="text-center text-danger" colspan="3">ไม่พบข้อมูล</td>
        </tr>
        </tbody>
    </table>
</script>
