@extends('layouts/app')



@section('content')

<div class="article_container">
@foreach ($articles as $article)
    <div class="w-1/5 text-center content-center justify-center rounded-xl shadow-lg h-3/5 m-2">
        <h1 class="text-2xl font-semibold"> {{$article->title}} </h1>
            <img class="index_img m-auto" src="{{$article->img}}" alt="">
            <p class="mt-2 mb-2 h-10 pl-4 pr-4">{{$article->excerpt}}</p>
            <a class="mt-2 mb-5" href="{{route('articles.show', $article)}}">read more -></a>


            @if (request()->routeIs('articles.authorshow'))
                <a href="{{route('articles.edit', $article)}}" class="ml-2 ">Edit article</a>
            @endif


    </div>
@endforeach
</div>

@auth

    @if (Auth::user()->author)
    <div>
    <button class="fixed bottom-5 right-5 bg-yellow-500 rounded-full p-auto w-20 h-20 hover:bg-yellow-400"><a class="text-3xl" href="{{route('articles.create')}}">+</a></button>
    </div>
    @endif  

@endauth

@endsection('content')