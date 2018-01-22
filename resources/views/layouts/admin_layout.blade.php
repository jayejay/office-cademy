<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Officecademy') }}</title>

    @include('layouts/partials/head/css')
    <link href="{{ asset('css/vendor/creativetim/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @stack('styles')
    @include('layouts.partials.head.dashboard_kit_js')
    @include('layouts/partials/head/js')
    @stack('scripts')
</head>
<body>
<div class="wrapper">
    @include('layouts.partials.dashboard.sidebar')
    @include('layouts.partials.dashboard.main_panel')
</div>

@include('layouts.partials.scripts.app_variables')
@yield('javascript');
<script>
    $(document).ready(function () {
        // $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
        $('.sidebar .sidebar-wrapper').perfectScrollbar();
    });
</script>
</body>
</html>
