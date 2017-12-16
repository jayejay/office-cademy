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

        @include('layouts/partials/head/js')
        @stack('scripts')
</head>
<body>
    <div id="app">
        <div class="overlay"></div>
            <div id="header-pic" class="jumbotron">
                {{--<img src="{{asset('images/office.jpeg')}}" alt="Office">--}}
            </div>

        @include('layouts.partials.navigation')
        <div class="container">
            @include('layouts.partials.flash_messages')
            @include('layouts.partials.errors')
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    @include('layouts.partials.scripts.app_variables')
    @yield('javascript');
</body>
</html>
