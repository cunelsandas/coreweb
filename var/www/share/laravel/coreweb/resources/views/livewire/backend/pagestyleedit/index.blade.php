<div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap - Prebuilt Layout</title>

    <!-- Bootstrap -->
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js" integrity="sha512-g2PN+aYR0KupTVwea5Ppqw4bxWLLypWdd+h7E0ydT8zF+/Y2Qpk8Y1SnzVw6ZCVJPrgB/91s3VfhVhP7Y4+ucw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<button type="button" class="btn btn-primary btn-lg" wire:click="save()">save</button>
<br>

<body>
<header>
    <div class="d-flex justify-content-center">
        <div class="col-lg-10">
            @if($header)
                <input type="file" wire:model="header">
                <img src="{{$header->temporaryUrl()}}" width="100%"/>
            @else
            <input type="file" wire:model="header">
            <img src="{{asset('assets/img/school-anime-girl-4k-t9-1280x720.jpg')}}" alt="" width="100%" />
                @endif
        </div>
    </div>
</header>


<div class="d-flex justify-content-center">
    <div class="col-lg-10">
        <marquee direction="left">
            This is a sample scrolling text that has scrolls texts to down.
        </marquee>
    </div>
</div>



<div class="d-flex justify-content-center">
    <div class="col-lg-10">
        <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false"
                    aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"> <a class="nav-link" href="#">Home <span
                                class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Link</a> </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1"
                                                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item"
                                                                                         href="#">Action</a> <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item"> <a class="nav-link disabled" href="#">Disabled</a> </li>
                </ul>
            </div>
        </nav>
    </div>
</div>



<div class="d-flex justify-content-center">

    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-3">
                <br>
                //รูปนายก
                <div class="d-flex justify-content-center">
                    <div class="col-lg-3 col-xl-12">
                        <img src="Anime-PNG-Images.png" width="100%" alt="" />
                    </div>
                </div>
                <br>

                //button อะไรก้ไม่รุ้
                <div class="d-flex justify-content-center">
                    <div class="col-lg-3 col-xl-12">
                        <img src="Sample-jpg-image-30mb.jpg" width="100%" alt="" />
                    </div>
                </div>
                <br>

                //หัวข้อหลัก
                <div>
                    <div style="padding-right: 0;padding-left: 0;">
                        <img src="testpic/menuleft_plan.png" width="100%" alt="" />
                    </div>
                    <div class="col-xl-12" id="menuside">
                        -asfsdafsadfdf
                    </div>

                    <div class="col-xl-12" id="menuside">
                        -asfsdafsadfdfsafsadfsadf
                    </div>
                    <div class="col-xl-12" id="menuside">
                        -asfsdafsadfdf
                    </div>

                </div>
                <br>
                ---------------

            </div>

            <div class="col-lg-7 col-xl-9">
                <img src="2021-10-13-ss_7049c3174ba92d2599418510ba745ea81f690da1.600x338.jpg" width="100%" alt="" />
            </div>
        </div>
    </div>


</div>

<footer>
    <div class="d-flex justify-content-center">
        <div class="col-lg-10">
            <img src="testpic/bottom.jpg" width="100%" alt=""/
        </div>
    </div>
</footer>
</body>

</html>
</div>
