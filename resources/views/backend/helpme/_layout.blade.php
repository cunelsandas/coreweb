{{--table-detail--}}


<script type="text/x-template" id="table-manage">


    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark text-center">
        <tr>
            <th width="10">ลำดับ</th>
            <th width="10">วันที่</th>
            <th width="50">เรื่อง</th>
            <th width="10">แผนที่</th>
            <th width="10">สถานะ</th>
            <th width="10">จัดการ</th>

        </tr>
        </thead>
        <tbody>

        @php

            function formatDateThaiDMY($strDate)
            {
                $strYear = date("Y",strtotime($strDate))+543;
                $strMonth= date("n",strtotime($strDate));
                $strDay= date("j",strtotime($strDate));
                $strHour= date("H",strtotime($strDate));
                $strMinute= date("i",strtotime($strDate));
                $strSeconds= date("s",strtotime($strDate));
                $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                $strMonthThai=$strMonthCut[$strMonth];
                return "$strDay $strMonthThai $strYear";
            }

        @endphp

        <tr v-for="val,key in data">
            <td class="text-center">@{{ val.list }}</td>

            <td class="text-center">  @{{ val.created_at }}</td>

            <td class="text-center">@{{ val.subject }}</td>
            <td class="text-center"><a style="color: black" target="_blank" :href="'//maps.google.com/?saddr=Current+Location&daddr=' + val.f_lat +','+val.f_lng"><i style="color: red" class="fas fa-map-marked-alt"></i>คลิกเพื่อนำทาง</a></td>

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
