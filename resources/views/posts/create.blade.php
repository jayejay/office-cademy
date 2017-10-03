@extends('layouts.app')

<form id="post_form" method="post" action="{{ route('posts.create') }}">
    @include('posts.partials.form_html_helper')
</form>
