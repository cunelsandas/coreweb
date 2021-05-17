<div class="card border-0 h-100">
    <div class="card-body">
        <p class="card-text mb-2">
        <h5 class="card-title">สวัสดี , {{session('username')}}</h5>
        </p>
        <p class="card-text mb-2">
        <h6 class="card-subtitle text-muted">นี่คือข้อมูลเกี่ยวกับ {{$title}}</h6>
        </p>
        <p class="card-text mb-2">
            การแก้ไขข้อมูลครั้งล่าสุด
        </p>
        <p class="text-truncate">
            <a class="card-link" href="#!"title="แก้ไข" @click="viewData(statistics.id)">
                @{{ statistics.name }}
            </a>
        </p>
        <p class="card-text mb-2">
            ข้อมูลที่เข้าชมบ่อยที่สุด
        </p>
        <p class="text-truncate">
            <a class="card-link" href="#!"title="แก้ไข" @click="viewData(statistics.id)">
                @{{ statistics.name }}
            </a>
        </p>
{{--        <p class="card-text mb-2">--}}
{{--            จำนวนการเข้าชม 1 <i class="fa fa-eye text-primary"></i>--}}
{{--        </p>--}}
        <p class="card-text mb-2">จำนวนข้อมูลทั้งหมด @{{ statistics.record }} record</p>
{{--        <p class="card-text mb-2">--}}
{{--            จำนวนการเข้าชมทั้งหมด 1 <i class="fa fa-eye text-primary"></i>--}}
{{--        </p>--}}
    </div>
</div>
