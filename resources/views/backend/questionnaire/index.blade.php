@extends('backend.layouts.app')
@section('title',$title)
@section('content')
    <script src="https://unpkg.com/knockout@3.5.1/build/output/knockout-latest.js"></script>
    <script src="https://unpkg.com/survey-knockout@1.8.46/survey.ko.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.10/ace.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.10/ext-language_tools.js" type="text/javascript" charset="utf-8"></script>
    <!-- Uncomment to enable Select2 <script src="https://unpkg.com/jquery"></script> <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
    <link href="https://unpkg.com/survey-creator@1.8.46/survey-creator.min.css" type="text/css" rel="stylesheet"/>
    <script src="https://unpkg.com/survey-creator@1.8.46/survey-creator.min.js"></script>
    <div id="surveyContainer">
        <div id="creatorElement"></div>
    </div>
    <div id="app" class="container-fluid" data-site="{{$url}}" data-unset="{{url('unset')}}" data-limit="{{$limit}}">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card border-0 h-100">
                    <h3 class="ml-4 mt-4"><i class="fa fa-bullseye"></i> จัดการ{{$title}}</h3>
                    <div class="card-body">
                        <div class="text-right mb-2">
                            {{--                            <button type="button" class="btn btn-success" @click="viewData('')">--}}
                            {{--                                <i class="fa fa-plus"></i> เพิ่มข้อมูล--}}
                            {{--                            </button>--}}
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
                        <modal-manage :data="modal.data" :files="modal.files" :title="modal.title"
                                      :save-data="saveData" :delete-file="deleteFile"></modal-manage>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        // Show Designer, Test Survey, JSON Editor and additionally Logic tabs
        var options = {
            showLogicTab: true
        };
        //create the SurveyJS Creator and render it in div with id equals to "creatorElement"
        var creator = new SurveyCreator.SurveyCreator("creatorElement", options);
        //Show toolbox in the right container. It is shown on the left by default
        creator.showToolbox = "right";
        //Show property grid in the right container, combined with toolbox
        creator.showPropertyGrid = "right";
        //Make toolbox active by default
        creator.rightContainerActiveItem("toolbox");
    </script>
    @include('backend.questionnaire._form')
    @include('backend.questionnaire._layout')
    @include('backend.questionnaire._script')
@endsection
