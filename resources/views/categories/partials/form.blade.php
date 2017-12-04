<?php
/**
 * @var $category App\Category
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group label-floating">
                {{ csrf_field() }}
                <label for="name" class="control-label">Enter category name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder=""
                       value="{{old('name', isset($category) ? $category->name : '')}}">
                <button type="submit" class="btn btn-success" id="send" form="category-form">Save</button>
            </div>
        </div>
    </div>
</div>