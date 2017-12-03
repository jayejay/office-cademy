<?php
/**
 * @var $chapter App\Chapter
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group label-floating">
                {{ csrf_field() }}
                <label for="name" class="control-label">@lang('custom.Chapter')</label>
                <input type="text" id="name" name="name" class="form-control"
                       value="{{old('name', isset($chapter) ? $chapter->name : '')}}">
            </div>
            <div class="form-group label-floating">
                <label for="number" class="control-label">@lang('custom.Chapter number')</label>
                <input type="text" id="number" name="number" class="form-control"
                       value="{{old('name', isset($chapter) ? $chapter->number : '')}}">
            </div>
            <div class="form-group">
                <label for="course">@lang('custom.Course')</label>
                <select name="course_id" id="course" class="selectpicker">
                    @foreach($courses as $course)
                        <option value="{{$course->id}}"
                            @if(isset($chapter) && $course->id === old('course_id', $chapter->course_id))
                                selected="selected"
                            @endif
                        >{{$course->name}}</option>
                    @endforeach
                </select>
            </div>

                <button type="submit" class="btn btn-success" id="send" form="chapter-form">@lang('custom.save')</button>
            </div>
        </div>
    </div>
</div>