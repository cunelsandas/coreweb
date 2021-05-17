@extends('frontend.layouts.app')
@section('title',$title)
@section('content')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */

        /* Optional: Makes the sample page fill the window. */
        #map2 {
            height: 400px;
            width: 100%;
        }
        .chart1 {
            width: 100%;
            min-height: 450px;
        }


    </style>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        function initMap(){
            myLatLng = {lat: 18.76991, lng: 98.97723};
            var map = new google.maps.Map(document.getElementById('map2'), {
                center: myLatLng,
                zoom: 18
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                draggable:true
            });

            google.maps.event.addListener(marker,'dragend',function () {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                document.getElementById("f_lat").value = lat.toFixed(5);
                document.getElementById("f_lng").value = lng.toFixed(5);

            });

            var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));

            google.maps.event.addListener(searchBox, 'places_changed',function () {
                var places = searchBox.getPlaces();

                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for(i=0;place=places[i];i++){
                    console.log(places);
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                    var item_lat = place.geometry.location.lat();
                    var item_lng = place.geometry.location.lng();
                }

                document.getElementById("f_lat").value = item_lat.toFixed(5);
                document.getElementById("f_lng").value = item_lng.toFixed(5);

                google.maps.event.addListener(marker,'dragend',function () {
                    var lat = marker.getPosition().lat();
                    var lng = marker.getPosition().lng();

                    document.getElementById("f_lat").value = lat.toFixed(5);
                    document.getElementById("f_lng").value = lng.toFixed(5);
                });

                map.fitBounds(bounds);
                map.setZoom(15);

            });
        }

    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDww90hTykYaejI50cOUtmr-yqtMBW_pc0&callback=initMap&libraries=places">
    </script>
    <script>
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart1);
        function drawChart1() {
            var data = google.visualization.arrayToDataTable([
                ['ปีที่', 'ผู้บาดเจ็บ', 'ผู้เสียชีวิต'],
                ['2563',  10,      5],
                ['2562',  20,      10],
                ['2561',  30,       2],
                ['2560',  22,      4]
            ]);

            var options = {
                title: 'แยกตามปี',
                hAxis: {title: 'Year', titleTextStyle: {color: 'red'}}
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
            chart.draw(data, options);
        }

        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart2);
        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
                ['ปีที่', 'อุบัติเหตุทางถนน', 'อัคคีภัย','อุบัติเหตุทั่วไป'],
                ['2563',  15,      1    ,50],
                ['2562',  45,      3    ,55],
                ['2561',  120,       5,  72],
                ['2560',  82,      4,   100]
            ]);

            var options = {
                title: 'แยกตามประเภท',
                hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
            chart.draw(data, options);
        }

        $(window).resize(function(){
            drawChart1();
            drawChart2();
        });

        // Reminder: you need to put https://www.google.com/jsapi in the head of your document or as an external resource on codepen //
    </script>

    <div id="app" class="container-fluid" data-site="{{$url ?? ''}}" data-unset="{{url('unset')}}" data-limit="{{$limit ?? ''}}">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4"><i class="fa fa-ambulance"></i> {{$title ?? ''}}</h1>

                    <div class="text-center mb-2">
{{--                        <button type="button" class="btn btn-success" @click="viewData('')">--}}
{{--                            <i class="fa fa-plus"></i> เพิ่มสถิติอุบัติเหตุ--}}
{{--                        </button>--}}
                    </div>

                    <div class="card-body">
                        <div class="text-right mb-2">

                        </div>
{{--                        <div class="text-right mb-2">--}}
{{--                            <span>คุณกำลังอยู่หน้า @{{ showPage }}</span>--}}
{{--                        </div>--}}
                        {{--                        <input type="text" name="search" class="form-control form-control-sm mb-1"--}}
                        {{--                               placeholder="คำค้น..." v-model="mySearch" @keyup="getData(1)">--}}
{{--                        <table-manage :data="data" :edit="viewData" :remove="deleteData"></table-manage>--}}
{{--                        <pagination :page-count="totalPage" :click-handler="getData"--}}
{{--                                    :container-class="'pagination pagination-sm justify-content-start'"--}}
{{--                                    :prev-text="'<'" :next-text="'>'" :page-class="'page-item'"--}}
{{--                                    :page-link-class="'page-link'" :prev-class="'page-item'"--}}
{{--                                    :prev-link-class="'page-link'" :next-class="'page-item'"--}}
{{--                                    :next-link-class="'page-link'" :first-last-button="true"--}}
{{--                                    :first-button-text="'<<'" :last-button-text="'>>'"></pagination>--}}
{{--                        <modal-manage :data="modal.data" :routes="modal.routes" :title="modal.title"--}}
{{--                                      :save-data="saveData" :delete-file="deleteFile"></modal-manage>--}}

                        <div class="row">
                            <div class="col-md-6 text-center">
                                <h1>สถิติอุบัติเหตุ</h1>
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <hr />
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div id="chart_div1" class="chart1"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="chart_div2" class="chart1"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('frontend.accident._form')
    @include('frontend.accident._layout')
    @include('frontend.accident._script')
@endsection
