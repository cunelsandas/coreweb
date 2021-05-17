<script type="text/x-template" id="menu-manage">
    <div class="row">
        <div class="col-12">
            <ul v-if="data.length != 0" class="nav nav-pills flex-column" v-for="val,key in data">
                <li class="nav-item form-inline justify-content-between bg-light">
                    <a class="nav-link" href="#"><i
                            :class="val.sub.length == 0 ? 'far fa-folder' : 'far fa-folder-open'"></i> @{{ val.name
                        }}</a>
                    <div class="btn-group btn-group-sm pr-1">
                        <button type="button" class="btn btn-warning" @click="edit(val.id)"><i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger" @click="remove(val.id)"><i
                                class="fas fa-trash-alt"></i></button>
                    </div>
                </li>
                <li class="nav-item">
                    <ul class="nav flex-column" v-for="item,index in val.sub">
                        <li class="nav-item form-inline justify-content-between">
                            <a class="nav-link" href="#"><i class="fas fa-angle-right pl-3"></i> @{{ item.name }}</a>
                            <div class="btn-group btn-group-sm pr-1">
                                <button type="button" class="btn btn-warning" @click="edit(item.id)"><i
                                        class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" @click="remove(item.id)"><i
                                        class="fas fa-trash-alt"></i></button>
                            </div>
                        </li>
                        <li class="nav-item">
                            <ul class="nav flex-column" v-for="v,k in item.sub">
                                <li class="nav-item form-inline justify-content-between">
                                    <a class="nav-link" href="#"><i class="fas fa-angle-double-right pl-5"></i>
                                        @{{ v.name }}</a>
                                    <div class="btn-group btn-group-sm pr-1">
                                        <button type="button" class="btn btn-warning" @click="edit(v.id)"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" @click="remove(v.id)"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <h5 v-if="data.length == 0" class="text-center text-danger">ไม่พบข้อมูล</h5>
        </div>
    </div>
</script>
