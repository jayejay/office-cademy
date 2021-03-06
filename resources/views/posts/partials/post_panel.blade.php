@foreach($posts as $post)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse{{$post->id}}">
                    <b>
                        {{$post->position}}.
                        @if($post->translations()->exists() && isset($post->translateOrDefault($locale)->title))
                            {{$post->translateOrDefault($locale)->title}}
                        @else
                            @lang('custom.Nothing to show')
                        @endif
                    </b>
                </a>
            </h4>
            {{$post->course->name}}
            <span class="glyphicon glyphicon-chevron-right"></span>
            @if(!empty($post->chapter))
                {{$post->chapter->name}}
            @else
                @lang('custom.Without chapter')
            @endif
            <span class="glyphicon glyphicon-chevron-right"></span> ID: {{$post->id}}
        </div>
        <div id="collapse{{$post->id}}" class="collapse collapse-post-index">
            <table class="table">
                @foreach($post->translations as $postTranslation)
                    <tr class="">
                        <td>{{$postTranslation->locale}}:</td>
                        <td>{{$postTranslation->title}}</td>
                        <td class="td-actions">
                            <a href="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('posts.admin.show', $post->id), [], true) }}"
                               rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                <i class="material-icons">visibility</i>
                                <div class="ripple-container"></div></a>
                            <a href="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('posts.edit', $post->id), [], true) }}"
                               rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('get.post.as.pdf', $post->id), [], true) }}"
                               rel="tooltip" class="btn btn-success" data-original-title="" title="" target="_blank">
                                PDF
                            </a>
                        </td>
                        <td class="td-actions">
                            <form method="post" action="{{ LaravelLocalization::getLocalizedURL($postTranslation->locale, route('posts.delete',$post->id), [], true) }}">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                    <i class="material-icons">close</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endforeach