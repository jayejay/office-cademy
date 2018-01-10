<div class="sidebar" data-active-color="purple"
     data-background-color="grey"
     {{--data-image="../assets/img/sidebar-1.jpg"--}}
>
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a href="{{route('home')}}" class="simple-text logo-normal">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="c612a139-2b8b-5add-ffaa-afc344d8e0a4">
        <ul class="nav">
            <li>
                <a href="javascript:history.go(-1)">
                    <i class="material-icons">fast_rewind</i>
                    <p> Back </p>
                </a>
            </li>
            @include('layouts.partials.dashboard.sidebar-items.post_items')
            @include('layouts.partials.dashboard.sidebar-items.category_items')
            @include('layouts.partials.dashboard.sidebar-items.course_items')
            @include('layouts.partials.dashboard.sidebar-items.chapter_items')
            @include('layouts.partials.dashboard.sidebar-items.tag_items')
            @include('layouts.partials.dashboard.sidebar-items.question_items')


        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
    <div class="sidebar-background" style="/*background-image: url(../assets/img/sidebar-1.jpg) */"></div>
</div>