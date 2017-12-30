$(document).ready(function () {

    var questions;
    var modalHeader = $('.quiz-question-header')
    var modalBody = $('.quiz-question');

    getQuestions();

    $('#modal-quiz').on('hidden.bs.modal', function () {
        modalHeader.html('');
        modalBody.html('');
    });

    $('.button-modal-quiz').click(function () {
        var question = questions[0];
        appendQuestionToModal(question);
    });

    function getQuestions(){
        $.get(ajaxUrl, {}, function (response) {
            if (response) {
                questions = response.questions
            } else {
                alert('An error occured');
            }
        });
    }

    function appendQuestionToModal(question){

        modalHeader.html('<h4 class="title">' + question.title + '</h4>');

        for(var i=0; i < question.options.length; i++){
            console.log(question.options[i]);
            modalBody.append(
                '<div class="radio">'+
                    '<label>'+
                    '<input type="radio" name="questionOptions" value="' + (i+1) + '">' +
                    '<span class="circle">' +
                    '</span>' +
                    '<span class="check"></span>' +
                        question.options[i] +
                    '</label>' +
                '</div>'
            )
        }
    }

});
