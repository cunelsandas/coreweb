@extends('backend.layouts.app')
@section('title',$title)
@section('content')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/js/bootstrap-colorpicker.js"></script>
        <style>
            body {
                font-family: 'Prompt', sans-serif;
                font-size: 16px;
            }

            .colorpicker-element .input-group-addon i, .colorpicker-element .add-on i {
                display: inline-block;
                cursor: pointer;
                height: 16px;
                vertical-align: text-top;
                width: 16px;
            }
            .input-group-addon {
                padding: 6px 12px;
                font-size: 14px;
                font-weight: 400;
                line-height: 1;
                color: #555;
                text-align: center;
                background-color: #eee;
                border: 1px solid #ccc;
                border-radius: 2px;
            }

            .hr-droid {
                display: flex;
            }
            .hr-line{
                width: 100%;
                position: relative;
                margin: 15px;
                border-bottom: 5px dotted #a4c639;
            }
            .green{
                border-color: #a4c639;
            }
            .purple {
                border-color: #9860d1;
            }

        </style>

    <div class="container-fluid" id="app" data-url="{{$url}}">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4"><i class="fas fa-code" aria-hidden="true"></i> {{$title}}</h1>
                    <div class="card-body">
                        <div class="text-right mb-2">
{{--                            <button type="button" class="btn btn-success" @click="viewData">--}}
{{--                                <i class="fa fa-plus"></i> เพิ่มข้อมูล {{$title}}--}}
{{--                            </button>--}}
                        </div>
    <form name="frmnews" method="POST" action="{{route('egp.update')}}" enctype="multipart/form-data">
        @method('PUT')
        {{csrf_field()}}

        <label>รหัส EGP (EGP Code)</label>
        <div id="egp_code"  class="input-group col-md-6 col-sm-12">
            <input id="egp_code" name="egp_code" type="text" value="{{$dataEgp->egp_code}}" class="form-control" />
        </div>

{{--        <div id="layout_footer" class="input-group colorpicker-component col-md-12 col-sm-12">--}}
{{--            <div id="layout_footer"  class="input-group col-md-6 col-sm-12">--}}
{{--                <input id="layout_footer" name="layout_footer" type="text" value="{{$dataCss->layout_footer}}" class="form-control" />--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <label>ที่อยู่ (Footer)</label>--}}

{{--        <div id="layout_footer_add" class="input-group colorpicker-component col-md-12 col-sm-12">--}}
{{--            <div id="layout_footer_add"  class="input-group col-md-6 col-sm-12">--}}
{{--                <input id="layout_footer_add" name="layout_footer_add" type="text" value="{{$dataCss->layout_footer_add}}" class="form-control" />--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <label>ติดต่อ (Footer)</label>--}}

{{--        <div id="layout_footer_tel" class="input-group colorpicker-component col-md-12 col-sm-12">--}}
{{--            <div id="layout_footer_tel"  class="input-group col-md-6 col-sm-12">--}}
{{--                <input id="layout_footer_tel" name="layout_footer_tel" type="text" value="{{$dataCss->layout_footer_tel}}" class="form-control" />--}}
{{--            </div>--}}
{{--        </div>--}}


    <br>
        <div>
            <button type="submit" class="form-control btn-success" onclick="return confirm('บันทึกข้อมูล')">บันทึก</button>
        </div>
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('backend.egp._layout')
    @include('backend.egp._sub')
    @include('backend.egp._form')
{{--    @include('backend.style._script')--}}
@endsection
