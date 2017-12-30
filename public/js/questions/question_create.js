$(document).ready(function () {

    $('#button-add-option').click(function(){
        var answerOptionToClone = $('.answer-option').last();
        var newOption = answerOptionToClone.clone();
        $('.options').append(newOption);
    });

})