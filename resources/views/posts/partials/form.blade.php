@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin_posts/custom.css') }}">
@endpush
@push('scripts')    
    <script src=" {{ asset('js/posts/post_create.js') }} ">
    </script>
    <script src=" {{ asset('js/posts/post_show.js') }} ">
    </script>
@endpush
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{ csrf_field() }}
                <label for="title">Post title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter post title" value="{{old('title', $post->title)}}">
                <label for="body">Post body</label>
                <textarea class="form-control" name="body" id="body" placeholder="Enter post body" cols="100" rows="15">{{ old('body', $post->body) }}</textarea>
                <button type="submit" class="btn btn-success" id="send" form="post-form">Save</button>
                <button id="preview_button" type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#preview">Preview</button>
                <button id="post_index_button" type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#posts-index">All Posts</button>
            </div>
            <div class="col-md-4">
                <h5>Add images</h5>
                <label class="btn btn-default btn-sm">
                        Browse
                    <input id="image" type="file" multiple="multiple" hidden>
                </label>
                <hr>
                <h5>HTML-Tags</h5>
                @include('posts.partials.html_helper')
                <hr>
                <h5>Category</h5>
                <select name="category_id" id="category" class="selectpicker" form="post-form">
                    @if(!isset($post->category))
                        <option value="" selected>Nothing selected</option>
                    @endif
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if ($category->id == old('category_id', $post->category_id))
                                selected="selected"
                                @endif
                        >{{ $category->category }}</option>
                    @endforeach
                </select>
                <hr>
                {{--todo: if course is choosen select of chapter has to eb filled.
                    And before saved course of post has to be pre selected --}}

                <h5>Course</h5>
                {{--<input name="course_id" type="text" class="form-control" placeholder="Course Number"--}}
                       {{--form="post-form" value="{{old('course_id', $post->course_id)}}">--}}
                <select name="course" id="course" class="form-control">
                    <option value="0">Nothing selected</option>
                    {{--@foreach($courses as $course)--}}
                        {{--<option value="{{$course->id}}"--}}
                            {{--@if (isset($post->chapter->course->id))--}}
                                {{--@if ($course->id === $post->chapter->course->id)--}}
                                {{--selected="selected"--}}
                                {{--@endif--}}
                            {{--@endif--}}
                                {{-->{{$course->course}}--}}
                        {{--</option>--}}
                    {{--@endforeach--}}
                </select>
                <hr>
                <h5>Chapter</h5>
                {{--<input name="chapter_id" type="text" class="form-control" placeholder="Chapter"--}}
                       {{--form="post-form" value="{{old('chapter_id', $post->chapter_id)}}">--}}
                {{--<hr>--}}
                <select name="chapter" id="chapter" class="selectpicker" form="post-form">
                    @if(isset($post->chapter))
                        <option value="{{$post->chapter->id}}">{{$post->chapter->number}} - {{$post->chapter->chapter}}</option>
                    @else
                        <option value="0">Nothing selected</option>
                    @endif
                </select>
                <h5>Language</h5>
                <select name="language_id" class="selectpicker" id="language" form="post-form">
                    @foreach($languages as $language)
                        <option value="{{$language->id}}"
                                @if ($language->id == old('language_id', $post->language_id))
                                selected="selected"
                                @endif
                        >{{ $language->language }}</option>
                    @endforeach
                </select>
                <hr>
                <h5>Tags</h5>
                <select name="tags[]" class="selectpicker" multiple data-actions-box="true" form="post-form">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if(in_array($tag->id, isset($postTagsArray) ? $postTagsArray : []))selected @endif >{{ $tag->tag }}</option>
                    @endforeach
                </select>
                <hr>
                <h5>Author</h5>
                <select name="user_id" id="user" class="selectpicker" form="post-form">
                    @if(!isset($post->user))
                    <option value="" disabled selected>Please select</option>
                    @endif
                    @foreach($users as $user)
                        <option value="{{$user->id}}"
                                @if ($user->id == old('user_id', $post->user_id))
                                    selected="selected"
                                @endif
                        >{{ $user->name . ' ' . $user->lastname }}</option>
                    @endforeach
                </select>
                <hr>
                <h5>Publish</h5><br>
                <input type="checkbox" name="active" id="active" form="post-form">
            </div>
        </div>
    </div>

    @include('posts.modals.preview')
    @include('posts.modals.posts_index')

@section('javascript')
    <script>
        //is used in "js/posts/post_create.js"
        var ajaxUrl = '{{ route("posts.store_image") }}';
    </script>
@endsection
