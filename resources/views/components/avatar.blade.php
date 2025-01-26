@php
if ($avatarUrl == null || $avatarUrl == '' || $avatarUrl == 'no') {
    $avatar = '<div class="symbol symbol-circle symbol-50 mr-3">
        <div class="symbol-label font-size-h3 font-weight-bold">'.substr($name, 0, 1).'</div>
    </div>';
} else {
    $avatar = '<div class="symbol symbol-circle symbol-50 mr-3">
        <img alt="Pic" src="'.asset('archivo/avatar/'.$avatarUrl).'" />
    </div>';
}
@endphp

<div class="d-flex align-items-center">
    {!! $avatar !!}
</div>