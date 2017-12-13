<?php
/**
 * @var $post App\Post;
 */
?>
@extends('layouts.admin_layout')

@section('content')

<div class="row">
    <a href="{{route('posts.create')}}" class="btn btn-info btn-sm">@lang('custom.New Post')</a>
</div>
<div class="row">
    <div class="panel-group">
    @if(!empty($posts))
        @foreach($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse{{$post->id}}">
                                {{$post->id}}-
                                @if($post->translations()->exists() && isset($post->translateOrDefault($locale)->title))
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
                                    <td class="td-actions">
                                        <a href="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('posts.show', $post->id), [], true) }}"
                                           rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                            <i class="material-icons">visibility</i>
                                            <div class="ripple-container"></div></a>
                                        <a href="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('posts.edit', $post->id), [], true) }}"
                                           rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                    <td class="td-actions">
                                        <form method="post" action="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('posts.delete',$post->id), [], true) }}">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endforeach
        @else
            <h3 class="title">@lang('custom.Nothing to show')</h3>
        @endif
    </div>
</div>
@endsection
