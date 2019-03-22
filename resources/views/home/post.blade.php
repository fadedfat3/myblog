@extends('layout')
@section('content')
<style>
    .go-lr a, .description a{
        color : black;
    }
    .go-lr a:hover{
        color : orange;
    }
      .right {
        float : right;
        display : block;
    }
     .left{
        float : left;
        display : block;
    }
    .go-lr {
        margin-top: 50px;
    }
    .description button {
        border : 0px none white;
        background-color : white;
    }
    .description form {
        display : inline;
    }

</style>
<div class="container">
    <h1>{{ $post->title }}</h1>
    
    
    <hr>
    {!! $post->content_html !!}
    <hr>
    <div class="description right">
        <form method="POST" action="/post/thumbs">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $post->id }}">
            <button type="submit"><i class="fa fa-thumbs-up"></i></button>点赞数{{$post->thumbs + 1}}
        </form>
        posted at {{ $post->published_at }}
    </div>
    
    <div class="go-lr ">
        @if($pre)
            <a  class="left" href="/post/{{$pre->id}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>{{$pre->title}}</a>
        @endif
        @if($next)
            <a class="right"  href="/post/{{$next->id}}">
                {{$next->title}}
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
            
        @endif
    </div>
</div>
@stop 