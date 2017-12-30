<?php
/**
 * @var $question App\Question
 */
?>

@push('scripts')
    <script src=" {{ asset('js/questions/question_create.js') }} ">
    </script>
@endpush

<div class="row">
    <div class="col-md-6">
        {{ csrf_field() }}
        <div class="form-group label-floating">
            <label for="name" class="control-label">@lang('custom.Question Title')</label>
            <input type="text" id="name" name="name" class="form-control" placeholder=""
                   value="{{old('name', isset($question) ? $question->name : '')}}">
        </div>
        <div class="options">
            @if(isset($options))
                @foreach($options as $optionId => $option)
                    <div class="form-group label-floating answer-option">
                        <label for="" class="control-label">@lang('custom.Answer Option')</label>
                        <input type="text" class="form-control" name="options[]"
                               value="{{$option}}">
                    </div>
                @endforeach
            @else
                <div class="form-group label-floating answer-option">
                    <label for="" class="control-label">@lang('custom.Answer Option')</label>
                    <input type="text" class="form-control" name="options[]" >
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-success" id="button-add-option"><i class="material-icons">plus_one</i></button>
        <button type="submit" class="btn btn-success" id="send" form="question-form">Save</button>
    </div>
    <div class="col-md-3">
        <label for="category">@lang('custom.Category')</label>
        <select name="category_id" id="category" class="selectpicker">
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