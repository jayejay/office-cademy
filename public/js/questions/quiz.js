$(document).ready(function () {

    var questions;
    var numberOfQuestions;

    var modalHeader = $('.quiz-question-header')
    var modalBody = $('.quiz-question');
    var areaQuizFinished = $('.quiz-finished');
    var areaQuizResult = $('.quiz-result');
    var counter = 0;

    var quizModal = $('#modal-quiz');
    var buttonOpenQuizModal = $('.button-modal-quiz');

    var correctAnswers = 0;

    buttonOpenQuizModal.prop('disabled', true);

    getQuestions();

    quizModal.on('hidden.bs.modal', function () {
        clearModal();
        areaQuizFinished.hide();
        areaQuizResult.html('');
        counter = 0;
        correctAnswers = 0;
    });

    buttonOpenQuizModal.click(function () {
        appendQuestionToModal(questions[counter]);
        counter++;
    });

    $(document).on('click', '.button-answer-options', function () {
        clearModal();

        var button = $(this);

        var isAnswerCorrect = checkAnswer(questions[counter - 1].answer ,button.data('value'));

        if(isAnswerCorrect){
            correctAnswers++;
            console.log(correctAnswers);
        }

        if(counter < numberOfQuestions){
            appendQuestionToModal(questions[counter]);
            counter++;
        } else {
            appendQuestionToModal(false);
        }
    });

    function checkAnswer(question, answerValue){
        if(question === answerValue){
            return true;
        }
        return false;
    }

    function getQuestions(){
        $.get(ajaxUrl, {}, function (response) {
            if (response) {
                questions = response.questions;
                numberOfQuestions = Object.keys(response.questions).length;
                console.log(numberOfQuestions);
                buttonOpenQuizModal.prop('disabled', false);
            } else {
                alert('An error occured!');
            }
        });
    }

    function appendQuestionToModal(question){

        if (question === false) {

            areaQuizFinished.show();
            areaQuizResult.append(correctAnswers + '/' + numberOfQuestions );

        } else {
            modalHeader.append('<h5>' + question.title + '</h5>');

            for(var i=0; i < question.options.length; i++){
                console.log(question.options[i]);

                modalBody.append(

                    '<div class="answer-options">' +
                    '<button type="button" class="btn btn-info btn-block button-answer-options" data-value="' + (i+1) + '">'+
                    question.options[i] +
                    '</button> ' +
                    '</div>'

                );
            }
        }
    }

    function clearModal(){
        modalHeader.html('');
        modalBody.html('');
    }

});
