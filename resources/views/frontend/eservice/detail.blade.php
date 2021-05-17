@extends('frontend.layouts.app')
@section('content')
    <style>
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
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
                <div class="card-header">
                  <p style="font-size: 1.5rem;font-weight: 400"> ชื่อ: {{$data->name}}</p> <p>{{formatDateThai($data->created_at)}}</p>
                </div>
                <div class="card-body">
                    <p style="font-size: 1.2rem;font-weight: 200">  รายละเอียด: {{$data->detail}}</p>
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
            </div>
        </div>
    </div>
@endsection
