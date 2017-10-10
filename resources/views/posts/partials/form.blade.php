@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin_posts/custom.css') }}">
@endpush
@push('scripts')    
    <script src=" {{ asset('js/posts/post_create.js') }} ">
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
                        <option value="" disabled selected>Please select</option>
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

@section('javascript')
    <script>
        //is used in "js/posts/post_create.js"
        var ajaxUrl = '{{ route("posts.store_image") }}';
    </script>
@endsection
