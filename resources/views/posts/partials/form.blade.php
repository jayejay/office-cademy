<?php
/**
 * @var $post App\Post
 */
?>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin_posts/custom.css') }}">
@endpush
@push('scripts')    
    <script src=" {{ asset('js/posts/post_create.js') }} ">
    </script>
    <script src=" {{ asset('js/posts/post_show.js') }} ">
    </script>
@endpush
<div class="row">
    <div class="col-md-8">
        {{ csrf_field() }}
        <div class="form-group label-floating">
            <label for="title" class="control-label">Post title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{old('title', isset($post) ? $post->title : '')}}">
        </div>
        <div class="form-group">
            <textarea class="form-control textarea-post-body" name="body" id="textarea-post-body" placeholder="Enter post body" rows="20">{{old('body', isset($post) ? $post->body : '')}}</textarea>
        </div>
        <button type="submit" class="btn btn-success btn-sm" id="send" form="post-form">Save</button>
        <button id="preview_button" type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#preview">Preview</button>
        <button id="post_index_button" type="button" class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#posts-index">Posts list</button>
        @include('posts.partials.material_icons')
    </div>
    <div class="col-md-4">
        <hr>
    </div>
    <div class="col-md-2">
        <label for="image">Add images</label>
        <br>
        <label class="btn btn-default btn-sm">
                Browse
            <input id="image" type="file" multiple="multiple" hidden>
        </label>
        <hr>
        <label for="html-helper">HTML-Tags</label>
            @include('posts.partials.html_helper')
        <hr>
        <label for="category">Category</label>
        <select name="category_id" id="category" class="selectpicker" form="post-form">
            @if(!isset($post->category))
                <option value="0" selected>@lang('custom.Please select')</option>
            @endif
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                        @if (isset($post) && $category->id == old('category_id', $post->category_id))
                        selected="selected"
                        @endif
                >{{ $category->name }}</option>
            @endforeach
        </select>
        <hr>
        <label for="course">Course</label>
        <select name="course_id" id="course" class="selectpicker">
            @if(!isset($post->course))
                <option value="0" selected>@lang('custom.Please select')</option>
            @endif
            @foreach($courses as $course)
                <option value="{{$course->id}}"
                        @if (isset($post) && $course->id == old('course_id', $post->course_id))
                        selected="selected"
                        @endif
                >{{ $course->name }}</option>
            @endforeach
        </select>
        <hr>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" name="active" id="active" form="post-form" @if(isset($post) && $post->active)checked @endif>
                <span class="checkbox-material">
                </span>
                publish
            </label>
        </div>

    </div>{{--end row 2--}}
    <div class="col-md-2">
        <label for="chapter">Chapter</label>
        <select name="chapter_id" id="chapter" class="selectpicker" form="post-form">
            <option value="">@lang('custom.Without chapter')</option>
            @foreach($chapters as $chapter)
                <option value="{{$chapter->id}}"
                        @if (isset($post) && $chapter->id == old('chapter_id', $post->chapter_id))
                        selected="selected"
                        @endif
                >{{ $chapter->name }}</option>
            @endforeach

        </select>
        <hr>
        <label for="tags">Tags</label>
        <select id="tags" name="tags[]" class="selectpicker" multiple data-actions-box="true" form="post-form">
            @if(!isset($postTagsArray))
                <option value="" disabled selected="selected">@lang('custom.Please select')</option>
            @endif
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" @if(in_array($tag->id, isset($postTagsArray) ? $postTagsArray : []))selected @endif >{{ $tag->name }}</option>
            @endforeach
        </select>
        <hr>
        <label for="user">Author</label>
        <select name="user_id" id="user" class="selectpicker" form="post-form">
            @if(!isset($post->user))
                <option value="" disabled selected>Please select</option>
            @endif
            @foreach($users as $user)
                <option value="{{$user->id}}"
                        @if (isset($post) && $user->id == old('user_id', $post->user_id))
                        selected="selected"
                        @endif
                >{{ $user->name . ' ' . $user->lastname }}</option>
            @endforeach
        </select>
        <hr>
        <div class="form-group label-floating">
            <label for="position" class="control-label">Position</label>
            <input type="text" id="position" name="position" class="form-control"
                   value="{{old('position', isset($post) ? $post->position : '')}}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" name="searchable" id="searchable" form="post-form"
                       @if(isset($post) && $post->searchable)checked @endif >
                <span class="checkbox-material">
                    </span>
                searchable
            </label>
        </div>
    </div>{{--end row 3--}}
</div>

    @include('posts.modals.preview')
    @include('posts.modals.posts_index')

@section('javascript')
    <script>
        /*is used in "js/posts/post_create.js"*/
        var ajaxUrl = '{{ route("posts.store_image") }}';
    </script>
@endsection
