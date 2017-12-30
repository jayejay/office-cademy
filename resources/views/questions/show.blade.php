<?php
/**
 * @var $question App\Question;
 */
?>

@extends('layouts.'.$layout)

@section('content')
    {{--Todo: Bevor going live--}}
    {{--@auth--}}
        <div class="row">
            <a href="{{route('questions.edit', $question->id)}}" class="btn btn-default btn-sm">@lang('custom.edit')</a>
        </div>
    {{--@endauth--}}
    <div class="row">
        <div class="row" id="title">
            <div class="col-md-12">
                <h2 class="title">@lang('custom.Question Title'): {{!empty($question->translateOrDefault($locale)->title)
                ? $question->translateOrDefault($locale)->title : __('custom.Nothing to show')}}</h2>
            </div>
        </div>
        <div class="row" id="options">
            <div class="col-md-12">
                <h4 class="title">@lang('custom.Answer Option')</h4>
            @if(!empty($question->translateOrDefault($locale)->options))
                <ol class="ol-answer-options">
                @foreach($question->translateOrDefault($locale)->options as $option)
                    <li>{{$option}}</li>
                @endforeach
                </ol>
            @endif
            </div>
        </div>
        <div class="row" id="answer">
            <div class="col-md-12">
                <h4 class="title">@lang('custom.Answer')</h4>
                {{!empty($question->translateOrDefault($locale)->answer) ? $question->translateOrDefault($locale)->answer : ""}}
            </div>
        </div>
        <div class="row" id="category">
            <div class="col-md-12">
                <h4 class="title">@lang('custom.Category')</h4>
               {{!empty($question->category->name) ? $question->category->name : ""}}
            </div>
        </div>
    </div>
@endsection