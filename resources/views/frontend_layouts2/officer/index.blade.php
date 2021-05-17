@extends('frontend_layouts2.default_layout2.layout.app')
@section('title',$title)
@section('content')
    <style>
        body{
            color: black;
        }
    </style>
    <div id="app" class="container-fluid" data-site="{{$url}}" data-unset="{{url('unset')}}" data-limit="{{$limit}}">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4"><i class="fas fa-file-image"></i> {{$title}}</h1>
                    <div class="card-body">
                        <div class="text-right mb-2">

                        </div>
                        <table-manage :data="data" :edit="viewData" :remove="deleteData"></table-manage>
                        <modal-manage :data="modal.data" :files="modal.files" :title="modal.title"
                                      :save-data="saveData" :delete-file="deleteFile"></modal-manage>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend_layouts2.officer._form')
    @include('frontend_layouts2.officer._layout')
    @include('frontend_layouts2.officer._script')
@endsection
