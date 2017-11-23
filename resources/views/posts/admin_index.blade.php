<?php
/**
 * @var $post App\Post;
 */
?>
@extends('layouts.app')

@section('content')

<div class="row">
    <a href="{{route('posts.create')}}" class="btn btn-info btn-sm">New Post</a>
</div>
<div class="row">
    <div class="panel-group">
    @foreach($posts as $post)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse{{$post->id}}">
                            {{$post->id}}-
                            @if($post->translations()->exists())
                                {{$post->translateOrDefault($locale)->title}}
                            @else
                                @lang('custom.Nothing to show')
                            @endif
                        </a>
                    </h4>
                </div>
                <div id="collapse{{$post->id}}" class="panel-collapse collapse">
                    <table class="table">
                    @foreach($post->translations as $postTranslation)
                            <tr class="">
                                <td>{{$postTranslation->locale}}:</td>
                                <td>{{$postTranslation->title}}</td>
                                <td>
                                    <a href="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('posts.show', $post->id), [], true) }}"
                                       class="btn btn-default btn-sm">@lang('custom.show')</a>
                                </td>
                                <td>
                                    <a href="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('posts.edit', $post->id), [], true) }}"
                                       class="btn btn-default btn-sm">@lang('custom.edit')</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('posts.delete',$post->id), [], true) }}">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm pull-right">@lang('custom.delete')</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
