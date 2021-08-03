@extends('layouts/app')



@section('content')
<div class="flex justify-center h-content w-100 mt-10">
<form class="space-y-5 shadow-2xl rounded-xl m-5" action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="m-10">
    <div>
        <h2>Title</h2>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <h2>Slug</h2>
        <input type="text" name="slug" id="slug">
    </div>
    <div>
        <h2>Excerpt</h2>
        <textarea class="resize-none" name="excerpt" id="excerpt" cols="80" rows="3"></textarea>
    </div>
    <div>
        <h2>Body</h2>
        <textarea class="resize-none" name="body" id="body" cols="80" rows="30" ></textarea>
    </div>
    <div>
        <h2>Images</h2>
        <input type="file" name="img" id="img">
    </div>
    @foreach ($categories as $category)
        <input type="checkbox" name="categories[]" value="{{$category->id}}" >
        <label for="{{$category->name}}">{{$category->name}}</label>
    @endforeach
    <div>
        <input type="hidden" name="premium" id="premium" value="false">
        <input type="checkbox" name="premium" id="premium" value="true">
    </div>
    <div class="m-5">
        <input class="p-2 shadow-2xl rounded-xl hover:bg-black hover:text-white" type="submit" value="submit">
    </div>
    </div>
    </form>
</div>
@endsection