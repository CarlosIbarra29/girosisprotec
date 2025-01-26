@if(Session::has('success'))
    <div class="alert alert-custom alert-success fade show" role="alert">
        <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
        <div class="alert-text">{{Session::get('success')}}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif

@if(Session::has('warning'))
    <div class="alert alert-custom alert-warning fade show" role="alert">
        <div class="alert-icon"><i class="flaticon2-warning"></i></div>
        <div class="alert-text">{{Session::get('warning')}}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif
