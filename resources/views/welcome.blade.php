<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Officecademy</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        @include('layouts/partials/head/css')
        <!-- Styles -->
        <style>
            html, body {
                background-image: url({{asset('images/background.jpg')}});
                color: #F5F5F5;
                /*font-family: 'Raleway', sans-serif;*/
                /*font-weight: 100;*/
                height: 100vh;
                margin: 0;
            }

            .title{
                color: #BDBDBD;
                font-weight: 100;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .links > a {
                color: #F5F5F5;
                padding: 0 25px;
                font-size: 12px;
                /*font-weight: 600;*/
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

        </style>
        @include('layouts/partials/head/js')
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
            @endif

            @include('layouts/partials/language_switcher')
        </div>


            <div class="content">
                <div>
                    <h1 class="title">Officecademy</h1>
                </div>
                <div>
                    @lang('messages.welcome')
                </div>
                <br>
                <div>
                    <a class="text-info" href="{{ route('posts.admin.index') }}">Posts</a>
                </div>
            </div>
        </div>
    </body>
</html>
