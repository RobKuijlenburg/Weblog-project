@extends('layouts/app')



@section('content')

<div class="article_container">
@foreach ($articles as $article)
    <div class="w-1/5 text-center content-center justify-center rounded-xl shadow-lg h-1/3 m-2">
        <h1 class="text-2xl font-semibold"> {{$article->title}} </h1>
            <img class="index_img m-auto" src="{{$article->img}}" alt="">
            <p class="mt-2">{{$article->excerpt}}</p>
            <a class="mt-2 mb-2" href="{{route('articles.show', $article)}}">read more -></a>
    </div>
@endforeach
</div>
@endsection('content')