<?php
/**
 * @var $chapter App\Chapter
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            {{ csrf_field() }}
            <div class="form-group label-floating">
                <label for="name" class="control-label">@lang('custom.Chapter name')</label>
                <input type="text" id="name" name="name" class="form-control" placeholder=""
                       value="{{old('name', isset($chapter) ? $chapter->name : '')}}">
            </div>
            <div class="form-group label-floating">
                <label for="" class="control-label">@lang('custom.Chapter number')</label>
                <input type="text" class="form-control" name="number"
                       value="{{old('name', isset($chapter) ? $chapter->number : '')}}">
            </div>
            <select name="course_id" id="course" class="selectpicker">
                @if(isset($courses))
                    @foreach($courses as $course)
                        <option value="{{$course->id}}"
                                @if(isset($chapter) && $course->id === old('course_id', $chapter->course_id))
                                selected="selected"
                                @endif
                        >{{$course->name}}</option>
                    @endforeach
                @else
                    <option value="">Nothing to show</option>
                @endif
            </select>
            <hr>
            <div class="form-group label-floating">
                <label for="position" class="control-label">Position</label>
                <input type="text" id="position" name="position" class="form-control"
                       value="{{old('position', isset($chapter) ? $chapter->position : '')}}">
            </div>
            <button type="submit" class="btn btn-success" id="send" form="chapter-form">Save</button>
        </div>
    </div>
</div>