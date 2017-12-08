<script>
    $(document).ready(function () {
        // Typeahead Search
        var engine = new Bloodhound({
            remote: {
                url: '/find/%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        var searchInput = $("#navbar-search-input");

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
                    '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function (data) {
                    var baseUrl = "{{ url('/') }}";
                    return '<a href="' + baseUrl + '/posts/show/' + data.id + '" class="list-group-item">' + data.title + '<br><span class="typeahead-category-name">' + data.category_name + '</span></a>';
                }
            }
        });
    })

</script>