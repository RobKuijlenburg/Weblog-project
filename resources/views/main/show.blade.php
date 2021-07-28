@extends('layouts/app')

@section('content')
<div class="m-2">
<h1 class=" mt-2 mb-2 text-2xl font-semibold">{{$article->title}}</h1>
<p class="mt-2 mb-2">{{$article->created_at}}</p>
<div class="flex flex-row flex-wrap mb-4">
@foreach ($article->categories as $category)
<p class="mr-3">{{$category->name}}</p>
@endforeach
</div>

<img class="mb-4" src="{{$article->img}}" alt="">
<p>{{$article->body}}</p>
</div>
@endsection('content')