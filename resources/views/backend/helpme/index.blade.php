@extends('backend.layouts.app')
@section('title',$title)
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div id="app" class="container-fluid" data-site="{{$url ?? ''}}" data-unset="{{url('unset')}}" data-limit="{{$limit ?? ''}}">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="card border-0 h-100">
                    <h3 class="ml-4 mt-4"><i class="fa fa-volume-control-phone"></i> {{$title ?? ''}}</h3>

                    <div class="text-center mb-2">
                        {{--                        <button type="button" class="btn btn-success" @click="viewData('')">--}}
                        {{--                            <i class="fa fa-plus"></i> แจ้งร้องเรียนร้องทุกข์--}}
                        {{--                        </button>--}}
                    </div>

                    <div class="card-body">
                        <div class="text-right mb-2">

                        </div>
                        <div class="text-right mb-2">
                            <span>คุณกำลังอยู่หน้า @{{ showPage }}</span>
                        </div>
                        <input type="text" name="search" class="form-control form-control-sm mb-1"
                               placeholder="คำค้น..." v-model="mySearch" @keyup="getData(1)">
                        <table-manage :data="data" :edit="viewData" :remove="deleteData"></table-manage>
                        <pagination :page-count="totalPage" :click-handler="getData"
                                    :container-class="'pagination pagination-sm justify-content-start'"
                                    :prev-text="'<'" :next-text="'>'" :page-class="'page-item'"
                                    :page-link-class="'page-link'" :prev-class="'page-item'"
                                    :prev-link-class="'page-link'" :next-class="'page-item'"
                                    :next-link-class="'page-link'" :first-last-button="true"
                                    :first-button-text="'<<'" :last-button-text="'>>'"></pagination>
                        <modal-manage :data="modal.data" :files="modal.files" :routes="modal.routes" :title="modal.title"
                                      :save-data="saveData" :delete-file="deleteFile"></modal-manage>


                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('backend.helpme._form')
    @include('backend.helpme._layout')
    @include('backend.helpme._script')
@endsection
