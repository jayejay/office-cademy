@extends('layouts.admin_layout')

@section('content')
    <form id="post-form" method="post" action="{{ route('posts.store') }}">
        @include('posts.partials.form')
    </form>
@endsection
