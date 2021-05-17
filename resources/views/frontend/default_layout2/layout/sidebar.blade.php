<div>
    <section id="sidebar"><br>
        <div id="nayok">
            @php
                $slidenayokimg = DB::connection('db2')->table('uploads')->where('table_name','=', 'tb_nayok')->orderBy('id','desc')->first();
            @endphp
            <img class="img-fluid mx-auto d-block" style="height: auto;"
                 src="{{url('/')}}/upload/nayok/{{$slidenayokimg->file_name}}"
                 alt="slide 1">
        </div>
        <br>
        <!--				foreach banner_left_top-->
        <div class="banner_left_top"></div>
        <br>
        <div class="banner_left_top"></div>
        <br>
        <!--			end	foreach banner_left_top-->
        <div id="palad"></div>
        <br>
        <!--				foreach banner_menu_group && li-->
        <div class="menudata">
            <div class="banner_menu_group">
                <!--					  display img banner group-->
            </div>
            <div>
                <ul>
                    <li><a href="#">TEST1</a></li>
                    <li><a href="#">TEST2</a></li>
                    <li><a href="#">TEST3</a></li>
                    <li><a href="#">TEST4</a></li>
                    <li><a href="#">TEST5</a></li>
                </ul>
            </div>
        </div>
        <!--			end	foreach banner_menu_group && li-->
        <br>
        <!--				foreach banner_left_bottom-->
        <div class="banner_left_bottom"></div>
        <br>
        <div class="banner_left_bottom"></div>
        <br>
        <!--		end	foreach banner_left_bottom-->
    </section>
</div>