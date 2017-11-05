$(document).ready(function () {

    var textarea = $('#body');
    textarea.focus();
    getCourses();
    //Add image to post body
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
                        '<div class="pics" style="width: 100%">' +
                            '<img src="' + data.path[i] +'" class="img-responsive">' +
                        '</div>';
                    addNewContent(newContent);
                }
                $('#image').val('');
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
       $('.modal-body').html($('#body').val());
    });

    //Add new content to textarea
    function addNewContent(newContent){
        var caretPos = textarea[0].selectionStart ? textarea[0].selectionStart : null;
        var textareaText = textarea.val();

        textarea.val(textareaText.substring(0, caretPos) + ' ' + newContent + ' ' + textareaText.substring(caretPos));
    };

    function getCourses(){
        categoryId = $('#category').val();
        url = '/admin/posts/get-courses/' + categoryId;
        selectCourses = $('#course');
        selectCourses.html('');

        $.get(url, [], function (response) {
           if(response.success){
               courses = response.courses;
               // for(var i = 0; i < response.courses.length; i++){
               //     html = '<option value="' + courses[i].id + '">' + courses[i].course + '</option>';
               //     console.log(html);
               //     selectCourses.html(html);
               // }
               $.each(courses, function (i, course) {
                   selectCourses.append($('<option>', {
                       value: course.id,
                       text : course.course
                   }));
               });

           }else{
               alert(response.message);
           }
        });
    }

    $(document).on('change', '#category', function () {
        // console.log($('#category').val());
        getCourses();
    });

})