@extends('layouts.admin_layout')

@section('content')
    <form id="course-form" method="post" action="{{ route('courses.store') }}">
        @include('courses.partials.form')
    </form>
@endsection
