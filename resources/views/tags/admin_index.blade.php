<?php
/**
 * @var $tag App\Tag;
 */
?>
@extends('layouts.admin_layout')

@section('content')

<div class="row">
    <a href="{{route('tags.create')}}" class="btn btn-info btn-sm">@lang('custom.New Tag')</a>
</div>
<h3 class="title">@lang('custom.Tags')</h3>
<div class="row">
    <div class="panel-group">
    @foreach($tags as $tag)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-name">
                        <a data-toggle="collapse" href="#collapse{{$tag->id}}">
                            {{$tag->id}}-
                            @if($tag->translations()->exists() && isset($tag->translateOrDefault($locale)->name))
                                {{$tag->translateOrDefault($locale)->name}}
                            @else
                                @lang('custom.Nothing to show')
                            @endif
                        </a>
                    </h4>
                </div>
                <div id="collapse{{$tag->id}}" class="panel-collapse collapse">
                    <table class="table">
                    @foreach($tag->translations as $tagTranslation)
                            <tr class="">
                                <td>{{$tagTranslation->locale}}:</td>
                                <td>{{$tagTranslation->name}}</td>
                                <td class="td-actions">
                                    <a href="{{ LaravelLocalization::getLocalizedURL($tagTranslation->locale, route('tags.edit', $tag->id), [], true) }}"
                                       rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </td>
                                <td class="td-actions">
                                    <form method="post" action="{{ LaravelLocalization::getLocalizedURL($tagTranslation->locale, route('tags.delete',$tag->id), [], true) }}">
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
    </div>
</div>
@endsection
