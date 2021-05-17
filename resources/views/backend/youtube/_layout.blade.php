@if($layout == 1)
    {{--table-detail--}}
    <script type="text/x-template" id="table-manage">
        <div class="row my-2">
            <div v-for="val in data" class="col-lg-4 col-sm-6 mt-2">
                <div class="card h-100">
                    <div class="card-img p-1 text-center">
                        <img class="card-img-top" :src="'http://i3.ytimg.com/vi/'+val.embed+'/0.jpg'">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title head">@{{ val.name }}</h5>
                        <div class="card-text detail text-truncate">@{{ val.detail }}</div>
                        <div class="btn-group btn-group-sm btn-block">
                            <button @click="edit(val.id)" type="button" class="btn btn-warning"title="แก้ไข"><i class="fa fa-edit"></i></button>
                            <button @click="remove(val.id)" type="button" class="btn btn-danger"title="ลบ"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="data.length == 0" class="col-12 mt-2">
                <p class="text-center text-danger">ไม่พบข้อมูล</p>
            </div>
        </div>
    </script>
@endif
