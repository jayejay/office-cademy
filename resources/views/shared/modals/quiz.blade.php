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
                    <i class="material-icons">done</i>
                    <span class="quiz-result">
                    </span>
                    @lang('custom.correct answers')
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">@lang('custom.close')</button>
            </div>
        </div>
    </div>
</div>