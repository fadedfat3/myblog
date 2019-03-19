@extends('layout')

@section('content')
<div class="container">
    <h1>{{ config('myblog.title') }}</h1>
    <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
    <hr>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                <em>({{ $post->published_date }})</em>
                <p>
                    {{ $post->abstract }}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>
    {!! $posts->render() !!}
</div>
@stop 