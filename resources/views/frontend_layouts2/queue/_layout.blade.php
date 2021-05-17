{{--table-detail--}}


<script type="text/x-template" id="table-manage">


    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark text-center">
        <tr>
            <th width="10">ลำดับ</th>
            <th width="10">ชื่อผู้จอง</th>
            <th width="35">เรื่องที่ขอรับบริการ</th>
            <th width="35">วันที่-เวลา</th>
            <th width="10">สถานะคิว</th>

        </tr>
        </thead>
        <tbody>
        <tr v-for="val,key in data">
            <td class="text-center">@{{ val.list }}</td>
            <td class="text-center">@{{ val.name }}</td>
            <td class="text-center">@{{ val.queue_for }}</td>
            <td class="text-center">@{{ val.date_in }} - @{{ val.time_in }} น.</td>
            <td class="text-center" v-if="val.process == 'การจองคิวสำเร็จ'" bgcolor="#85EA8E"> @{{ val.process }}</td>
            <td class="text-center" v-if="val.process == 'กำลังตรวจสอบการจองคิว'" bgcolor="#FBD86B"> @{{ val.process }}</td>
            <td class="text-center" v-if="val.process == 'การจองคิวถูกยกเลิก'" bgcolor="red"> @{{ val.process }}</td>

        </tr>
        <tr v-if="!data || data.length == 0">
            <td class="text-center text-danger" colspan="3">ไม่พบข้อมูล</td>
        </tr>
        </tbody>
    </table>
</script>
