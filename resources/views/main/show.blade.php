@extends('layouts/app')

@section('content')
<div class="flex flex-wrap mt-8 w-4/5 align-center m-auto shadow-2xl rounded-xl p-5 mb-5">
<div class="m-2 content-center">
<h1 class=" mt-2 mb-2 text-2xl font-semibold">{{$article->title}}</h1>
<p class="mt-2 mb-2">{{$article->created_at}}</p>
<div class="flex flex-row flex-wrap mb-4">
@foreach ($article->categories as $category)
<p class="mr-3">{{$category->name}}</p>
@endforeach
</div>

<img class="mb-4" src="{{asset('storage/'.$article->img)}}" alt="">
<p>{{$article->body}}</p>
</div>

<div class="mt-5">
@foreach ($article->comments as $comment)
<div class="mt-5 border-2 p-2">
        <p class="mb-5 mx-5">{{$comment->user->name}}</p>
        <p>{{$comment->text}}</p>

    @if ($comment->user_id === Auth::user()->id)
    <form action="{{route('comments.destroy', $comment->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="mt-5 mx-5 border-2 rounded-xl p-2 hover:border-yellow-300" type="submit">Delete</button>
    </form>
    @endif

    </div>
@endforeach

<form class="mt-5" action="{{route('comments.store')}}" method="post">
    @csrf
    <input type="hidden" name="article_id" value="{{$article->id}}">
    <textarea class="resize-none w-full" name="text" id="text" cols="30" rows="10"></textarea>
    <button class="border-2 rounded-xl p-2 m-2" type="submit">Submit</button>
</form>
</div>
</div>
@endsection('content')