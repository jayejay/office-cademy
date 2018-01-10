$(document).ready(function () {
    //Search
    $(document).ready(function () {
        var searchInput = $("#navbar-search-input");

        searchInput.on('keydown', function(e) {
            if (e.keyCode === 13) {
                var choosenItem = $('.tt-cursor');

                if (typeof choosenItem !=='undefined') {
                    document.location = choosenItem.attr('href');
                } else {
                    $('#search-form').submit();
                }
            }
        });

        var findUrl;
        if (areaIsAdmin==="1") {
            findUrl = "/admin/find/%QUERY%";
        } else {
            findUrl = "/find/%QUERY%";
        }

        // Typeahead Search
        var engine = new Bloodhound({
            remote: {
                url: findUrl,
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });



        searchInput.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },{
            source: engine.ttAdapter(),

            display: 'title',

            name: 'post-list',
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item">'+ Lang.get('custom.Nothing found') + '</div></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function (data) {
                    return '<a href="' + postShowUrl  + '/' + data.id + '" class="list-group-item">' + data.title + '<br><span class="typeahead-category-name">' + data.category_name + '</span></a>';
                }
            }
        });
    })

});
