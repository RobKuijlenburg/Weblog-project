@extends('layouts/app')



@section('content')
<div class="flex">
<div class="article_container w-4/5">
@foreach ($articles as $article)
    <div class="w-1/5 text-center content-center justify-center rounded-xl shadow-lg h-3/5 m-2">
        <h1 class="text-2xl font-semibold"> {{$article->title}} </h1>
            @if (str_starts_with($article->img, 'http'))
            <img class="index_img m-auto" src="{{$article->img}}" alt="">
            @else
            <img class="index_img m-auto" src="{{asset('storage/'.$article->img)}}" alt="">
            @endif
            <p class="mt-2 mb-2 h-10 pl-4 pr-4">{{$article->excerpt}}</p>
            <a class="mt-2 mb-5" href="{{route('articles.show', $article)}}">read more -></a>


            @if (request()->routeIs('articles.authorshow'))
                <a href="{{route('articles.edit', $article)}}" class="ml-2 ">Edit article</a>
            @endif


    </div>
@endforeach



</div>

<div class="fixed shadow-xl card my-4 top-30 right-5 mx-5 my-10 py-10 px-10 rounded-xl w-1/5">
        <h5 class="card-header">Search</h5>
        <form class="card-body" action="/searchText" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." name="q">
                <div class="flex flex-wrap space-x-4 m-1">
        </div>
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Go!</button>
          </span>
            </div>
        </form>


        <form class="card-body" action="/searchCategories" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <div class="flex flex-wrap space-x-4 m-1">
        @foreach ($categories as $category)
            <div class="border-2 mx-2 my-1 p-1">
            <input type="checkbox" name="categories[]" value="{{$category->id}}"  @if ($categories == 'selected') checked @endif>
            <label for="{{$category->name}}">{{$category->name}}</label>
            </div>
        @endforeach
        </div>
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Go!</button>
          </span>
            </div>
        </form>
    </div>
    </div>

@auth

    @if (Auth::user()->author)
    <div>
    <button class="fixed bottom-5 right-5 bg-yellow-500 rounded-full p-auto w-20 h-20 hover:bg-yellow-400"><a class="text-3xl" href="{{route('articles.create')}}">+</a></button>
    </div>
    @endif  

@endauth

@endsection('content')