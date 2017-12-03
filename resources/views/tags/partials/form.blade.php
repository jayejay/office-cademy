<?php
/**
 * @var $tag App\Tag
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group label-floating">
                {{ csrf_field() }}
                <label for="name" class="control-label">Enter tag name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder=""
                       value="{{old('name', isset($tag) ? $tag->name : '')}}">
                <button type="submit" class="btn btn-success" id="send" form="tag-form">Save</button>
            </div>
        </div>
    </div>
</div>