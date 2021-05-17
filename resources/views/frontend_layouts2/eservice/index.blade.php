@extends('frontend.layouts.app')
@section('title',$title)
@section('content')
    <div id="app" class="container-fluid" data-site="{{$url ?? ''}}" data-unset="{{url('unset')}}" data-limit="{{$limit ?? ''}}">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4" style="text-decoration: underline"><i class=""></i> {{$title}}</h1>
                    <div class="card-body">

                        <div class="text-right mb-2">
                            <span>คุณกำลังอยู่หน้า @{{ showPage }}</span>
                        </div>
                        <input type="text" name="search" class="form-control form-control-sm mb-1"
                               placeholder="คำค้น..." v-model="mySearch" @keyup="getData(1)">
                        <table-manage :data="data" ></table-manage>

                        <pagination :page-count="totalPage" :click-handler="getData"
                                    :container-class="'pagination pagination-sm justify-content-start'"
                                    :prev-text="'<'" :next-text="'>'" :page-class="'page-item'"
                                    :page-link-class="'page-link'" :prev-class="'page-item'"
                                    :prev-link-class="'page-link'" :next-class="'page-item'"
                                    :next-link-class="'page-link'" :first-last-button="true"
                                    :first-button-text="'<<'" :last-button-text="'>>'"></pagination>
                        <modal-manage :data="modal.data" :files="modal.files" :title="modal.title"></modal-manage>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('frontend.catalog._form')
    @include('frontend.catalog._layout')
    @include('frontend.catalog._script')
@endsection
