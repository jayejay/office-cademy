@extends('layouts.admin_layout')

@section('content')
    <form id="question-form" method="post" action="{{route('questions.update', $question->id)}}">
        <input name="_method" type="hidden" value="PATCH">
        @include('questions.partials.form')
    </form>
@endsection