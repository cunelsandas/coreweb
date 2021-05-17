{{--table-detail--}}


<script type="text/x-template" id="table-manage">


    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark text-center">
        <tr>
            <th width="5">ลำดับ</th>
            <th width="10">วันที่,เวลา</th>
            <th width="30">สถานที่เกิดเหตุ</th>
            <th width="5">ผู้ป่วย</th>
            <th width="5">ผู้บาดเจ็บ</th>
            <th width="5">ผู้เสียชีวิต</th>
            <th width="30">นำส่งโรงพยาบาล</th>
            <th width="10">จัดการ</th>

        </tr>
        </thead>
        <tbody>
        <tr v-for="val,key in data">
            <td class="text-center">@{{ val.list }}</td>
            <td class="text-center">@{{ val.dateac }} , เวลา @{{ val.time }} น.</td>
            <td class="text-center">@{{ val.address }}</td>
            <td class="text-center">@{{ val.sick }}</td>
            <td class="text-center">@{{ val.injury }}</td>
            <td class="text-center">@{{ val.dead }}</td>

            <td class="text-center">@{{ val.hospital }}</td>
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
