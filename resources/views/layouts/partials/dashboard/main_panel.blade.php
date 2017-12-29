<div class="main-panel ps-container ps-theme-default" data-ps-id="6e0856e3-398b-9714-1f45-88c266014a85">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--<a class="navbar-brand" href="#"> {{ config('app.name') }} </a>--}}
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>@include('layouts.partials.language_switcher')</li>
                    {{--<li>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="material-icons">notifications</i>--}}
                            {{--<span class="notification">5</span>--}}
                            {{--<p class="hidden-lg hidden-md">--}}
                                {{--Notifications--}}
                                {{--<b class="caret"></b>--}}
                            {{--</p>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li>--}}
                                {{--<a href="#">Mike John responded to your email</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">You have 5 new tasks</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">You're now friend with Andrew</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">Another Notification</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">Another One</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="material-icons">person</i>--}}
                            {{--<p class="hidden-lg hidden-md">Profile</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="separator hidden-lg hidden-md"></li>--}}
                </ul>
                <form action="{{route('posts.find')}}" id="search-form" method="get" class="navbar-form navbar-left typeahead" role="search">
                    <div class="form-group form-search is-empty">
                        <input id="navbar-search-input" type="text" name="q" class="form-control" placeholder=" Search ">
                        <span class="material-input"></span>
                        <span class="material-input"></span></div>
                    <button type="submit"  class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </form>
                <a class="btn btn-default btn-sm" id="back-button" href="javascript:history.go(-1)">
                    <i class="material-icons">fast_rewind</i>
                    Back
                </a>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container">
            @include('layouts.partials.flash_messages')
            @include('layouts.partials.errors')
            @yield('content')
        </div>
    </div>
    <footer class="footer">
        {{--<div class="container-fluid">--}}
            {{--<nav class="pull-left">--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--Home--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--Company--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--Portofolio--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--Blog--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</nav>--}}
            {{--<p class="copyright pull-right">--}}
                {{--©--}}
                {{--<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script><script>--}}
                    {{--document.write(new Date().getFullYear())--}}
                {{--</script>2017--}}
                {{--<a href="http://www.creative-tim.com"> Creative Tim </a>, made with love for a better web--}}
            {{--</p>--}}
        {{--</div>--}}
    </footer>
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>