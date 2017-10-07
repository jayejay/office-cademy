@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="row" id="title">
            <h2>{{$post->title}}</h2>
        </div>
        <div class="row" id="body">
            {!! $post->body !!}
        </div>
        <div class="row" id="tags">
            @foreach($post->tags as $tag)
                <span class="label label-primary">{{ $tag->tag }}</span>
            @endforeach

        </div>
    </div>
@endsection