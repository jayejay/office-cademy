@extends('layouts.app')

<form id="post_form" method="post" action="{{ route('posts.create') }}">
    @include('posts.parts.form_helper')
</form>
