$(document).ready(function () {

    var chapterSelectElement = $('#chapter');
    var courseSelectElement = $('#course');
    var categorySelectElement = $('#category');
    var reloadButton = $('#reload-posts-index');

    var postIndexPanel = $('.posts-index-panel');

    categorySelectElement.change(function () {

        var categoryId = $(this).val();

        courseSelectElement.html('');
        courseSelectElement.selectpicker('refresh');

        $.get(getCoursesUrl, {'category_id': categoryId}, function (response) {
            if (response && response.courses.length > 0) {

                courseSelectElement.append('<option value="" disabled selected>' + Lang.get('custom.Please select') + '</option>');
                var data = response.courses;

                appendOptions(data, courseSelectElement);
            }
        });
    });

    courseSelectElement.change(function () {

        var courseId = $(this).val();

        chapterSelectElement.html('');
        chapterSelectElement.selectpicker('refresh');

        $.get(getChaptersUrl, {'course_id': courseId}, function (response) {
            if (response && response.chapters.length > 0) {

                chapterSelectElement.append('<option value="" disabled selected>' + Lang.get('custom.Please select') + '</option>');
                chapterSelectElement.append('<option value="without-chapter">' + Lang.get('custom.Without chapter') + '</option>');

                var data = response.chapters;

                appendOptions(data, chapterSelectElement);
            }
        });
    });

    reloadButton.click(function () {

        var params;

        if (chapterSelectElement.val() !== null) {
            params = {'chapter_id': chapterSelectElement.val()};
        } else if (courseSelectElement.val() !== null) {
            params = {'course_id': courseSelectElement.val()};
        } else if (categorySelectElement.val() !== null) {
            params = {'category_id': categorySelectElement.val()};
        }

        getPostsHtml(params);
    });

    chapterSelectElement.change(function () {
        var chapterId = $(this).val();
        var params = {'chapter_id': chapterId};
        getPostsHtml(params);
    });

    function appendOptions(data, element) {
        for (var i = 0; i < data.length; i++) {
            var html = "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
            element.append(html);
            element.selectpicker('refresh');
        }
    }

    function getPostsHtml(params) {
        $.get(getPostsUrl, params, function (response) {
            if (response !== '') {
                postIndexPanel.html(response);
            } else {
                postIndexPanel.html(Lang.get('custom.Nothing found'));
            }
        });
    }
});