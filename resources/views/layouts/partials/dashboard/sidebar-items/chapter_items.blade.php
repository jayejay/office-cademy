<li>
    <a href="#chapters" data-toggle="collapse" aria-expanded="{{ str_is('chapters.*', $currentPathName) ? 'true' : 'false' }}">
        <i class="material-icons">list</i>
        <p> @lang('custom.Chapters') <b class="caret"></b></p>
    </a>
    <div id="chapters"
        @if(str_is('chapters.*', $currentPathName))
         class="collapsed collapse in"
         aria-expanded="true"
        @else
         class="collapsed collapse"
         aria-expanded="false"
        @endif
    >
        <ul class="nav">
            <li class="{{ $currentPathName == 'chapters.admin.index' ? 'active' : '' }}">
                <a href="{{route('chapters.admin.index')}}">
                    <span class="sidebar-mini"> CH </span>
                    <span class="sidebar-normal"> @lang('custom.show all') </span>
                </a>
            </li>
            <li class="{{ $currentPathName == 'chapters.create' ? 'active' : '' }}">
                <a href="{{route('chapters.create')}}">
                    <span class="sidebar-mini"> N </span>
                    <span class="sidebar-normal"> @lang('custom.New Chapter') </span>
                </a>
            </li>
        </ul>
    </div>
</li>