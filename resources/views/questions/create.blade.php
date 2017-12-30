@extends('layouts.admin_layout')

@section('content')
    <form id="question-form" method="post" action="{{ route('questions.store') }}">
        @include('questions.partials.form')
    </form>
@endsection
