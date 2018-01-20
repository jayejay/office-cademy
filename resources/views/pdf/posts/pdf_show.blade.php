<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$post->title}}</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pdf_styles.css') }}" rel="stylesheet">
</head>

<body>
    <div class="header">
        <h2>{{config('app.name', 'Officecademy')}}</h2>
    </div>
    <h1>{!! $post->title !!}</h1>
    <div class="post-body">
        {!! $post->body !!}
    </div>
</body>
</html>