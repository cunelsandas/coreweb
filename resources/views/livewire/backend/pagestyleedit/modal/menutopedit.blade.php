<div class="modal fade bd-example-modal-lg" id="menuedit" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้เมนู</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div drag-root>
                @foreach($menutop as $v)
                    <div drag-item class="col black" draggable="true" style="border: 2px solid black">
                        <div class="row">
                            <div class="col">
                                {{ $v->listno }}
                            </div>
                            <div class="col">
                                {{ $v->name }}
                            </div>
                            <div class="col">
                                <input value="{{ $v->link }}">


                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
