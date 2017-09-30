$(document).ready(function () {
    $("#send").on('click', function () {

        var image = $('#image').prop('files')[0];
        var formData = new FormData();
        var textarea = $('#textarea');
        var textareaText = textarea.val();

        formData.append('file', image);

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
                var newContent = '<img src="' + data.path +'">';
                textarea.val(textareaText + ' ' + newContent);
            }
        });
    });
})