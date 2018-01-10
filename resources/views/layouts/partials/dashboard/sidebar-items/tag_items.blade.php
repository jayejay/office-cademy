<li>
    <a href="#tags" data-toggle="collapse" aria-expanded="{{ str_is('tags.*', $currentPathName) ? 'true' : 'false' }}">
        <i class="material-icons">turned_in_out</i>
        <p> @lang('custom.Tags') <b class="caret"></b></p>
    </a>
    <div id="tags"
        @if(str_is('tags.*', $currentPathName))
         class="collapsed collapse in"
         aria-expanded="true"
        @else
         class="collapsed collapse"
         aria-expanded="false"
        @endif
    >
        <ul class="nav">
            <li class="{{ $currentPathName == 'tags.admin.index' ? 'active' : '' }}">
                <a href="{{route('tags.admin.index')}}">
                    <span class="sidebar-mini"> T </span>
                    <span class="sidebar-normal"> @lang('custom.show all') </span>
                </a>
            </li>
            <li class="{{ $currentPathName == 'tags.create' ? 'active' : '' }}">
                <a href="{{route('tags.create')}}">
                    <span class="sidebar-mini"> N </span>
                    <span class="sidebar-normal"> @lang('custom.New Tag') </span>
                </a>
            </li>
        </ul>
    </div>
</li>