@extends('layouts.admin_layout')

@section('content')
    <form id="chapter-form" method="post" action="{{ route('chapters.store') }}">
        @include('chapters.partials.form')
    </form>
@endsection
