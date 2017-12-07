$(document).ready(function () {

    //Flash-Messages
    $('.alert').delay(2500).fadeOut(1500);


    // TypeHead Search
    var engine = new Bloodhound({
        remote: {
            url: '/find/%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    var searchInput = $("#navbar-search-input");

    searchInput.removeClass("")

    searchInput.typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    },{
        source: engine.ttAdapter(),
        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'postsList',
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<a href="' + data.title + '" class="list-group-item">' + data.title + '<br><span class="typeahead-category-name">' + data.category.name + '</span></a>';
                // return '<a href="' + data.title + '" class="list-group-item">' + data.title + '</a>'
            }
        }
    });

});

