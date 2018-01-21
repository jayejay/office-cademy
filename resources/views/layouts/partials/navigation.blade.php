<nav class="navbar navbar-default navbar-static-top {{$class}}" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{--{{ config('app.name', 'Officecademy') }}--}}
                <img src="{{asset('images/just_oc.svg')}}"  width="60">
            </a>
        </div>{{--end navbar-header--}}

        <div class="navbar-collapse collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check() || App::environment('local'))
                    <li>
                        <a href="{{route('posts.admin.index')}}">
                            Admin</a>
                    </li>
                @endif
                {{--<li>--}}
                    {{--@include('layouts.partials.excel_course_dropdown')--}}
                    @include('layouts.partials.navigation.courses_dropdown')
                {{--</li>--}}

                <li><a href="{{route('about.us')}}">@lang('custom.About us')</a></li>
                <li><a href="#">@lang('custom.Contact')</a></li>

                <li>
                    @include('layouts.partials.typeahead_search')
                </li>

                <li>
                    @include('layouts/partials/language_switcher')
                </li>

                    <!-- Authentication Links -->
                    @if(!App::environment('local'))
                        @guest
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li>
                                <a href="#">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    @endif

            </ul>

        </div>{{--end navbar-collapse--}}
    </div>{{--end container--}}
</nav>
