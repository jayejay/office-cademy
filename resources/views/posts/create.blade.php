@extends('layouts.app')

@section('head')
    <script src=" {{ asset('js/posts/post_create.js') }} ">
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <textarea class="form-control" name="test" id="textarea" cols="100" rows="10"></textarea>
            <form id="form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <lable for="image">Image Upload</lable>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
            </form>
            <button class="btn btn-success" id="send">Absenden</button>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        //is used in "js/posts/post_create.js"
        var ajaxUrl = '{{ route("posts.store_image") }}';
    </script>
@endsection
