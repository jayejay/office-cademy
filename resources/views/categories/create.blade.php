@extends('layouts.admin_layout')

@section('content')
    <form id="category-form" method="post" action="{{ route('categories.store') }}">
        @include('categories.partials.form')
    </form>
@endsection
