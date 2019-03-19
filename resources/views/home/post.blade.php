@extends('home.layout')
@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <h5>published at {{ $post->published_at }}</h5>
    @if($post->meta_description)
        <h4>Abstract</h4>
        <div>
            <p>{{$post->meta_description}}</p>
        </div>
    @endif
    <hr>
    {!! $post->content_html !!}
    <hr>
    <button class="btn btn-primary" onclick="history.go(-1)">
        « Back
    </button>
</div>
@stop 