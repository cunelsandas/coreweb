@extends('frontend_layouts2.default_layout2.layout.app')
@section('title',$title)
@section('content')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */

        /* Optional: Makes the sample page fill the window. */
        #map2 {
            height: 400px;
            width: 100%;
        }
    </style>

    <div id="app" class="container-fluid" data-site="{{$url ?? ''}}" data-unset="{{url('unset')}}" data-limit="{{$limit ?? ''}}">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4"><i class="fas fa-file-image"></i> {{$title ?? ''}}</h1>

                    <div class="text-center mb-2">
                        <button type="button" class="btn btn-success" @click="viewData('')">
                            <i class="fa fa-plus"></i> ร้องเรียนการทุจริต
                        </button>
                    </div>
                    <div class="card-body" style="margin: 0 auto;">
                        <div class="text-justify mb-2 mt-2">
                            <p style="text-decoration: underline"><b>เงื่อนไข</b></p>
                            <p>1. กรุณาป้อนข้อมูลให้ครบทุกช่อง เพื่อความสะดวกในการดำเนินการ</p>
                            <p>2. กรุณาใช้คำที่สุภาพและไม่เป็นการหมิ่นประมาท ใส่ร้ายผู้อื่น</p>
                            <p>3. ทางทีมงานขอสงวนสิทธิ์ในการลบข้อความไม่เหมาะสมใดๆโดยมิต้องแจ้งล่วงหน้า</p>
                            <p style="color: red">**รายละเอียดและชื่อของท่านจะไม่ถูกเปิดเผย
                                ข้าพเจ้าขอยืนยันข้อความทั้งหมดเป็นความจริง</p>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="text-right mb-2">

                        </div>
                        <div class="text-right mb-2">
{{--                            <span>คุณกำลังอยู่หน้า @{{ showPage }}</span>--}}
                        </div>
{{--                        <input type="text" name="search" class="form-control form-control-sm mb-1"--}}
{{--                               placeholder="คำค้น..." v-model="mySearch" @keyup="getData(1)">--}}
                        <table-manage :data="data" :edit="viewData"></table-manage>

                        <modal-manage :data="modal.data" :routes="modal.routes" :title="modal.title"
                                      :save-data="saveData" :delete-file="deleteFile"></modal-manage>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('frontend_layouts2.corruption._form')
    @include('frontend_layouts2.corruption._layout')
    @include('frontend_layouts2.corruption._script')
@endsection
