<html>
<head>
    <title>{{ config('myblog.title') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>{{ config('myblog.title') }}</h1>
    <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
    <hr>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('post.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                <em>({{ $post->published_at }})</em>
                <p>
                    {{ str_limit($post->abstract) }}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>
    {!! $posts->render() !!}
</div>
</body>
</html>