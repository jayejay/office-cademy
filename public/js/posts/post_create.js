$(document).ready(function () {

    var textarea = $('#textarea');
    textarea.focus();
    //Add image to post body
    $(document).on('change', '#image', function () {

        // var image = $('#image').prop('files');
        var formData = new FormData();

        for(var i=0; i < $(this).get(0).files.length; i++ ){
            formData.append('files['+ i +']', $(this).get(0).files[i]);
        }

        // formData.append('file', image);

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
                for(var i=0; i<data.path.length ; i++){
                    var newContent = '<img src="' + data.path[i] +'" class="img-responsive">';
                    addNewContent(newContent);
                    $('#image').val('');
                }
            }
        });
    });

    $(document).on('click', '.html_tags', function (e) {
        e.preventDefault();
        var newContent = $(this).attr('data-html');
        addNewContent(newContent);
    });

    //Preview
    $(document).on('click', '#preview_button', function () {
       $('.modal-body').html($('#textarea').val());
    });

    //Add new content to textarea
    function addNewContent(newContent){
        var caretPos = textarea[0].selectionStart ? textarea[0].selectionStart : null;
        var textareaText = textarea.val();

        textarea.val(textareaText.substring(0, caretPos) + ' ' + newContent + ' ' + textareaText.substring(caretPos));
    }

})