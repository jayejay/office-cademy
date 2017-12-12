@extends('layouts.admin_layout')

@section('content')
    <form id="chapter-form" method="post" action="{{route('chapters.update', $chapter->id)}}">
        <input name="_method" type="hidden" value="PATCH">
        @include('chapters.partials.form')
    </form>
@endsection