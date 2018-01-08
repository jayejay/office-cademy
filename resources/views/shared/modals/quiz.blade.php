@push('scripts')
    <script>
        var ajaxUrl = "{{route('questions.get_questions')}}";
        var locale = "{{ $locale }}";
    </script>
    <script src=" {{ asset('js/localization/messages.js') }} ">
    </script>
    <script src=" {{ asset('js/questions/quiz.js') }} ">
    </script>
@endpush
<!-- Modal -->
<div id="modal-quiz" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title"><i class="material-icons">help</i> @lang('custom.Quiz')</h4>
                <hr>
                <div class="quiz-question-header">

                </div>
            </div>
            <div class="modal-body">

                <div class="quiz-question">
                </div>

                <div class="quiz-finished">
                    <span class="quiz-result">
                    </span>
                </div>

                <div class="quiz-correct-answers">

                </div>

            </div>
            <div class="modal-footer">
                <div class="quiz-footer">
                </div>
                <hr>
                <button type="button" class="btn btn-sm btn-success pull-left button-show-answer">@lang('custom.Solutions')</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">@lang('custom.close')</button>
            </div>
        </div>
    </div>
</div>