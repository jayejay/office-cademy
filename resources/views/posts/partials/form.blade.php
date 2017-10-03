{{ csrf_field() }}
<textarea class="form-control" name="body" id="textarea" cols="100" rows="10">{{ old('body', $post->body) }}</textarea>
<button class="btn btn-success" id="send">Absenden</button>
<button id="preview_button" type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#preview">Preview</button>

            