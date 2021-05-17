@extends('backend.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid" id="app" data-url="{{$url}}" data-url-check-empty="{{$checkEmpty}}">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4"><i class="fas fa-file-image"></i> {{$title}}</h1>
                    <div class="card-body">
                        <div class="text-right mb-2">
                            <button type="button" class="btn btn-success" @click="viewData">
                                <i class="fa fa-plus"></i> เพิ่มข้อมูล {{$title}}
                            </button>
                        </div>

                        @foreach($getpagestyles as $pagestyle)
                            @foreach($getmodules as $getmodule)
                                @if($getmodule->id == $pagestyle->module_id)
                                    Module_id {{$pagestyle->module_id}}: {{$getmodule->name}} <br>
                                    Type_id: {{$pagestyle->type_id}} {{($pagestyle->type_name)}} <br>
                                @endif()

                            @endforeach
                           list: {{$pagestyle->list}} <br>
                                Table_Name: {{$pagestyle->table_name}} <br>
                           Status: {{$pagestyle->status}} <br> <hr>
                        @endforeach

                        <module-manage :data="allData"  :edit="viewData" :remove="deleteData"></module-manage>
                        <module-modal :data="modal.data" :title="modal.title" :save="saveData"
                                      :check-empty="checkEmpty"></module-modal>
                        <sub-modal :data="modal.data" :table="modal.table" :folder="modal.folder" :title="modal.title"
                                   :save="saveData"></sub-modal>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.pagestyle._layout')
    @include('backend.pagestyle._sub')
    @include('backend.pagestyle._form')
    @include('backend.pagestyle._script')
@endsection
