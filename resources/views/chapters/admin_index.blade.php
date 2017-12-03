<?php
/**
 * @var $post App\Post;
 */
?>
@extends('layouts.app')

@section('content')

<div class="row">
    <a href="{{--route('chapters.create')--}}" class="btn btn-info btn-sm">@lang('custom.New Chapter')</a>
</div>
<h3 class="title">@lang('custom.Chapters')</h3>
<div class="row">
    <div class="panel-group">
    @foreach($chapters as $chapter)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-name">
                        <a data-toggle="collapse" href="#collapse{{$chapter->id}}">
                            {{$chapter->id}}-
                            @if($chapter->translations()->exists() && isset($chapter->translateOrDefault($locale)->name))
                                {{$chapter->translateOrDefault($locale)->name}}
                            @else
                                @lang('custom.Nothing to show')
                            @endif
                        </a>
                    </h4>
                </div>
                <div id="collapse{{$chapter->id}}" class="panel-collapse collapse">
                    <table class="table">
                    @foreach($chapter->translations as $chapterTranslation)
                            <tr class="">
                                <td>{{$chapterTranslation->locale}}:</td>
                                <td>{{$chapterTranslation->name}}</td>
                                <td>
                                    <a href="{{-- LaravelLocalization::getLocalizedURL($chapterTranslation->locale, route('chapters.edit', $chapter->id), [], true) --}}"
                                       class="btn btn-default btn-sm">@lang('custom.edit')</a>
                                </td>
                                <td>
                                    <form method="post" action="{{-- LaravelLocalization::getLocalizedURL($chapterTranslation->locale, route('chapters.delete',$chapter->id), [], true) --}}">
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
