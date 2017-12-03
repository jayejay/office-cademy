@extends('layouts.app')

@section('content')
    <form id="tag-form" method="post" action="{{ route('tags.store') }}">
        @include('tags.partials.form')
    </form>
@endsection
