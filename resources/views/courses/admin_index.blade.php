<?php
/**
 * @var $post App\Post;
 */
?>
@extends('layouts.admin_layout')

@section('content')

<div class="row">
    <h3 class="title">@lang('custom.Courses')</h3>
</div>
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
                                <td class="td-actions">
                                    <a href="{{ LaravelLocalization::getLocalizedURL($courseTranslation->locale, route('courses.show', $course->id), [], true) }}"
                                       rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                        <i class="material-icons">visibility</i>
                                        <div class="ripple-container"></div></a>
                                    <a href="{{ LaravelLocalization::getLocalizedURL($courseTranslation->locale, route('courses.edit', $course->id), [], true) }}"
                                       rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>

                                </td>
                                <td class="td-actions">
                                    <form method="post" action="{{ LaravelLocalization::getLocalizedURL($courseTranslation->locale, route('courses.delete',$course->id), [], true) }}">
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
