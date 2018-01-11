<?php
/**
 * @var $post App\Post;
 */
?>
@extends('layouts.'.$layout)
@push('scripts')
    <script src=" {{ asset('js/posts/post_show.js') }} ">
    </script>
@endpush
@section('content')
    {{--Todo: Bevor going live--}}
    {{--@auth--}}
        <div class="row">
            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-default btn-sm">@lang('custom.edit')</a>
            <a href="{{route('posts.show', $post->id)}}" class="btn btn-default btn-sm">@lang('custom.show')</a>
        </div>
    {{--@endauth--}}
    <div class="row breadcrumbs">
        {{$post->course->name}} <span class="glyphicon glyphicon-chevron-right"></span>
        @if(!empty($post->chapter))
            {{$post->chapter->name}}
            <span class="glyphicon glyphicon-chevron-right"></span>
        @endif {{$post->title}}
    </div>
    <div class="row">
        <div class="row" id="title">
            <div class="col-md-12">
                <h1 class="title">{{!empty($post->translateOrDefault($locale)->title) ?  $post->translateOrDefault($locale)->title : "Nothing to show"}}</h1>
            </div>
        </div>
        <div class="row" id="body">
            <div class="col-md-12">
            {!! !empty($post->translateOrDefault($locale)->body) ? $post->translateOrDefault($locale)->body : "" !!}
            </div>
        </div>
        <div class="row" id="tags">
            <div class="col-md-12">
                @foreach($post->tags as $tag)
                    <span class="label label-primary">{{ $tag->tag }}</span>
                @endforeach
            </div>
        </div>
    </div>
@endsection