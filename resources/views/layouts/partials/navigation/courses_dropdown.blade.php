@foreach($courses as $course)
    @if(count($course->chapters)>0)
        <li>
            <a href="#">{{$course->name}} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach($course->chapters->sortBy('position') as $chapter)
                    @if(count($chapter->posts)>1)
                    <li data-sm-reverse="true">
                                <a href="#">{{$chapter->name}}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($chapter->posts->sortBy('position') as $post)
                                        @if($post->searchable)
                                            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                    @elseif(count($chapter->posts)==1)
                        @foreach($chapter->posts as $post)
                            @if($post->searchable)
                                <li><a href="{{route('posts.show', $post->id)}}">{{$chapter->name}}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>
        </li>
    @endif
@endforeach
