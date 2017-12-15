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
});