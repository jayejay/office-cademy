<?php
/**
 * @var $post App\Post;
 */
?>
@extends('layouts.app')
@push('scripts')
    <script src=" {{ asset('js/posts/post_show.js') }} ">
    </script>
@endpush
@section('content')
    <div class="row">
        <div class="row" id="title">
            <h2>{{!empty($post->translateOrDefault($locale)->title) ?  $post->translateOrDefault($locale)->title : "Nothing to show"}}</h2>
        </div>
        <div class="row" id="body">
            {!! !empty($post->translateOrDefault($locale)->body) ? $post->translateOrDefault($locale)->body : "" !!}
        </div>
        <div class="row" id="tags">
            @foreach($post->tags as $tag)
                <span class="label label-primary">{{ $tag->tag }}</span>
            @endforeach
        </div>
    </div>
@endsection