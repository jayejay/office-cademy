@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin_posts/custom.css') }}">
@endpush
@push('scripts')    
    <script src=" {{ asset('js/posts/post_create.js') }} ">
    </script>
@endpush
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @include('posts.partials.form')            
            </div>
            <div class="col-md-4">
                <h5>Add images</h5>
                <label class="btn btn-default btn-sm">
                        Browse
                    <input id="image" type="file" multiple="multiple" hidden>
                </label>
                <hr>
                <h5>HTML-Tags</h5>
                <a href="#" data-html='<p></p>' class="btn btn-primary btn-sm html_tags">Paragraph</a>
                <a href="#" data-html='<div class="" id="" name=""></div>' class="btn btn-primary btn-sm html_tags">Div</a>
                <a href="#" data-html='@include('posts/partials/template_ordered_list')' class="btn btn-primary btn-sm html_tags">Ordered List</a>
                <a href="#" data-html='@include('posts/partials/template_unordered_list')' class="btn btn-primary btn-sm html_tags">Unordered List</a>
                <a href="#" data-html= '@include('posts/partials/template_table')' class="btn btn-primary btn-sm html_tags">Table</a>
                <hr>
                <h5>Tags</h5>
                <select name="tags[]" class="selectpicker" multiple data-actions-box="true" form="post_form">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if(in_array($tag->id, isset($postTagArray) ? $postTagArray : []))selected @endif >{{ $tag->tag }}</option>
                    @endforeach
                </select>
                <hr>
                <h5>Publish</h5><br>
                <input type="checkbox" name="active" id="active" form="post_form">
            </div>
        </div>
    </div>
    @include('posts.modals.preview')

@section('javascript')
    <script>
        //is used in "js/posts/post_create.js"
        var ajaxUrl = '{{ route("posts.store_image") }}';
    </script>
@endsection
