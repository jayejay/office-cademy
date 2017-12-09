<form id="search-form" method="get" role="search" class="typeahead" action="{{route('posts.admin.index')}}">
    <div>
        <div class="input-group">
            <input id="navbar-search-input" name="q" class="form-control" type="text" placeholder="search">
            <span class="input-group-btn">
                <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </span>
        </div>
    </div>
</form>