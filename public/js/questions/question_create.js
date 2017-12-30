$(document).ready(function () {

    $('#button-add-option').click(function(){
        var answerOptionToClone = $('.answer-option').last();
        var newOption = answerOptionToClone.clone();
        $('.options').append(newOption);
    });

    $(document).on('click', '.button-delete-option', function () {
        var button = $(this);
        if (window.confirm("Are you sure?")) {
            button.closest('.answer-option').remove();
        }
    });

})