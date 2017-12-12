<div class="sidebar" data-active-color="rose" data-background-color="black"
     {{--data-image="../assets/img/sidebar-1.jpg"--}}
>
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a href="{{route('welcome')}}" class="simple-text logo-normal">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="c612a139-2b8b-5add-ffaa-afc344d8e0a4">
        <ul class="nav">
            <li>
                <a href="{{ url()->previous() }}">
                    <i class="material-icons">fast_rewind</i>
                    <p> Back </p>
                </a>
            </li>

            <li>
                <a href="#posts" data-toggle="collapse">
                    <i class="material-icons">create</i>
                    <p> Posts <b class="caret"></b></p>
                </a>
                <div class="{{str_is('posts.*', Route::currentRouteName()) ? 'collapse in' : 'collapse'}}" id="posts">
                    <ul class="nav">
                        <li
                                class="{{ Route::currentRouteName() == 'posts.admin.index' ? 'active' : '' }}"
                        >
                            <a href="{{route('posts.admin.index')}}">
                                <span class="sidebar-mini"> L </span>
                                <span class="sidebar-normal"> List </span>
                            </a>
                        </li>
                        <li
                                class="{{ Route::currentRouteName() == 'posts.create' ? 'active' : '' }}"
                        >
                            <a href="{{route('posts.create')}}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal"> Create Post </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ Route::currentRouteName() == 'tags.admin.index' ? 'active' : '' }}">
                <a href="{{route('tags.admin.index')}}">
                    <i class="material-icons">new_releases</i>
                    <p> Tags </p>
                </a>
            </li>
        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
    <div class="sidebar-background" style="/*background-image: url(../assets/img/sidebar-1.jpg) */"></div></div>