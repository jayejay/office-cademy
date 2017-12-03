@extends('layouts.app')

@section('content')
    <form id="tag-form" method="post" action="{{route('tags.update', $tag->id)}}">
        <input name="_method" type="hidden" value="PATCH">
        @include('tags.partials.form')
    </form>
@endsection