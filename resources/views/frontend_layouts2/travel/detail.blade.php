@extends('frontend_layouts2.default_layout2.layout.app')
@section('content')
    <style>
        body{
            color: black;
        }
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }
        #map2 {
            height: 400px;
            width: 100%;
        }

        .modal {
            margin-top: 7%;
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: scroll;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        .modal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }

        .close {
            margin-top: 5%;
            z-index: 1;
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../../">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="#" onclick="window.history.go(-1);">สถานที่ท่องเที่ยว/สินค้าพื้นบ้าน</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
                    </ol>
                </nav>
                <div class="card-header">
                    <p style="font-size: 1.5rem;font-weight: 400"> ชื่อ: {{$data->name}}</p> <p>{{formatDateThai($data->created_at)}}</p>
                </div>
                <div class="card-body">
                    <p style="font-size: 1.2rem;font-weight: 200">  รายละเอียด: @php echo $data->detail @endphp</p>
                </div>
                <hr>
                @foreach($file as $subject => $item)
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                @foreach($item as $item1 => $item2)
                                    <div class="col-4">
                                        <div class="card" style="width: 18rem;">
                                            <img class="myImages card-img-top" id="myImg" src="{{$item2['url']}}"   alt="{{$item2['name']}}">
                                        </div>
                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">
                                            <img class="modal-content" id="img01">
                                            <div id="caption"></div>
                                            <span class="close">&times;</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            <p style="font-size: 1.2rem;font-weight: 200"> แผนที่ : </p>

                            <div id="map2"></div>

                        </div>
                    </div>
                @endforeach
                <script>
                    // create references to the modal...
                    var modal = document.getElementById('myModal');
                    // to all images -- note I'm using a class!
                    var images = document.getElementsByClassName('myImages');
                    // the image in the modal
                    var modalImg = document.getElementById("img01");
                    // and the caption in the modal
                    var captionText = document.getElementById("caption");

                    // Go through all of the images with our custom class
                    for (var i = 0; i < images.length; i++) {
                        var img = images[i];
                        // and attach our click listener for this image.
                        img.onclick = function(evt) {
                            console.log(evt);
                            modal.style.display = "block";
                            modalImg.src = this.src;
                            captionText.innerHTML = this.alt;
                        }
                    }

                    var span = document.getElementsByClassName("close")[0];

                    span.onclick = function() {
                        modal.style.display = "none";
                    }
                </script>
                <script>


                    function initMap(){
                        myLatLng = {lat: {{$data->f_lat}}, lng: {{$data->f_lng}}};
                        var map = new google.maps.Map(document.getElementById('map2'), {
                            center: myLatLng,
                            zoom: 15
                        });

                        var marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            draggable:false
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
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg49SZLUZdLu8KQ80fEAPJkbdBUqyN-vw&callback=initMap&libraries=places" ></script>
            </div>
        </div>
    </div>
@endsection
