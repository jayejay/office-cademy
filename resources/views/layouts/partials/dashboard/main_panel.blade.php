<div class="main-panel">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle burger-button-admin-sidebar" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--<a class="navbar-brand" href="#"> {{ config('app.name') }} </a>--}}
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li style="color:black;">
                        @include('layouts.partials.typeahead_search')
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="li-language-switcher"
                        style="color:#263238;">@include('layouts.partials.language_switcher')</li>
                </ul>
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
</div>