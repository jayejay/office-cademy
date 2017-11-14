$(document).ready(function () {

    $('.panel-link').each(function () {

       var panel = $(this);
       var url = panel.attr("data-url");

        $.get(url, function (response) {
            if(response.success){
                panelContent = panel.parent().parent().next('.panel-content');
                panelContent.append(response.postBody);
            }else{
                console.log(response.message)
            }
        });
    });

/*
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
    });*/

})