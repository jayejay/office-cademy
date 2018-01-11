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
    <div class="col-md-3 clearfix">
        <label for="course">@lang('custom.Courses')</label>
        <select name="course_id" id="course" class="selectpicker">
            <option value="" disabled selected>@lang('custom.Please select')</option>
            @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label for="category">@lang('custom.Chapters')</label>
        <select name="chapter_id" id="chapter" class="selectpicker">
            <option value="" disabled selected>@lang('custom.Please select')</option>
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
    var getChaptersUrl = "{{route('chapters.get_chapters')}}";
    var getPostsUrl = "{{route('posts.get.posts.index.html')}}";
</script>