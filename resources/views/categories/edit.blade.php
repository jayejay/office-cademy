@extends('layouts.admin_layout')

@section('content')
    <form id="category-form" method="post" action="{{route('categories.update', $category->id)}}">
        <input name="_method" type="hidden" value="PATCH">
        @include('categories.partials.form')
    </form>
@endsection