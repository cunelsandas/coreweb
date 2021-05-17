@extends('frontend_layouts2.default_layout2.layout.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                  {{$data->name}}

                </div>
                <div class="card-text">
                    @php echo $data->detail @endphp
                </div>

                    <div class="row">
                        <div class="col-12">
{{--                            {{$subject}}--}}
                            <div class="row">

                                    <div class="col-4">
                                        <div class="card" style="width: 18rem;">

                                        </div>
                                    </div>

                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
