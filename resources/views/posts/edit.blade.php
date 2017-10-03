@extends('layouts.app')

@section('content')
    <form id="post_form" method="post" action="{{ route('posts.update', $post->id)}}">
        <input name="_method" type="hidden" value="PATCH">
        @include('posts.partials.form_html_helper')
    </form>
@endsection
