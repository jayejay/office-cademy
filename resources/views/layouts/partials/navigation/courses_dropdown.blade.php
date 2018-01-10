@foreach($courses as $course)
    @if(count($course->chapters)>0)
        <li>
            <a href="#">{{$course->name}} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach($course->chapters as $chapter)
                    @if(count($chapter->posts)>0)
                        <li data-sm-reverse="true">
                            <a href="#">{{$chapter->name}}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($chapter->posts as $post)
                                    <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
    @endif
@endforeach
