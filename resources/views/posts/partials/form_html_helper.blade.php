@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin_posts/custom.css') }}">
@endpush
@push('scripts')    
    <script src=" {{ asset('js/posts/post_create.js') }} ">
    </script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @include('posts.partials.form')            
            </div>
            <div class="col-md-4">
                <ul class="ul_html_tags">
                    <li>
                        <span class="label label-default">Add images</span><br>
                        <label class="btn btn-default btn-sm">
                                Browse 
                            <input id="image" name="image" type="file" multiple="multiple" hidden>
                        </label>
                    </li>
                    <hr>
                    <li>
                        <span class="label label-default">HTML-Tags</span><br>
                        <a href="#" data-html='<p></p>' class="btn btn-primary btn-sm html_tags">Paragraph</a>
                        <a href="#" data-html='<div class="" id="" name=""></div>' class="btn btn-primary btn-sm html_tags">Div</a>
                        <a href="#" data-html='@include('posts/partials/template_ordered_list')' class="btn btn-primary btn-sm html_tags">Ordered List</a>
                    </li>
                    <li>
                        <a href="#" data-html='@include('posts/partials/template_unordered_list')' class="btn btn-primary btn-sm html_tags">Unordered List</a>
                        <a href="#" data-html= '@include('posts/partials/template_table')' class="btn btn-primary btn-sm html_tags">Table</a>
                    </li>
                    <hr>
                    <li>
                        <span class="label label-default">Tags</span><br>                
                        <select class="selectpicker" multiple data-actions-box="true">
                            @foreach(old('tags', $post->tags) as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                            @endforeach                            
                        </select>
                    </li>
                    <hr>
                    <li>
                        <span class="label label-default">Publish</span><br>
                        <input type="checkbox" name="active" id="active" form="post_form">
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
