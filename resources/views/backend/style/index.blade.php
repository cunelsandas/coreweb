@extends('backend.layouts.app')
@section('title',$title)
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css"
          rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/js/bootstrap-colorpicker.js"></script>


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

        .hr-line {
            width: 100%;
            position: relative;
            margin: 15px;
            border-bottom: 5px dotted #a4c639;
        }

        .green {
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
                    <h1 class="ml-4 mt-4"><i class="fa fa-paint-brush" aria-hidden="true"></i> {{$title}}</h1>
                    <div class="card-body">
                        <div class="text-right mb-2">
                            {{--                            <button type="button" class="btn btn-success" @click="viewData">--}}
                            {{--                                <i class="fa fa-plus"></i> เพิ่มข้อมูล {{$title}}--}}
                            {{--                            </button>--}}
                        </div>
                        <form name="frmnews" method="POST" action="{{route('style.update')}}"
                              enctype="multipart/form-data">
                            @method('PUT')
                            {{csrf_field()}}

                            <label>รูปแบบเว็บไซต์</label>
                            <div id="style" class="input-group col-md-6 col-sm-12">
                                <input id="style" name="style" type="text" value="{{$dataCss->style}}"
                                       class="form-control"/>

                            </div>

                            <label>สีพื้นหลัง (Background Color)</label>
                            <div id="bg_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_col" name="bg_col" type="text" value="{{$dataCss->bg_col}}"
                                       class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังสไลด์โชว์ผู้บริหาร (Background Executive Slideshow)</label>
                            <div id="bg_first_slide" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_first_slide" name="bg_first_slide" type="text"
                                       value="{{$dataCss->bg_first_slide}}" class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังเมนูผู้บริหาร (Background Executive Menu)</label>
                            <div id="bg_executive_menu" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_executive_menu" name="bg_executive_menu" type="text"
                                       value="{{$dataCss->bg_executive_menu}}" class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังสไลด์โชว์ประชาสัมพันธ์ (Background News Menu)</label>
                            <div id="bg_second_slide" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_second_slide" name="bg_second_slide" type="text"
                                       value="{{$dataCss->bg_second_slide}}" class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังแบนเนอร์ (Background Banner)</label>
                            <div id="bg_banner" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_banner" name="bg_banner" type="text" value="{{$dataCss->bg_banner}}"
                                       class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังข่าวสารความเคลื่อนไหว (Background News)</label>
                            <div id="bg_news_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_news_col" name="bg_news_col" type="text" value="{{$dataCss->bg_news_col}}"
                                       class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังสื่อวีดีโอ (Background Video)</label>
                            <div id="bg_youtube" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_youtube" name="bg_youtube" type="text" value="{{$dataCss->bg_youtube}}"
                                       class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังกิจกรรมโครงการ (Background Activity Layout)</label>
                            <div id="bg_activity_layout" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_activity_layout" name="bg_activity_layout" type="text"
                                       value="{{$dataCss->bg_activity_layout}}" class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังสถานที่ท่องเที่ยว (Background Travel Layout)</label>
                            <div id="bg_travel" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_travel" name="bg_travel" type="text" value="{{$dataCss->bg_travel}}"
                                       class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังสินค้าพื้นบ้าน (Background OTOP Layout)</label>
                            <div id="bg_otop" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_otop" name="bg_otop" type="text" value="{{$dataCss->bg_otop}}"
                                       class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังลิงค์ภายนอก (Background Linkout Layout)</label>
                            <div id="bg_linkout" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_linkout" name="bg_linkout" type="text" value="{{$dataCss->bg_linkout}}"
                                       class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>สีพื้นหลังบริการประชาชน (Background Service Layout)</label>
                            <div id="bg_service" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="bg_service" name="bg_service" type="text" value="{{$dataCss->bg_service}}"
                                       class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>

                            <label>สีตัวอักษร (Font Color)</label>
                            <div id="font_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="font_col" name="font_col" type="text" value="{{$dataCss->font_col}}"
                                       class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            {{--        <label>ภาพพื้นหลัง URL รอทำปุ่มอัพโหลด</label>--}}
                            {{--        <div id="body_img" class="input-group ">--}}
                            {{--            <input type="text" value="{{$dataCss->bg_pic}}" class="form-control col-6" />--}}

                            {{--        </div>--}}
                            <label>ความสูงโลโก้</label>
                            <div id="logo_h" class="input-group col-md-6 col-sm-12">
                                <input id="web_logo_h" name="web_logo_h" type="text" value="{{$dataCss->web_logo_h}}"
                                       class="form-control"/>พิกเซล
                            </div>
                            <br>
                            {{--        ที่อยู่ไฟล์ภาพ: <img src="{{url('/')}}/{{$dataCss->header_bg_img}}">--}}
                            {{--        {{$dataCss->header_bg_img}}--}}

                            <br>
                            <br>
                            {{--        <label>Fonts</label>--}}
                            <div id="body_font">
                                {{--            <td>--}}
                                {{--                <select class="form-control col-6" name="font_family">--}}
                                {{--                    --}}{{--                        @php--}}
                                {{--                    --}}{{--                        $font=array('THSarabunNew','THBaijam','THK2DJuly8','THChakraPetch','THNiramitAS','Tahoma' ,'sans-serif','AngsanaNew');--}}
                                {{--                    --}}{{--                        foreach($font as $value){--}}
                                {{--                    --}}{{--                            if($font_family==$value){--}}
                                {{--                    --}}{{--                                echo "<option value='$value' selected>$value</option>";--}}
                                {{--                    --}}{{--                            }else{--}}
                                {{--                    --}}{{--                                echo "<option value='$value'>$value</option>";--}}
                                {{--                    --}}{{--                            }--}}
                                {{--                    --}}{{--                        }--}}
                                {{--                    --}}{{--                       @endphp--}}
                                {{--                    <option value="1">THSarabunNew</option>--}}
                                {{--                    <option value="2">SanSerif</option>--}}
                                {{--                    <option value="3">AngsanaNew</option>--}}
                                {{--                    <option value="4">Tahoma</option>--}}
                                {{--                </select>--}}
                                {{--            </td>--}}

                                {{--               <label>ขนาดตัวอักษร</label>--}}
                                {{--            <div id="logo_h" class="input-group ">--}}
                                {{--                <input class="form-control col-1" type="text" name="font_size" value="14" size="3">pixel--}}
                                {{--            </div>--}}

                                <label>ข้อความตัวอักษรวิ่ง (Marquee Background Color)</label>
                                <div id="marquee_text" class="input-group col-md-6 col-sm-12">
                                    <input id="marquee_text" name="marquee_text" type="text"
                                           value="{{$dataCss->marquee_text}}" class="form-control"/>

                                </div>
                                <label>สีพื้นหลังตัวอักษรวิ่ง (Marquee Background Color)</label>
                                <div id="web_m_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                    <input id="web_m_col" name="web_m_col" type="text" value="{{$dataCss->web_m_col}}"
                                           class="form-control"/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                                <label>สีตัวอักษรวิ่ง (Marquee Font Color)</label>
                                <div id="web_m_fnt_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                    <input id="web_m_fnt_col" name="web_m_fnt_col" type="text"
                                           value="{{$dataCss->web_m_fnt_col}}" class="form-control"/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>

                                <label>สีพื้นหลังเมนูด้านซ้าย (Navbar Color)</label>
                                <div id="menu_nav_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                    <input id="menu_nav_col" name="menu_nav_col" type="text"
                                           value="{{$dataCss->menu_nav_col}}" class="form-control"/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>

                                <label>สีตัวอักษรเมนูด้านซ้าย (Navbar Font Color)</label>
                                <div id="menu_fnt_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                    <input id="menu_fnt_col" name="menu_fnt_col" type="text"
                                           value="{{$dataCss->menu_fnt_col}}" class="form-control"/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>

                                <label>สีพื้นหลังเมนูด้านซ้ายขณะชี้ (Navbar Hover)</label>
                                <div id="menu_pnt_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                    <input id="menu_pnt_col" name="menu_pnt_col" type="text"
                                           value="{{$dataCss->menu_pnt_col}}" class="form-control"/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>

                                <div class="hr-droid">
                                    <div class="hr-line green"></div>
                                    <div class="hr-line purple"></div>
                                </div>

                                <label>สีตัวอักษร แถบเมนูย่อยจัดซื้อจัดจ้าง</label>
                                <div id="front_menu_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                    <input id="front_menu_col" name="front_menu_col" type="text"
                                           value="{{$dataCss->front_menu_col}}" class="form-control"/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <label>ความสูงเมนูแถบเมนูบน</label>
                            <div id="menu_h" class="input-group col-md-6 col-sm-12">
                                <input id="web_nav_h" name="web_nav_h" type="text" value="{{$dataCss->web_nav_h}}"
                                       class="form-control"/>พิกเซล
                            </div>
                            <label>สีพื้นหลัง แถบเมนูบน (Menu Nav Bar)</label>
                            <div id="web_nav_bgcol" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="web_nav_bgcol" name="web_nav_bgcol" type="text"
                                       value="{{$dataCss->web_nav_bgcol}}" class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                            <label>Layout กิจกรรม</label>

                            <div id="layout_ac" class="input-group colorpicker-component col-md-12 col-sm-12">
                                <div><input type="radio" name="layout_activity"
                                            @if($dataCss->layout_activity==1) checked @endif id="layout1" value="1">
                                    <img src="{{url('/')}}/upload/bg/layout1.png" style="width: 200px;height: 120px">
                                </div>
                                <br>
                                <div><input type="radio" name="layout_activity"
                                            @if($dataCss->layout_activity==2) checked @endif id="layout2" value="2">
                                    <img src="{{url('/')}}/upload/bg/layout2.png" style="width: 200px;height: 120px">
                                </div>
                                <br>
                                <div><input type="radio" name="layout_activity"
                                            @if($dataCss->layout_activity==3) checked @endif id="layout3" value="3">
                                    <img src="{{url('/')}}/upload/bg/layout3.png" style="width: 200px;height: 120px">
                                </div>
                            </div>

                            <div class="hr-droid">
                                <div class="hr-line green"></div>
                                <div class="hr-line purple"></div>
                            </div>

                            <label>ส่วน Footer</label>

                            <div id="layout_footer_col" class="input-group colorpicker-component col-md-6 col-sm-12">
                                <input id="layout_footer_col" name="layout_footer_col" type="text"
                                       value="{{$dataCss->layout_footer_col}}" class="form-control"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>

                            {{--        <div id="layout_footer" class="input-group colorpicker-component col-md-12 col-sm-12">--}}
                            {{--            <div id="layout_footer"  class="input-group col-md-6 col-sm-12">--}}
                            {{--                <input id="layout_footer" name="layout_footer" type="text" value="{{$dataCss->layout_footer}}" class="form-control" />--}}
                            {{--            </div>--}}
                            {{--        </div>--}}

                            <label>ข้อความกลาง (Footer)</label>

                            <div id="layout_footer_add" class="input-group colorpicker-component col-md-12 col-sm-12">
                                <div id="layout_footer_add" class="input-group col-md-6 col-sm-12">
                                    <input id="layout_footer_add" name="layout_footer_add" type="text"
                                           value="{{$dataCss->layout_footer_add}}" class="form-control"/>
                                </div>
                            </div>

                            <label>ติดต่อ (Footer)</label>

                            <div id="layout_footer_tel" class="input-group colorpicker-component col-md-12 col-sm-12">
                                <div id="layout_footer_tel" class="input-group col-md-6 col-sm-12">
                                    <input id="layout_footer_tel" name="layout_footer_tel" type="text"
                                           value="{{$dataCss->layout_footer_tel}}" class="form-control"/>
                                </div>
                            </div>


                            <br>
                            <div class="hr-droid">
                                <div class="hr-line green"></div>
                                <div class="hr-line purple"></div>
                            </div>
                            <div>
                                <label>ส่วน Plugin (Facebook,IG,Line,Twitter) <b style="color: red">**ต้องขอ Permission
                                        จากเว็บไซต์นั้นๆก่อน**</b></label>
                                <br>
                                <label>รหัสแชท Facebook (Facebook Customer Chat Plugin Code)</label>
                                <div id="fbchat_code" class="input-group col-md-6 col-sm-12">
                                    <input id="fbchat_code" name="fbchat_code" type="text"
                                           value="{{$dataCss->fbchat_code}}" class="form-control"/>
                                </div>

                                {{--        <div id="layout_footer" class="input-group colorpicker-component col-md-12 col-sm-12">--}}
                                {{--            <div id="layout_footer"  class="input-group col-md-6 col-sm-12">--}}
                                {{--                <input id="layout_footer" name="layout_footer" type="text" value="{{$dataCss->layout_footer}}" class="form-control" />--}}
                                {{--            </div>--}}
                                {{--        </div>--}}

                                <label>ลิงค์เพจ หรือ ไอดีเพจ (Copy หลัง facebook.com/) (Facebook Page Plugin
                                    Code) </label>

                                <div id="fbpage_code" class="input-group col-md-12 col-sm-12">
                                    <div id="fbpage_code" class="input-group col-md-6 col-sm-12">
                                        <input id="fbpage_code" name="fbpage_code" type="text"
                                               value="{{$dataCss->fbpage_code}}" class="form-control"/>
                                    </div>
                                </div>


                                <br>
                                <div>
                                    <button type="submit" class="form-control btn-success"
                                            onclick="return confirm('บันทึกข้อมูล')">บันทึก
                                    </button>
                                </div>
                                <script type="text/javascript">
                                    $('#bg_col').colorpicker();
                                    $('#bg_first_slide').colorpicker();
                                    $('#bg_executive_menu').colorpicker();
                                    $('#bg_second_slide').colorpicker();
                                    $('#bg_banner').colorpicker();
                                    $('#bg_news_col').colorpicker();
                                    $('#bg_youtube').colorpicker();
                                    $('#bg_activity_layout').colorpicker();
                                    $('#bg_travel').colorpicker();
                                    $('#bg_otop').colorpicker();
                                    $('#bg_linkout').colorpicker();
                                    $('#bg_service').colorpicker();

                                    $('#web_nav_bgcol').colorpicker();
                                    $('#front_menu_col').colorpicker();
                                    $('#font_col').colorpicker();
                                    $('#web_m_col').colorpicker();
                                    $('#web_m_fnt_col').colorpicker();
                                    $('#menu_nav_col').colorpicker();
                                    $('#menu_pnt_col').colorpicker();
                                    $('#menu_fnt_col').colorpicker();

                                    $('#layout_footer_col').colorpicker();
                                </script>

                            </div>
                    </div>
                </div>
            </div>
            <br>


        </div>
        <h2 style="text-align: center">แสดงหน้าเว็บ</h2>
@livewire('backend.style.index')



    @include('backend.style._layout')
    @include('backend.style._sub')
    @include('backend.style._form')
    {{--    @include('backend.style._script')--}}
@endsection
