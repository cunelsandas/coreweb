@extends('itg.layouts.app')
@section('title',$title)
@section('content')
    <div id="app" class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 h-100">
                    <h1 class="ml-4 mt-4"><i class="fas fa-file-image"></i> จัดการ{{$title}}</h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2">
                                <form action="{{url('itg/admin')}}" method="post">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            {{ $data->name }}
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">ชื่อ</label>
                                                <input type="text" id="name" name="name" required class="form-control"
                                                       value="{{$data->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">ชื่อผู้ใช้</label>
                                                <input type="text" id="username" name="username" required
                                                       class="form-control" value="{{$data->username}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">รหัสผ่าน</label>
                                                <input type="text" id="password" name="password" required
                                                       class="form-control" value="{{$data->password}}">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">บันทึก</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
