@section('head')
    <link rel="stylesheet" href="{{ asset('css/admin_posts/custom.css') }}">
    <script src=" {{ asset('js/posts/post_create.js') }} ">
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @include('posts.partials.form')            
            </div>
            <div class="col-md-4">
                <ul class="ul_html_tags">
                    <li>
                        <h5>Add images</h5>
                        <div class="form-group">
                            <label class="btn btn-default btn-sm">
                                Browse <input id="image" name="image" type="file" multiple="multiple" hidden>
                            </label>
                        </div>
                    </li>
                    <li>
                        <h5>HTML-Tags</h5>

                        <a href="#" data-html='<p></p>' class="btn btn-primary btn-sm html_tags">Paragraph</a>
                        <a href="#" data-html='<div class="" id="" name=""></div>' class="btn btn-primary btn-sm html_tags">Div</a>
                        <a href="#" data-html='@include('posts/parts/template_ordered_list')' class="btn btn-primary btn-sm html_tags">Ordered List</a>
                    </li>
                    <li>
                        <a href="#" data-html='@include('posts/parts/template_unordered_list')' class="btn btn-primary btn-sm html_tags">Unordered List</a>
                        <a href="#" data-html= '@include('posts/parts/template_table')' class="btn btn-primary btn-sm html_tags">Table</a>
                    </li>
                </ul>
            </div> 
        </div>
    </div>
    @include('posts.modals.preview')
@endsection

@section('javascript')
    <script>
        //is used in "js/posts/post_create.js"
        var ajaxUrl = '{{ route("posts.store_image") }}';
    </script>
@endsection
