{{--table-detail--}}


<script type="text/x-template" id="table-manage">


    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark text-center">
        <tr>
            <th width="10">ลำดับ</th>
            <th width="10">วันที่</th>
            <th width="60">เลขบัตรประชาชน</th>
            <th width="20">สถานะ</th>

        </tr>
        </thead>
        <tbody>
        <tr v-for="val,key in data">
            <td class="text-center">@{{ val.list }}</td>
            <td class="text-center">@{{ val.created_at }}</td>
            <td class="text-center">@{{ val.subject }}</td>
            <td class="text-center" v-if="val.process == 'ชำระภาษีเรียบร้อยแล้ว'" bgcolor="#85EA8E"> @{{ val.process }}</td>
            <td class="text-center" v-if="val.process == 'กำลังตรวจสอบข้อมูลการชำระภาษี'" bgcolor="#FBD86B"> @{{ val.process }}</td>


        </tr>
        <tr v-if="!data || data.length == 0">
            <td class="text-center text-danger" colspan="3">ไม่พบข้อมูล</td>
        </tr>
        </tbody>
    </table>
</script>
