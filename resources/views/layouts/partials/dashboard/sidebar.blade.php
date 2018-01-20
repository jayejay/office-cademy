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
        <a href="{{route('home')}}" class="simple-text logo-mini">
            OC
        </a>
        <a href="{{route('home')}}" class="simple-text logo-normal">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
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
    </div>
    <div class="sidebar-background" style="/*background-image: url(../assets/img/sidebar-1.jpg) */"></div>
</div>