<?php
/**
 * @var $post App\Post;
 */
?>
@extends('layouts.admin_layout')

@push('scripts')
    <script src=" {{ asset('js/posts/posts_admin_index.js') }} ">
    </script>
@endpush

@section('content')


<div class="row">
    <div class="col-md-1">
        <label for="reload-posts-index">Filter:</label>
        <button id="reload-posts-index" class="btn btn-success btn-sm"><i class="material-icons">autorenew</i></button>
    </div>
    <div class="col-md-3">
        <label for="course">@lang('custom.Categories')</label>
        <select name="category_id" id="category" class="selectpicker">
            <option value="0" disabled selected>@lang('custom.Please select')</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label for="course">@lang('custom.Courses')</label>
        <select name="course_id" id="course" class="selectpicker">
            <option value="0" disabled selected>@lang('custom.Please select')</option>
        </select>
    </div>

    <div class="col-md-3">
        <label for="category">@lang('custom.Chapters')</label>
        <select name="chapter_id" id="chapter" class="selectpicker">
            <option value="0" disabled selected>@lang('custom.Please select')</option>
        </select>
    </div>
</div>

<div class="row">
    <h3 class="title">@lang('custom.Posts')</h3>
</div>


<div class="row">
    <div class="panel-group posts-index-panel">
        @if(!empty($posts))
            @include('posts.partials.post_panel')
        @else
            <h3 class="title">@lang('custom.Nothing to show')</h3>
        @endif
    </div>
</div>
@endsection
<script>
    var getCoursesUrl = "{{route('courses.get_courses')}}";
    var getChaptersUrl = "{{route('chapters.get_chapters')}}";
    var getPostsUrl = "{{route('posts.get.posts.index.html')}}";
</script>

