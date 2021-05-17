@extends('itg.layouts.app')
@section('title',$title)
@section('content')
    <div id="app-domains" class="container-fluid" data-url="{{$url}}" data-permission="{{url('itg/permission')}}">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <h1 class="ml-4 mt-4"><i class="fa fa-user-edit"></i> Domains Manage</h1>
                    <div class="card-body">
                        <div class="text-right mb-2">
                            <button type="button" class="btn btn-success" @click="viewData">
                                <i class="fa fa-plus"></i> เพิ่มข้อมูล
                            </button>
                        </div>
                        <div class="text-right mb-2">
                            <span>คุณกำลังอยู่หน้า @{{ showPage }}</span>
                        </div>
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="คำค้น..."
                               v-model="mySearch" @keyup="getData(1)">
                        <table-domains :data="data" :edit="viewData" :remove="deleteData"
                                       :permission="permissionView"></table-domains>
                        <pagination :page-count="totalPage" :click-handler="getData"
                                    :container-class="'pagination pagination-sm justify-content-start'"
                                    :prev-text="'<'" :next-text="'>'" :page-class="'page-item'"
                                    :page-link-class="'page-link'" :prev-class="'page-item'"
                                    :prev-link-class="'page-link'" :next-class="'page-item'"
                                    :next-link-class="'page-link'" :first-last-button="true"
                                    :first-button-text="'<<'" :last-button-text="'>>'"></pagination>
                        <modal-domains :data="modal.data" :title="modal.title" :save-data="saveData"></modal-domains>
                        <permission-manage :data="permission" :save="permissionSave"></permission-manage>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('itg.domain._form')
    @include('itg.domain._layout')
    @include('itg.domain._permission')
    @include('itg.domain._script')
@endsection
