@extends('layouts.app')

@section('content')
    <div class="row">
        <a href="{{route('posts.create')}}" class="btn btn-info btn-sm">New Post</a>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            @foreach($posts as $post)
                <tr>
                    <td><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></td>
                    <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-default btn-sm">Edit</a></td>
                    <td>
                        <form method="post" action="{{route('posts.delete', $post->id)}}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection