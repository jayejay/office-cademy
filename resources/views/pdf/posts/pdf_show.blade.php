<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$post->title}}</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pdf_styles.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="">
            <img src="{{asset('images/logo_image.png')}}" alt="Logo" width="150" >
            <hr>
        </div>
        <h1>{!! $post->title !!}</h1>
        <div class="post-body">
            {!! $post->body !!}
        </div>
    </div>
</body>
</html>