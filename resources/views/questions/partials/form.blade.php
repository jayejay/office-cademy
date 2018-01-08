<?php
/**
 * @var $question App\Question
 */
?>

@push('scripts')
    <script src=" {{ asset('js/questions/question_create.js') }} ">
    </script>
@endpush
<h4 class="title">@lang('custom.Questions')</h4>
<br>
<div class="row">
    <div class="col-md-6">
        {{ csrf_field() }}
        <div class="form-group label-floating">
            <label for="name" class="control-label">@lang('custom.Question Title')</label>
            <input type="text" id="title" name="title" class="form-control" placeholder=""
                   value="{{old('name', isset($question) ? $question->title : '')}}">
        </div>
        <div class="form-group label-floating answer">
            <label for="right-answer" class="control-label">@lang('custom.Answer')</label>
            <input class="form-control" name="answer" type="text" value="{{old('answer', isset($question) ? $question->answer : '')}}">
        </div>
        <br>
        <div class="options">
            @if(!empty($question->options))
                @foreach($question->options as $optionId => $option)
                    <div class="form-group label-floating answer-option">
                        <label for="" class="control-label">@lang('custom.Answer Option')</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="options[]" value="{{$option}}">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-sm button-delete-option"><i class="material-icons">close</i></button>
                             </span>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="form-group label-floating answer-option">
                    <label for="" class="control-label">@lang('custom.Answer Option')</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="options[]">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-sm btn-danger button-delete-option"><i class="material-icons">close</i></button>
                         </span>
                    </div>
                </div>
                <div class="form-group label-floating answer-option">
                    <label for="" class="control-label">@lang('custom.Answer Option')</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="options[]">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-sm btn-danger button-delete-option"><i class="material-icons">close</i></button>
                         </span>
                    </div>
                </div>
                <div class="form-group label-floating answer-option">
                    <label for="" class="control-label">@lang('custom.Answer Option')</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="options[]">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-sm btn-danger button-delete-option"><i class="material-icons">close</i></button>
                         </span>
                    </div>
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-info btn-sm" id="button-add-option"><i class="material-icons">plus_one</i></button>
        <button type="submit" class="btn btn-success btn-sm" id="send" form="question-form">Save</button>
    </div>
    <div class="col-md-3">
        <label for="category">@lang('custom.Category')</label>
        <select name="category_id" id="category" class="selectpicker" form="question-form">
            @if(isset($categories))
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if(isset($question) && $category->id === old('category_id', $question->category_id))
                            selected="selected"
                            @endif
                    >{{$category->name}}</option>
                @endforeach
            @else
                <option value="">Nothing to show</option>
            @endif
        </select>
    </div>
</div>