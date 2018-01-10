<form id="search-form" method="get" role="search" class="navbar-form typeahead"
      action="{{str_is('*admin*', $currentPath) ? route('posts.admin.find') : route('posts.find')}}">
    <div class="input-group div-typeahead">
        <input id="navbar-search-input" name="q" class="form-control" type="text" placeholder="@lang('custom.search')">
        <div class="input-group-btn">
            <button id="searchbar-button" class="btn btn-default btn-sm nav-button-toggle" type="submit">
                <i class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
</form>


