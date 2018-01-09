$(document).ready(function () {

    $('.panel').each(function () {

        var panel = $(this);
        var postId = panel.attr("data-id");
        var url = baseUrl + "/" + locale + "/posts/ajax/get-post-body/" + postId

        getPostBody(panel, postId, url)
    });

    function getPostBody(panel, postId, url){
        $.get(url, function (response) {
            if(response.success){
                var panelBody = panel.find('.panel-body');
                console.log(panelBody);
                panelBody.html(response.postBody);
            }else{
                console.log(response.message)
            }
        });
    }
});