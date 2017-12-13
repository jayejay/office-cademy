<li>
    <a href="#courses" data-toggle="collapse" aria-expanded="{{ str_is('courses.*', $currentPath) ? 'true' : 'false' }}">
        <i class="material-icons">import_contacts</i>
        <p> @lang('custom.Courses') <b class="caret"></b></p>
    </a>
    <div id="courses"
        @if(str_is('courses.*', $currentPath))
         class="collapsed collapse in"
         aria-expanded="true"
        @else
         class="collapsed collapse"
         aria-expanded="false"
        @endif
    >
        <ul class="nav">
            <li class="{{ $currentPath == 'courses.admin.index' ? 'active' : '' }}">
                <a href="{{route('courses.admin.index')}}">
                    <span class="sidebar-mini"> CO</span>
                    <span class="sidebar-normal"> @lang('custom.show all') </span>
                </a>
            </li>
            <li class="{{ $currentPath == 'courses.create' ? 'active' : '' }}">
                <a href="{{route('courses.create')}}">
                    <span class="sidebar-mini"> N </span>
                    <span class="sidebar-normal"> @lang('custom.New Course') </span>
                </a>
            </li>
        </ul>
    </div>
</li>