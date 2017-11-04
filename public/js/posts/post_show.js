$(document).ready(function () {

    urlArray = [];

    $(document).on('click', '.panel-link', function () {
        panel = $(this);
        url = panel.attr("data-url");

        if($.inArray(url, urlArray) === -1){
            urlArray.push(url);
            panelContent = panel.parent().parent().next('.panel-content');
            console.log(url);

            $.get(url, function (response) {
               if(response.success){
                   console.log(response.postBody);
                   panelContent.append(response.postBody);
               }else{
                   console.log(response.message)
               }
            });
        }
    });

})