<li>
    <a href="#categories" data-toggle="collapse" aria-expanded="{{ str_is('categories.*', $currentPathName) ? 'true' : 'false' }}">
        <i class="material-icons">folder_special</i>
        <p> @lang('custom.Categories') <b class="caret"></b></p>
    </a>
    <div id="categories"
        @if(str_is('categories.*', $currentPathName))
         class="collapsed collapse in"
         aria-expanded="true"
        @else
         class="collapsed collapse"
         aria-expanded="false"
        @endif
    >
        <ul class="nav">
            <li class="{{ $currentPathName == 'categories.admin.index' ? 'active' : '' }}">
                <a href="{{route('categories.admin.index')}}">
                    <span class="sidebar-mini"> CA </span>
                    <span class="sidebar-normal"> @lang('custom.show all') </span>
                </a>
            </li>
            <li class="{{ $currentPathName == 'categories.create' ? 'active' : '' }}">
                <a href="{{route('categories.create')}}">
                    <span class="sidebar-mini"> N </span>
                    <span class="sidebar-normal"> @lang('custom.New Category') </span>
                </a>
            </li>
        </ul>
    </div>
</li>