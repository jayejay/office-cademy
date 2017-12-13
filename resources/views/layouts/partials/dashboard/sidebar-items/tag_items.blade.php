<li>
    <a href="#tags" data-toggle="collapse" aria-expanded="{{ str_is('tags.*', $currentPath) ? 'true' : 'false' }}">
        <i class="material-icons">turned_in_out</i>
        <p> @lang('custom.Tags') <b class="caret"></b></p>
    </a>
    <div id="tags"
        @if(str_is('tags.*', $currentPath))
         class="collapsed collapse in"
         aria-expanded="true"
        @else
         class="collapsed collapse"
         aria-expanded="false"
        @endif
    >
        <ul class="nav">
            <li class="{{ $currentPath == 'tags.admin.index' ? 'active' : '' }}">
                <a href="{{route('tags.admin.index')}}">
                    <span class="sidebar-mini"> T </span>
                    <span class="sidebar-normal"> @lang('custom.show all') </span>
                </a>
            </li>
            <li class="{{ $currentPath == 'tags.create' ? 'active' : '' }}">
                <a href="{{route('tags.create')}}">
                    <span class="sidebar-mini"> N </span>
                    <span class="sidebar-normal"> @lang('custom.New Tag') </span>
                </a>
            </li>
        </ul>
    </div>
</li>