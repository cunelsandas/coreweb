@extends('backend.layouts.app')
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
    </style>
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

                        <modal-manage :data="modal.data" :routes="modal.routes" :title="modal.title"
                                      :save-data="saveData" :delete-file="deleteFile"></modal-manage>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('backend.corruption._form')
    @include('backend.corruption._layout')
    @include('frontend.corruption._script')
@endsection
