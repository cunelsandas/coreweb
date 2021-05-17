@if($layout == 1)
    {{--first-detail--}}
    <script type="text/x-template" id="table-manage">
        <div class="row my-2">
            <div class="col-lg-6 pr-lg-0 py-1" v-for="val,key in data" v-if="val._limit == 0">
                <div class="card h-100">
                    <div class="card-img p-1 text-center h-100">
                        <img v-if="val.file.img" class="card-img-top" :src="val.file.url">
                        <i v-if="val.file.type == 'doc' || val.file.type == 'docx'"
                           class="fas fa-10x fa-file-word text-primary"></i>
                        <i v-if="val.file.type == 'xls' || val.file.type == 'xlsx'"
                           class="fas fa-10x fa-file-excel text-success"></i>
                        <i v-if="val.file.type == 'pdf'"
                           class="fas fa-10x fa-file-pdf text-danger"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title head">@{{ val.name }}</h5>
                        <div class="card-text detail">@{{ val.detail }}</div>
                        <div class="btn-group btn-group-sm btn-block">
                            <button @click="edit(val.id)" type="button" class="btn btn-warning" title="แก้ไข"><i
                                    class="fa fa-edit"></i></button>
                            <button @click="remove(val.id)" type="button" class="btn btn-danger" title="ลบ"><i
                                    class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 pl-lg-1 py-1"
                         v-for="val,key in data"
                         v-if="val._limit != 0">
                        <div class="card h-100">
                            <div class="card-img p-1 text-center h-100">
                                <img v-if="val.file.img" class="card-img-top h-100" :src="val.file.url">
                                <i v-if="val.file.type == 'doc' || val.file.type == 'docx'"
                                   class="fas fa-5x fa-file-word text-primary"></i>
                                <i v-if="val.file.type == 'xls' || val.file.type == 'xlsx'"
                                   class="fas fa-5x fa-file-excel text-success"></i>
                                <i v-if="val.file.type == 'pdf'"
                                   class="fas fa-5x fa-file-pdf text-danger"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title head">@{{ val.name }}</h5>
                                <div class="card-text detail">@{{ val.detail }}</div>
                                <div class="btn-group btn-group-sm btn-block">
                                    <button @click="edit(val.id)" type="button" class="btn btn-warning" title="แก้ไข"><i
                                            class="fa fa-edit"></i></button>
                                    <button @click="remove(val.id)" type="button" class="btn btn-danger" title="ลบ"><i
                                            class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
@elseif($layout == 2)
    {{--big-size-detail--}}
    <script type="text/x-template" id="table-manage">
        <div class="row p-2">
            <div v-for="val,key in data"
                 :class="val._limit == 0 ? 'col col-lg-6 mb-2 p-1':'col-lg-3 col-6 mb-2 p-1'">
                <div class="card h-100">
                    <div class="card-img p-1 text-center h-100">
                        <img v-if="val.file.img" class="card-img-top" :src="val.file.url">
                        <i v-if="val.file.type == 'doc' || val.file.type == 'docx'"
                           class="fas fa-8x fa-file-word text-primary"></i>
                        <i v-if="val.file.type == 'xls' || val.file.type == 'xlsx'"
                           class="fas fa-8x fa-file-excel text-success"></i>
                        <i v-if="val.file.type == 'pdf'"
                           class="fas fa-8x fa-file-pdf text-danger"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title head">@{{ val.name }}</h5>
                        <div class="card-text detail">@{{ val.detail }}</div>
                        <div class="btn-group btn-group-sm btn-block">
                            <button @click="edit(val.id)" type="button" class="btn btn-warning" title="แก้ไข"><i
                                    class="fa fa-edit"></i></button>
                            <button @click="remove(val.id)" type="button" class="btn btn-danger" title="ลบ"><i
                                    class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
@elseif($layout == 3)
    {{--col-detail--}}
    <script type="text/x-template" id="table-manage">
        <div class="row my-2">
            <div v-for="val in data" class="col-lg-2 col-sm-3 mt-2">
                <div class="card h-100">
                    <div class="card-img p-1 text-center">
                        <img v-if="val.file.img" class="card-img-top" :src="val.file.url">
                        <i v-if="val.file.type == 'doc' || val.file.type == 'docx'"
                           class="fas fa-10x fa-file-word text-primary"></i>
                        <i v-if="val.file.type == 'xls' || val.file.type == 'xlsx'"
                           class="fas fa-10x fa-file-excel text-success"></i>
                        <i v-if="val.file.type == 'pdf'" class="fas fa-10x fa-file-pdf text-danger"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title head">@{{ val.name }}</h5>
                        <div class="card-text detail">@{{ val.detail }}</div>
                        <div class="btn-group btn-group-sm btn-block">
                            <button @click="edit(val.id)" type="button" class="btn btn-warning" title="แก้ไข"><i
                                    class="fa fa-edit"></i></button>
                            <button @click="remove(val.id)" type="button" class="btn btn-danger" title="ลบ"><i
                                    class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
@elseif($layout == 4)
    {{--row-detail--}}
    <script type="text/x-template" id="table-manage">
        <div class="row my-2">
            <div class="col-12">
                <div class="card mb-3" v-for="val,key in data">
                    <div class="row no-gutters">
                        <div class="col-md-4 p-1 text-center">
                            <img v-if="val.file.img" class="card-img-top" :src="val.file.url">
                            <i v-if="val.file.type == 'doc' || val.file.type == 'docx'"
                               class="fas fa-10x fa-file-word text-primary"></i>
                            <i v-if="val.file.type == 'xls' || val.file.type == 'xlsx'"
                               class="fas fa-10x fa-file-excel text-success"></i>
                            <i v-if="val.file.type == 'pdf'"
                               class="fas fa-10x fa-file-pdf text-danger"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <a class="btn close text-danger" title="ลบ" @click="remove(val.id)">
                                    <span aria-hidden="true">×</span>
                                </a>
                                <h5 class="card-title">
                                    <a class="card-link" href="#!" title="แก้ไข" @click="edit(val.id)">@{{ val.name
                                        }}</a>
                                </h5>
                                <p class="card-text text-truncate">@{{ val.detail }}</p>
                                <p class="card-text"><small class="text-muted"></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
@elseif($layout == 5)
    {{--table-detail--}}
    <script type="text/x-template" id="table-manage">
        <table class="table table-sm table-borderless">
            <thead class="thead-dark text-center">
            <tr>
                <th width="50">ลำดับ</th>
                <th>ชื่อ</th>
                <th width="100">จัดการ</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="val,key in data">
                <td class="text-center">@{{ val.list }}</td>
                <td>@{{ val.name }}</td>
                <td class="text-center">
                    <div class="btn-group btn-group-sm">
                        <button @click="edit(val.id)" type="button" class="btn btn-warning" title="แก้ไข"><i
                                class="fa fa-edit"></i></button>
                        <button @click="remove(val.id)" type="button" class="btn btn-danger" title="ลบ"><i
                                class="fa fa-trash"></i></button>
                    </div>
                </td>
            </tr>
            <tr v-if="!data || data.length == 0">
                <td class="text-center text-danger" colspan="3">ไม่พบข้อมูล</td>
            </tr>
            </tbody>
        </table>
    </script>
@endif
