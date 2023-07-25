@php
$errors = Session::get('error');
$messages = Session::get('success');
$info = Session::get('info');
$warnings = Session::get('warning');

@endphp

@if ($errors)
    @foreach ($erros as $key => $value)
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button class="close" type="button" data-dismiss="alert">x</button>
            <strong>Error!</strong> {{ $value }}
        </div>
    @endforeach
@endif

@if ($messages)
    @foreach ($messages as $key => $value)
        <div class="alert alert-success alert-dismissable" role="alert">
            <button class="close" type="button" data-dismiss="alert">x</button>
            <strong>Success!</strong> {{ $value }}
        </div>
    @endforeach
@endif

@if ($info)
    @foreach ($info as $key => $value)
        <div class="alert alert-info alert-dismissable" role="alert">
            <button class="close" type="button" data-dismiss="alert">x</button>
            <strong>Info!</strong> {{ $value }}
        </div>
    @endforeach
@endif

@if ($warnings)
    @foreach ($warnings as $key => $value)
        <div class="alert alert-warning alert-dismissable" role="alert">
            <button class="close" type="button" data-dismiss="alert">x</button>
            <strong>Warning!</strong> {{ $value }}
        </div>
    @endforeach
@endif
