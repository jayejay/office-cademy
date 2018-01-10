<li>
    <a href="#questions" data-toggle="collapse" aria-expanded="{{ str_is('questions.*', $currentPathName) ? 'true' : 'false' }}">
        <i class="material-icons">help</i>
        <p> @lang('custom.Questions') <b class="caret"></b></p>
    </a>
    <div id="questions"
        @if(str_is('questions.*', $currentPathName))
         class="collapsed collapse in"
         aria-expanded="true"
        @else
         class="collapsed collapse"
         aria-expanded="false"
        @endif
    >
        <ul class="nav">
            <li class="{{ $currentPathName == 'questions.index' ? 'active' : '' }}">
                <a href="{{route('questions.index')}}">
                    <span class="sidebar-mini"> T </span>
                    <span class="sidebar-normal"> @lang('custom.show all') </span>
                </a>
            </li>
            <li class="{{ $currentPathName == 'questions.create' ? 'active' : '' }}">
                <a href="{{route('questions.create')}}">
                    <span class="sidebar-mini"> N </span>
                    <span class="sidebar-normal"> @lang('custom.New Question') </span>
                </a>
            </li>
        </ul>
    </div>
</li>