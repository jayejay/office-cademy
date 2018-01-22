<?php
/**
 * @var $question App\question;
 */
?>
@extends('layouts.admin_layout')

@section('content')

<div class="row">
    <h3 class="title">@lang('custom.Questions')</h3>
</div>
<div class="row">
    <div class="panel-group">
    @if(!empty($questions))
        @foreach($questions as $question)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse{{$question->id}}">
                                <b>
                                {{$question->id}}-
                                    @if($question->translations()->exists() && isset($question->translateOrDefault($locale)->title))
                                        {{$question->translateOrDefault($locale)->title}}
                                    @else
                                        @lang('custom.Nothing to show')
                                    @endif
                                </b>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{$question->id}}" class="panel-collapse collapse">
                        <table class="table">
                        @foreach($question->translations as $questionTranslation)
                                <tr class="">
                                    <td>{{$questionTranslation->locale}}:</td>
                                    <td>{{$questionTranslation->title}}</td>
                                    <td class="td-actions">
                                        <a href="{{ LaravelLocalization::getLocalizedURL($questionTranslation->locale, route('questions.show', $question->id), [], true) }}"
                                           rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                            <i class="material-icons">visibility</i>
                                            <div class="ripple-container"></div></a>
                                        <a href="{{ LaravelLocalization::getLocalizedURL($questionTranslation->locale, route('questions.edit', $question->id), [], true) }}"
                                           rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                    <td class="td-actions">
                                        <form method="post" action="{{ LaravelLocalization::getLocalizedURL($questionTranslation->locale, route('questions.delete',$question->id), [], true) }}">
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
