@extends('layouts/app')



@section('content')
<div class="flex justify-center h-content w-100 mt-10">
<form class="space-y-5 shadow-2xl rounded-xl m-5" action="/articles/{{$article->id}}" method="post">
    @csrf
    @method('PUT')
    <div class="m-10">
    <div>
        <h2>Title</h2>
        <input type="text" name="title" id="title" value="{{$article->title}}">
    </div>
    <div>
        <h2>Slug</h2>
        <input type="text" name="slug" id="slug" value="{{$article->slug}}">
    </div>
    <div>
        <h2>Excerpt</h2>
        <textarea class="resize-none" name="excerpt" id="excerpt" cols="80" rows="3">{{$article->excerpt}}</textarea>
    </div>
    <div>
        <h2>Body</h2>
        <textarea class="resize-none" name="body" id="body" cols="80" rows="30" >{{$article->body}}</textarea>
    </div>
    <div>
        <h2>Images</h2>
        <input type="file" name="img" id="img" value="{{$article->img}}">
    </div>
    <div>
        <h2>Categories</h2>
        <div class="space-x-2">
        @foreach ($categories as $category)

            <input type="checkbox" name="$categories[]" value="{{$category->id}}" 
                @if (in_array($category->id, $selectedCategories)) 
                    checked
                @endif
            >
            <label for="{{$category->name}}">{{$category->name}}</label>
       
        @endforeach
        </div>
    </div>
    <div class="m-5">
        <input class="p-2 shadow-2xl rounded-xl hover:bg-black hover:text-white" type="submit" value="submit">
    </div>
    </div>
    </form>
</div>
@endsection