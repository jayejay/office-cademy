<?php
/**
 * @var $course App\Course
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group label-floating">
                {{ csrf_field() }}
                <label for="name" class="control-label">@lang('custom.Course')</label>
                <input type="text" id="name" name="name" class="form-control"
                       value="{{old('name', isset($course) ? $course->name : '')}}">
            </div>
            <div class="form-group">
                <label for="category">@lang('custom.Category')</label>
                <select name="category_id" id="category" class="selectpicker">
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if(isset($course) && $category->id === old('category_id', $course->category_id))
                                    selected="selected"
                                @endif
                            >{{$category->category}}</option>
                        @endforeach
                    @else
                        <option value="">Nothing to show</option>
                    @endif
                </select>
            </div>

                <button type="submit" class="btn btn-success" id="send" form="course-form">@lang('custom.save')</button>
            </div>
        </div>
    </div>
</div>