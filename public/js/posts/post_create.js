$(document).ready(function () {

    var textarea = $('#textarea-post-body');
    textarea.focus();
    // getCourses();

    //Add image to post body
    var counter = 1;
    $(document).on('change', '#image', function () {

        var formData = new FormData();
        for(var i=0; i < $(this).get(0).files.length; i++ ){
            formData.append('files['+ i +']', $(this).get(0).files[i]);
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            enctype: 'multipart/form-data',
            url: ajaxUrl,
            data: formData,
            datatype: "text",
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                for(var i=0; i < data.path.length ; i++){
                    var newContent = '' +
                        '<div class="pics" style="width: 50%">' +
                            '<a href="' + data.path[i] + '" data-lightbox="image-' + counter + '" data-title="xxx ' + counter + '">' +
                                '<img src="' + data.path[i] +'" class="img-responsive">' +
                            '</a>'+
                        '</div>';

                    addNewContent(newContent);
                }
                $('#image').val('');
                counter++;
            }
        });
    });

    $(document).on('click', '.html_tags', function (e) {
        e.preventDefault();
        var newContent = $(this).attr('data-html');
        addNewContent(newContent);
    });

    $(document).on('click', '.button-add-post-panel', function (e) {
        var newContent = $(this).attr('data-id');
        addNewContent(newContent);
        $('#posts-index').modal('hide');
    });

    //Preview
    $(document).on('click', '#preview_button', function () {
        var previewModal = $('#preview');
        previewModal.find('.modal-body').html($('#textarea-post-body').val());
    });

    //Add new content to textarea
    function addNewContent(newContent){
        var caretPos = textarea[0].selectionStart ? textarea[0].selectionStart : null;
        var textareaText = textarea.val();

        textarea.val(textareaText.substring(0, caretPos) + ' ' + newContent + ' ' + textareaText.substring(caretPos));
    }

    enableTab('body');
});

function enableTab(id) {
    var el = document.getElementById(id);
    el.onkeydown = function (e) {
        if (e.keyCode === 9) { // tab was pressed

            // get caret position/selection
            var val = this.value,
                start = this.selectionStart,
                end = this.selectionEnd;

            // set textarea value to: text before caret + tab + text after caret
            this.value = val.substring(0, start) + '\t' + val.substring(end);

            // put caret at right position again
            this.selectionStart = this.selectionEnd = start + 1;

            // prevent the focus lose
            return false;
        }
    }
}