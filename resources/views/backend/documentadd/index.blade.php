@extends('backend.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid" id="app" data-url="{{$url}}" data-url-check-empty="{{$checkEmpty}}">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4"><i class="fas fa fa-list-alt"></i> จัดการ{{$title}}</h1>
                    <div class="card-body">
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
    @include('backend.documentadd._layout')
    @include('backend.documentadd._sub')
    @include('backend.documentadd._form')
    @include('backend.documentadd._script')
@endsection
