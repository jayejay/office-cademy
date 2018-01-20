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
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        @stack('styles')
        <!--   Core JS Files from Creative Tim -->

        <script src="{{asset('js/vendor/creativetim/material-kit.js')}}"></script>
        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="{{asset('js/vendor/smartmenus/jquery.smartmenus.min.js')}}"></script>
        <!-- SmartMenus jQuery Bootstrap Addon -->
        <script type="text/javascript" src="{{asset('js/vendor/smartmenus/jquery.smartmenus.bootstrap.min.js')}}"></script>
        @include('layouts/partials/head/js')
        @stack('scripts')
</head>
<body id="excel-layout">
    <div id="app">
        <div id="header-pic" class="jumbotron">
            {{--<img src="{{asset('images/office.jpeg')}}" alt="Office">--}}
        </div>

        @include('layouts.partials.navigation', ['class' => 'excel-layout-navigation'])
        <div class="container-fluid">
            @include('layouts.partials.flash_messages')
            @include('layouts.partials.errors')
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                @yield('content')
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
    @include('layouts.partials.footer')

    @include('layouts.partials.scripts.app_variables')
    @yield('javascript')
</body>
</html>
