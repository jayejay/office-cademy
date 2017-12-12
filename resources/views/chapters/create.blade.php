@extends('layouts.app')

@section('content')
    <form id="chapter-form" method="post" action="{{ route('chapters.store') }}">
        @include('chapters.partials.form')
    </form>
@endsection
