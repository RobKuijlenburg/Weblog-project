@extends('layout/app')



@section('content')

<div class="article_container">
@foreach ($articles as $article)
    <div class="article_item">
        <h1> {{$article->title}} </h1>
            <img class="index_img" src="{{$article->img}}" alt="">
            <p>{{$article->excerpt}}</p>
            <a href="{{route('articles.show', $article)}}">read more -></a>
    </div>
@endforeach
</div>
@endsection('content')