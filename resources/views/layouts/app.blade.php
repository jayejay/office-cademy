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

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Officecademy') }}:{{App::getlocale()}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                &nbsp;
                        <li><a href="{{route('tags.admin.index')}}">@lang('custom.Tags')</a></li>
                        <li><a href="{{route('chapters.admin.index')}}">@lang('custom.Chapters')</a></li>
                        <li><a href="{{route('courses.admin.index')}}">@lang('custom.Courses')</a></li>
                        <li><a href="{{route('categories.admin.index')}}">@lang('custom.Categories')</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route('posts.admin.index')}}">@lang('custom.Posts')</a></li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                        <li>
                            @include('layouts/partials/language_switcher')
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @include('layouts.partials.flash_messages')
            @include('layouts.partials.errors')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    @yield('javascript');
</body>
</html>
