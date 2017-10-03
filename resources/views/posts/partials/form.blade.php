{{ csrf_field() }}
<label for="title">Post title</label>
<input type="text" id="title" name="title" class="form-control" placeholder="Enter post title" value="{{old('title', $post->title)}}">
<label for="body">Post body</label>
<textarea class="form-control" name="body" id="body" placeholder="Enter post body" cols="100" rows="15">{{ old('body', $post->body) }}</textarea>
<button type="submit" class="btn btn-success" id="send" form="post_form">Save</button>
<button id="preview_button" type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#preview">Preview</button>

            