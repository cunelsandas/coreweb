@if($layout == 1)
    {{--table-detail--}}
    <script type="text/x-template" id="table-manage">
        <section>
            <div class="row connectedSortable" v-for="val,key in data">
                <div class="col-lg-5 mb-5 card-move" v-if="val.length == 1" data-id="0" :data-block="key+1">
                    <div class="card h-100" style="max-width: 200px">
                        <img src="http://web1.com/upload/executive/none.jpg" class="card-img-top">
                        <div class="card-body text-center">
                            <h5>ว่าง</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 card-move" :data-id="item.id" :data-block="key+1" v-for="item,index in val">
                    <div class="card h-100" style="max-width: 200px">
                        <img :src="item.file.url" class="card-img-top">
                        <div class="card-img-overlay text-right p-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning" @click="edit(item.id)">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger" @click="remove(item.id)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <h5>@{{ item.name }}</h5>
                            <p class="card-text">ตำแหน่ง @{{ item.position }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 card-move" v-if="val.length == 1 || val.length % 3 != 0" data-id="0"
                     :data-block="key+1">
                    <div class="card h-100" style="max-width: 200px">
                        <img src="http://web1.com/upload/executive/none.jpg" class="card-img-top">
                        <div class="card-body text-center">
                            <h5>ว่าง</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        --}}{{--<div class="row row-cols-1 row-cols-md-3 connectedSortable">--}}
{{--            <div class="col mb-4" v-for="val,key in data">--}}
{{--                <div class="card h-100 w-100 card-move">--}}
{{--                    <img :src="val.file.url" class="card-img-top">--}}
{{--                    <div class="card-img-overlay text-right p-1">--}}
{{--                        <div class="btn-group">--}}
{{--                            <button type="button" class="btn btn-warning" @click="edit(val.id)">--}}
{{--                                <i class="fa fa-edit"></i>--}}
{{--                            </button>--}}
{{--                            <button type="button" class="btn btn-danger" @click="remove(val.id)">--}}
{{--                                <i class="fa fa-trash"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body text-center">--}}
{{--                        <h5>@{{ val.name }}</h5>--}}
{{--                        <p class="card-text">ตำแหน่ง @{{ val.position }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </script>
@endif
