<?php
/**
 * @var $course App\Course;
 */
?>

@extends('layouts.admin_layout')

@section('content')
    {{--Todo: Bevor going live--}}
    {{--@auth--}}
        <div class="row">
            <a href="{{route('courses.edit', $course->id)}}" class="btn btn-default btn-sm">@lang('custom.edit')</a>
        </div>
    {{--@endauth--}}
    <div class="row">
        <div class="row" id="course-name">
            <div class="col-md-12">
                <h2 class="title">{{!empty($course->translateOrDefault($locale)->name)
                ? $course->translateOrDefault($locale)->name : __('custom.Nothing to show')}}</h2>
            </div>
        </div>
        <div class="row" id="chapters">
            <div class="col-md-12">
                <h4 class="title">@lang('custom.Chapters')</h4>
            @if(!empty($course->chapters))
                <ul class="ul-answer-options">
                @foreach($course->chapters as $chapter)
                    <li>{{$chapter->position}}: <b>{{$chapter->name}}</b></li>
                @endforeach
                </ul>
            @endif
            </div>
        </div>
        <div class="row" id="category">
            <div class="col-md-12">
                <h4 class="title">@lang('custom.Category')</h4>
                {{!empty($course->category->name) ? $course->category->name : ""}}
            </div>
        </div>
    </div>
@endsection