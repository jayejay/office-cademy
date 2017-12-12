@extends('layouts.admin_layout')

@section('content')
    <form id="course-form" method="post" action="{{route('courses.update', $course->id)}}">
        <input name="_method" type="hidden" value="PATCH">
        @include('courses.partials.form')
    </form>
@endsection