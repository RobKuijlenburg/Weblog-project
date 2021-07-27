@extends('layout/app')

@section('content')

<h1>{{$article->title}}</h1>
<p>{{$article->created_at}}</p>
@foreach ($article->categories as $category)
<p>{{$category->name}}</p>
@endforeach
<img src="{{$article->img}}" alt="">
<p>{{$article->body}}</p>

@endsection('content')