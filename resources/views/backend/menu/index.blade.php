@extends('backend.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid" id="app" data-url="{{$url}}">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4"><i class="fas fa fa-bars"></i> จัดการ {{$title}}</h1>
                    <div class="card-body">
                        <div class="text-right mb-2">
                            <button type="button" class="btn btn-success" @click="viewData">
                                <i class="fa fa-plus"></i> เพิ่มข้อมูล {{$title}}
                            </button>
                        </div>
                        <menu-manage :data="allData" :edit="viewData" :remove="deleteData"></menu-manage>
                        <modal-menu :data="modal.data" :module="modal.module" :menu="modal.menu" :title="modal.title"
                                    :save="saveData"></modal-menu>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.menu._layout')
    @include('backend.menu._form')
    @include('backend.menu._script')
@endsection
