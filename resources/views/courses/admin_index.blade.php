<?php
/**
 * @var $post App\Post;
 */
?>
@extends('layouts.app')

@section('content')

<div class="row">
    <a href="{{--route('courses.create')--}}" class="btn btn-info btn-sm">@lang('custom.New Course')</a>
</div>
<h3 class="title">@lang('custom.Courses')</h3>
<div class="row">
    <div class="panel-group">
    @foreach($courses as $course)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-name">
                        <a data-toggle="collapse" href="#collapse{{$course->id}}">
                            {{$course->id}}-
                            @if($course->translations()->exists() && isset($course->translateOrDefault($locale)->name))
                                {{$course->translateOrDefault($locale)->name}}
                            @else
                                @lang('custom.Nothing to show')
                            @endif
                        </a>
                    </h4>
                </div>
                <div id="collapse{{$course->id}}" class="panel-collapse collapse">
                    <table class="table">
                    @foreach($course->translations as $courseTranslation)
                            <tr class="">
                                <td>{{$courseTranslation->locale}}:</td>
                                <td>{{$courseTranslation->name}}</td>
                                <td>
                                    <a href="{{-- LaravelLocalization::getLocalizedURL($courseTranslation->locale, route('courses.edit', $course->id), [], true) --}}"
                                       class="btn btn-default btn-sm">@lang('custom.edit')</a>
                                </td>
                                <td>
                                    <form method="post" action="{{-- LaravelLocalization::getLocalizedURL($courseTranslation->locale, route('courses.delete',$course->id), [], true) --}}">
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
