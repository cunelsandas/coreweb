<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/wms/dashboard" class="brand-link">
        <i class="fa fa-tasks mt-2 ml-3"></i>
        <span class="brand-text font-weight-light">ระบบจัดการ (WMS)</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">เมนูระบบ</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link has-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            สรุปเว็บไซต์ <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('wms/dashboard')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>สรุปข้อมูลเว็บไซต์</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr style="height: 1px">
                <li class="nav-header">เนื้อหา</li>
                @foreach(getWmsMainMenu() as $key => $value)
                    @if(getPermissionModule($value->id))
                        {{--                        <li class="nav-header">{{$value->name}}</li>--}}
                        @if($value->manage_sub == 1)

                            @php
                                $table_name = $value->table_name;
                                $module_sub = db2()->table($table_name)->get();
                            @endphp
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link has-link">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>
                                        {{$value->name}}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="background-color: grey;">
                                    @foreach($module_sub as $index => $item)
                                        @if(getPermissionModule($value->id,$item->id))
                                            <li class="nav-item">
                                                <a href="{{url("wms/$value->route_name/$item->type")}}"
                                                   class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{$item->name}}</p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{url("wms/$value->route_name")}}" class="nav-link">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>{{$value->name}}</p>
                                </a>
                            </li>
                        @endif
                    @endif
                @endforeach

                <hr style="height: 1px">
                <li class="nav-header">ไฟล์เอกสาร</li>
                @foreach(getWmsFile() as $key => $value)
                    {{--                        <li class="nav-header">{{$value->name}}</li>--}}
                    @if($value->manage_sub == 1)

                        @php
                            $table_name = $value->table_name;
                            $module_sub = db2()->table($table_name)->get();
                        @endphp
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link has-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    {{$value->name}}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: grey;">
                                @foreach($module_sub as $index => $item)
                                    @if(getPermissionModule($value->id,$item->id))
                                        <li class="nav-item">
                                            <a href="{{url("wms/$value->route_name/$item->type")}}"
                                               class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{$item->name}}</p>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{url("wms/$value->route_name")}}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{$value->name}}</p>
                            </a>
                        </li>
                    @endif
                @endforeach

                <hr style="height: 1px">
                <li class="nav-header">มัลติมีเดีย (Multimedia)</li>
                @foreach(getWmsMultimedia() as $key => $value)
                    @if(getPermissionModule($value->id))
                        {{--                        <li class="nav-header">{{$value->name}}</li>--}}
                        @if($value->manage_sub == 1)

                            @php
                                $table_name = $value->table_name;
                                $module_sub = db2()->table($table_name)->get();
                            @endphp
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link has-link">
                                    <i class="nav-icon fas fa-play"></i>
                                    <p>
                                        {{$value->name}}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="background-color: grey;">
                                    @foreach($module_sub as $index => $item)
                                        @if(getPermissionModule($value->id,$item->id))
                                            <li class="nav-item">
                                                <a href="{{url("wms/$value->route_name/$item->type")}}"
                                                   class="nav-link">
                                                    <i class="far fa-play nav-icon"></i>
                                                    <p>{{$item->name}}</p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{url("wms/$value->route_name")}}" class="nav-link">
                                    <i class="fas fa-play nav-icon"></i>
                                    <p>{{$value->name}}</p>
                                </a>
                            </li>
                        @endif
                    @endif
                @endforeach

                <hr style="height: 1px">
                <li class="nav-header">บริการออนไลน์(E-Service)</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link has-link">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <p>
                            บริการออนไลน์ <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        @foreach(getWmsEservice() as $key => $value)
                            @if(getPermissionModule($value->id))
                                {{--                                                <li class="nav-header">{{$value->name}}</li>--}}
                                @if($value->manage_sub == 1)

                                    @php
                                        $table_name = $value->table_name;
                                        $module_sub = db2()->table($table_name)->get();
                                    @endphp
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link has-link">
                                            <i class="nav-icon fas fa-circle"></i>
                                            <p>
                                                {{$value->name}}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview" style="background-color: grey;">
                                            @foreach($module_sub as $index => $item)
                                                @if(getPermissionModule($value->id,$item->id))
                                                    <li class="nav-item">
                                                        <a href="{{url("wms/$value->route_name/$item->type")}}"
                                                           class="nav-link">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>{{$item->name}}</p>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{url("wms/$value->route_name")}}" class="nav-link">
                                            <i class="fas fa-circle nav-icon"></i>
                                            <p>{{$value->name}}</p>
                                        </a>
                                    </li>
                                    @endif
                                    @endif
                                    @endforeach
                                    </li>
                    </ul>
                </li>

                <hr style="height: 1px">

                <li class="nav-header">ข้อมูลระบบ (System)</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link has-link">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <p>
                            ข้อมูลระบบ <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        @foreach(getWmsSystem() as $key => $value)
                            @if(getPermissionModule($value->id))
                                {{--                                                <li class="nav-header">{{$value->name}}</li>--}}
                                @if($value->manage_sub == 1)

                                    @php
                                        $table_name = $value->table_name;
                                        $module_sub = db2()->table($table_name)->get();
                                    @endphp
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link has-link">
                                            <i class="nav-icon fas fa-circle"></i>
                                            <p>
                                                {{$value->name}}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview" style="background-color: grey;">
                                            @foreach($module_sub as $index => $item)
                                                @if(getPermissionModule($value->id,$item->id))
                                                    <li class="nav-item">
                                                        <a href="{{url("wms/$value->route_name/$item->type")}}"
                                                           class="nav-link">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>{{$item->name}}</p>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{url("wms/$value->route_name")}}" class="nav-link">
                                            <i class="fas fa-circle nav-icon"></i>
                                            <p>{{$value->name}}</p>
                                        </a>
                                    </li>
                                    @endif
                                    @endif
                                    @endforeach
                                    </li>
                    </ul>
                </li>

                <li class="nav-header">ผู้ดูแลระบบ (Administrator)</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link has-link">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>
                            ผู้ดูแลระบบ <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        @foreach(getWmsAdmin() as $key => $value)
                            @if(getPermissionModule($value->id))
                                {{--                                                <li class="nav-header">{{$value->name}}</li>--}}
                                @if($value->manage_sub == 1)

                                    @php
                                        $table_name = $value->table_name;
                                        $module_sub = db2()->table($table_name)->get();
                                    @endphp
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link has-link">
                                            <i class="nav-icon fas fa-circle"></i>
                                            <p>
                                                {{$value->name}}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview" style="background-color: grey;">
                                            @foreach($module_sub as $index => $item)
                                                @if(getPermissionModule($value->id,$item->id))
                                                    <li class="nav-item">
                                                        <a href="{{url("wms/$value->route_name/$item->type")}}"
                                                           class="nav-link">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>{{$item->name}}</p>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{url("wms/$value->route_name")}}" class="nav-link">
                                            <i class="fas fa-circle nav-icon"></i>
                                            <p>{{$value->name}}</p>
                                        </a>
                                    </li>
                                    @endif
                                    @endif
                                    @endforeach
                                    </li>
                    </ul>
                </li>


                <li class="nav-header"></li>
                <li class="nav-header"></li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
