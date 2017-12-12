<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Officecademy') }}</title>

    @include('layouts/partials/head/css')
    <link href="{{ asset('css/vendor/creativetim/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @stack('styles')
    @include('layouts/partials/head/js')
    <script src="{{ asset('js/vendor/creativetim/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/creativetim/jquery.select-bootstrap.js') }}"></script>
    <script src="{{ asset('js/vendor/creativetim/material-dashboard.js') }}"></script>
    @stack('scripts')
</head>
<body>
<div id="wrapper">
    <div class="container-fluid">
        @include('layouts.partials.dashboard.sidebar')
        @include('layouts.partials.dashboard.main_panel')
    </div>
</div>

@include('layouts.partials.scripts.app_scripts')
@yield('javascript');
</body>
</html>
