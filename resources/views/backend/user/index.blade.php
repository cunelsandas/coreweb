@extends('backend.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid" id="app" data-url="{{$url}}" data-permission="{{url('wms/permission')}}">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4"><i class="fa fa-user-plus"></i> จัดการ{{$title}}</h1>
                    <div class="card-body">
                        <div class="text-right mb-2">
                            <button type="button" class="btn btn-success" @click="viewData">
                                <i class="fa fa-plus"></i> เพิ่มข้อมูล{{$title}}
                            </button>
                        </div>
                        <div class="text-right mb-2"><span>คุณกำลังอยู่หน้า @{{ page }}</span></div>
                        <div class="form-group mb-1">
                            <input type="text" name="search" id="search" class="form-control form-control-sm"
                                   v-model="search" @keyup="getData(1)">
                        </div>
                        <user-manage :data="allData" :edit="viewData" :remove="deleteData"
                                     :permission="permissionView"></user-manage>
                        <permission-manage :data="permission" :save="permissionSave"></permission-manage>
                        <modal-user :data="modal.data" :module="modal.module" :title="modal.title"
                                    :save="saveData"></modal-user>
                        <pagination :page-count="totalPage" :click-handler="getData" v-model="page"
                                    :container-class="'pagination pagination-sm justify-content-start mt-2'"
                                    :page-link-class="'page-link'" :prev-class="'page-item'" :page-class="'page-item'"
                                    :prev-link-class="'page-link'" :next-class="'page-item'"
                                    :next-link-class="'page-link'" :first-last-button="true"
                                    :prev-text="'<'" :next-text="'>'" :first-button-text="'<<'"
                                    :last-button-text="'>>'"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.user._form')
    @include('backend.user._permission')
    @include('backend.user._layout')
    @include('backend.user._script')
@endsection
