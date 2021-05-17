@if($layout == 1)
    {{--table-detail--}}
    <script type="text/x-template" id="table-manage">
        <table class="table table-sm table-hover table-borderless">
            <thead class="thead-dark text-center">
            <tr>
                <th width="50">ลำดับ</th>
                <th>ชื่อ</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="val,key in data">
                <td class="text-center">@{{ val.list }}</td>
                <a :href="val.url">
                    <td>@{{ val.name }}</td>
                </a>
            </tr>
            <tr v-if="!data || data.length == 0">
                <td class="text-center text-danger" colspan="3">ไม่พบข้อมูล</td>
            </tr>
            </tbody>
        </table>
    </script>
@endif
