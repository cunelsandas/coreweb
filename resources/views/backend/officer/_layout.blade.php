@if($layout == 1)
    {{--table-detail--}}
    <script type="text/x-template" id="table-manage">
        <section>
            <div class="row row-cols-1 row-cols-md-4 justify-content-center" v-for="val,key in data">
                <div class="col mb-5" v-for="item,index in val">
                    <div class="card h-100 m-auto">
                        <img :src="item.file.url" class="card-img-top">
                        <div class="card-body text-center">
                            <h5>@{{ item.name }}</h5>
                            <p class="card-text">ตำแหน่ง @{{ item.position }}</p>
                            <p class="card-text">เบอร์โทรศัพท์ @{{ item.telephone }}</p>
                        </div>
                        <div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning" @click="edit(item.id)">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger" @click="remove(item.id)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </script>
@endif
