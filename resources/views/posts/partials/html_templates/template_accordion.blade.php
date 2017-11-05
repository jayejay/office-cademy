<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="panel-link" data-url="{{route('posts.get_panel_content', ['id' => 0])}}"
                   data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                    TITLE</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-content panel-collapse collapse in">
            CONTENT
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="panel-link" data-url="{{route('posts.get_panel_content', ['id' => 0])}}"
                   data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    TITLE</a>
            </h4>
        </div>
        <div id="collapse2" class="panel-content panel-collapse collapse">
            CONTENT
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="panel-link" data-url="{{route('posts.get_panel_content', ['id' => 0])}}"
                   data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    TITLE</a>
            </h4>
        </div>
        <div id="collapse3" class="panel-content panel-collapse collapse">
            CONTENT
        </div>
    </div>
</div>