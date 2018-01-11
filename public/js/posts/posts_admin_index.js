$(document).ready(function () {
    // getChaptersUrl
    // getPostsUrl
    Lang.setLocale(locale);
    var chapterSelectElement = $('#chapter');


    $('#course').change(function () {
        console.log('change');
        var courseId = $(this).val();

        chapterSelectElement.html('');
        chapterSelectElement.selectpicker('refresh');

        $.get(getChaptersUrl,{'course_id': courseId}, function (response) {
            if(response && response.chapters.length > 0){

                chapterSelectElement.append('<option value="" disabled selected>' + Lang.get('custom.Please select') + '</option>');
                chapterSelectElement.append('<option value="">' + Lang.get('custom.Without chapter') + '</option>');

                for(var i = 0; i < response.chapters.length; i++){
                    var html = "<option value='" + response.chapters[i].id + "'>" + response.chapters[i].name + "</option>";
                    chapterSelectElement.append(html);
                }
                chapterSelectElement.selectpicker('refresh');
            }
        });
    });

    chapterSelectElement.change(function () {
       var chapterId = $(this).val();

        $.get(getPostsUrl,{'chapter_id': chapterId}, function (response) {
            $('.posts-index-panel').html(response);
        });

    });

});