<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div style="display:block; font-family:sans-serif;">
<div style="width:80%;" class="w4-5">
@foreach ($articles as $article)
    <div style="width:20%; align-content:center; border-radius:50px; height:800px; margin:1.25rem;">
        <h1 style="font-size: 1.5rem; line-height: 2rem;"> {{$article->title}} </h1>
            @if (str_starts_with($article->img, 'http'))
            <img style="width:362px; margin:auto; height: auto;" src="{{$article->img}}" alt="">
            @else
            <img style="width:362px; margin:auto; height: auto;" src="{{$message->embed(public_path(). '/storage/'.$article->img)}}" alt="">
            @endif
            <p style="margin-top:0.125rem; margin: bottom 0.25em; height:2.5rem; padding-left:1rem; padding-right:1rem;" >{{$article->excerpt}}</p>
            <a style="margin-top:0.25em; margin-bottom:1.25rem;"  href="{{route('articles.show', $article)}}">read more -></a>
    </div>
@endforeach
</div>
</div>
</body>
</html>