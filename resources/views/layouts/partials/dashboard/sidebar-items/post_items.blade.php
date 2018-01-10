<li>
    <a href="#posts" data-toggle="collapse" aria-expanded="{{ str_is('posts.*', $currentPathName) ? 'true' : 'false' }}">
        <i class="material-icons">create</i>
        <p> @lang('custom.Posts') <b class="caret"></b></p>
    </a>
    <div id="posts"
        @if(str_is('posts.*', $currentPathName))
         class="collapsed collapse in"
         aria-expanded="true"
        @else
         class="collapsed collapse"
         aria-expanded="false"
        @endif
    >
        <ul class="nav">
            <li class="{{ $currentPathName == 'posts.admin.index' ? 'active' : '' }}">
                <a href="{{route('posts.admin.index')}}">
                    <span class="sidebar-mini"> P </span>
                    <span class="sidebar-normal"> @lang('custom.show all') </span>
                </a>
            </li>
            <li class="{{ $currentPathName == 'posts.admin.create' ? 'active' : '' }}">
                <a href="{{route('posts.admin.create')}}">
                    <span class="sidebar-mini"> N </span>
                    <span class="sidebar-normal"> @lang('custom.New Post') </span>
                </a>
            </li>
        </ul>
    </div>
</li>