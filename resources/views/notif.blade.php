@if ($message = Session::get('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        {{ $message }}
    </div>
@endif
@if ($message = Session::get('failed'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ $message }}

    </div>
@endif
