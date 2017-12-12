@extends('layouts.admin_layout')

@section('content')
    <form id="post-form" method="post" action="{{route('posts.update', $post->id)}}">
        <input name="_method" type="hidden" value="PATCH">
        @include('posts.partials.form')
    </form>
@endsection
