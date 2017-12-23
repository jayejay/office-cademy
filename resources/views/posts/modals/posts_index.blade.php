<!-- Modal -->
<div id="posts-index" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Posts list</h4>
            </div>
            <div class="modal-body">
                <table class="table table-responsive table-striped">
                    @foreach($storedPosts as $storedPost)
                        <tr>
                            <td>{{$storedPost->id}}</td>
                            <td>{{$storedPost->title}}</td>
                            <td><button data-id="{{$storedPost->id}}" type="button" class="btn btn-default btn-sm button-add-post-panel">@lang('custom.add')</button></td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>