$(document).ready(function () {

/*
    /!*Panel*!/
    $('.panel.normal-panel').each(function () {

        var panel = $(this);
        var postId = panel.attr("data-id");
        var url = baseUrl + "/" + locale + "/posts/ajax/get-post-body/" + postId;

        getPostBody(panel, postId, url)
    });

    /!*Accordeon*!/
    $('.panel.accordeon').each(function () {

        var panel = $(this);
        var postId = panel.attr("data-id");
        var url = baseUrl + "/" + locale + "/posts/ajax/get-post-body/" + postId;

        getPostBody(div, postId, url)
    });
*/

    /*Plain Text*/
    $('.plain-html,.panel.accordeon,.panel.normal-panel').each(function () {

        var div = $(this);
        var postId = div.attr("data-id");
        var url = baseUrl + "/" + locale + "/posts/ajax/get-post-body/" + postId;

        getPostBody(div, postId, url)
    });

    function getPostBody(div, postId, url){
        $.get(url, function (response) {
            if(response.success){

                var bodyArea;

                if (div.find('.panel-body').length) {
                    bodyArea = div.find('.panel-body');
                } else {
                    bodyArea = div;
                }
                bodyArea.html(response.postBody);

            } else {
                console.log(response.message)
            }
        });
    }
});