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
            <div class="col-md-2">

                <div class="dropdown">
                    <button class="btn btn-default btn-sm dropdown-toggle nav-button-toggle" id="admin_dropdown" type="button" data-toggle="dropdown">
                        Admin<span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="admin_dropdown">
                        <li><a href="{{route('tags.admin.index')}}">@lang('custom.Tags')</a></li>
                        <li><a href="{{route('chapters.admin.index')}}">@lang('custom.Chapters')</a></li>
                        <li><a href="{{route('courses.admin.index')}}">@lang('custom.Courses')</a></li>
                        <li><a href="{{route('categories.admin.index')}}">@lang('custom.Categories')</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-3">
                @include('layouts.partials.typeahead_search')
            </div>

            <div class="col-md-5">
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
    </div>
</nav>