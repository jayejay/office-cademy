@extends('layouts.app')

@section('content')
    <form id="post_form" method="post" action="{{ route('posts.store') }}">
        @include('posts.partials.form_html_helper')
    </form>
@endsection
