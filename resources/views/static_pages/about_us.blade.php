@extends('layouts.excel_layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="title">@lang('static_pages.About us')</h1>

        <p>
            {!! trans('static_pages.about_us part 1') !!}
        </p>

        <p>
            {!! trans('static_pages.about_us part 2') !!}
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 class="title">@lang('static_pages.What officecademy can do for you')</h2>
        <p>
            {!! trans('static_pages.about_us part 3') !!}
        </p>
        <p>
            {!! trans('static_pages.about_us part 4') !!}
        </p>

        <p>
            {!! trans('static_pages.about_us part 5') !!}
        </p>

        <p>
            {!! trans('static_pages.about_us part 6') !!}
        </p>

        <p>
            {!! trans('static_pages.about_us part 7') !!}
        </p>

        <p>
            {!! trans('static_pages.about_us part 8') !!}
        </p>

    </div>
</div>
@endsection
