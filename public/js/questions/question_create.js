$(document).ready(function () {
    $('#button-add-option').click(function(){
        var answerOptionToClone = $('.answer-option').last();
        var newOption = answerOptionToClone.clone();
        $('.options').append(newOption);
    });

    $(document).on('click', '.button-delete-option', function () {
        var button = $(this);
        if (window.confirm(Lang.get('custom.Are you sure?'))) {
            if($('.button-delete-option').length > 2){
                button.closest('.answer-option').remove();
            } else {
                alert(Lang.get('custom.You need at least two answers!'));
            }
        }
    });
});