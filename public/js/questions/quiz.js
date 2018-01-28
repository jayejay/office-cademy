$(document).ready(function () {

    var questions;
    var numberOfQuestions;
    var currentQuizNumber;

    var modalHeader = $('.quiz-question-header');
    var modalFooter = $('.quiz-footer');

    var areaQuizQuestion = $('.quiz-question');
    var areaQuizFinished = $('.quiz-finished');
    var areaQuizResult = $('.quiz-result');
    var areaQuizCorrectAnswer = $('.quiz-correct-answers');

    var counter = 0;

    var quizModal = $('#modal-quiz');
    var buttonShowAnswers = $('.button-show-answer');
    var buttonOpenQuizModal = $('.button-modal-quiz');

    var userAnswers = {};
    var correctAnswers = 0;

    buttonOpenQuizModal.prop('disabled', true);

    getQuestions();

    quizModal.on('hidden.bs.modal', function () {
        clearModal();
        areaQuizFinished.hide();
        buttonShowAnswers.hide();
        areaQuizCorrectAnswer.html('');
        areaQuizResult.html('');
        counter = 0;
        correctAnswers = 0;
        userAnswers = {};
    });

    buttonOpenQuizModal.click(function () {
        appendContentToModal(questions[counter]);
        counter++;
    });

    $(document).on('click', '.button-answer-options', function () {
        clearModal();

        var button = $(this);

        var isAnswerCorrect = checkAnswer(questions[counter - 1].answer, button.data('value'));

        if (isAnswerCorrect) {
            correctAnswers++;
            userAnswers[counter] = 1;
        } else {
            userAnswers[counter] = 0;
        }

        if (counter < numberOfQuestions) {
            appendContentToModal(questions[counter]);
            counter++;
        } else {
            appendContentToModal(false);
        }
    });

    buttonShowAnswers.click(function () {
        clearModal();
        areaQuizResult.html('');
        areaQuizQuestion.html('');
        showCorrectAnswers();
        buttonShowAnswers.hide();
    });

    function checkAnswer(answer, answerValue) {
        return answer === answerValue;

    }

    function getQuestions() {
        $.get(ajaxUrl, {}, function (response) {
            if (response) {
                questions = response.questions;
                numberOfQuestions = Object.keys(questions).length;
                currentQuizNumber = response.max_quiz_number + 1;
                buttonOpenQuizModal.prop('disabled', false);
            } else {
                alert('An error occured!');
            }
        });
    }

    function appendContentToModal(question) {

        if (question === false) {
            areaQuizFinished.show();
            buttonShowAnswers.show();
            areaQuizResult.append(
                '<div class="quiz-result-points">' +
                '<i class="material-icons">done</i>' +
                correctAnswers + '/' + numberOfQuestions + ' ' + Lang.get('custom.correct answers') +
                '</div>' +
                '<br>' +
                '<div class="quiz-result-message">' + getMessage() +
                '<i class="material-icons">insert_emoticon</i>' +
                '</div>'
            );
            setQuizResult();

        } else {

            modalHeader.append('<h5>' + question.title + '</h5>');

            for (var i = 0; i < question.options.length; i++) {
                areaQuizQuestion.append(
                    '<div class="answer-options">' +
                    '<button type="button" class="btn btn-info btn-block button-answer-options" data-value="' + (i + 1) + '">' +
                    question.options[i] +
                    '</button>' +
                    '</div>'
                );
            }
        }

        var progress = counter / numberOfQuestions * 100;

        modalFooter.append(
            '<div class="progress progress-line-primary">' +
            '<div class="progress-bar" role="progressbar" aria-valuenow="' + progress + '" aria-valuemin="0"' +
            ' aria-valuemax="100" style="width:' + progress + '%;">' +
            '<span class="sr-only">' + progress + ' Complete</span>' +
            '</div>' +
            '</div>'
        );
    }

    function clearModal() {
        modalHeader.html('');
        areaQuizQuestion.html('');
        modalFooter.html('');
    }

    function getMessage() {
        if (correctAnswers === 0) {
            return Lang.get('custom.Quiz bad result');
        } else if (correctAnswers < 5) {
            return Lang.get('custom.Quiz medium result');
        } else {
            return Lang.get('custom.Quiz good result');
        }
    }

    function showCorrectAnswers() {

        modalHeader.append('<h5>' + Lang.get('custom.Solutions') + '</h5>');

        for (var i = 0; i < numberOfQuestions; i++) {

            var optionIndex = questions[i].answer;
            var answer = questions[i].options[optionIndex - 1];

            areaQuizCorrectAnswer.append('<p class="quiz-correct-answers">' + (i + 1) + '. '
                + '<b>' + answer + ': </b>' + questions[i].title + '</p>');
        }
    }

    function setQuizResult(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            enctype: 'multipart/form-data',
            url: setQuizResultUrl,
            data: {"user_answers": userAnswers, "quiz_number": currentQuizNumber},
            datatype: "text",
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
            }
        });
    }

});
