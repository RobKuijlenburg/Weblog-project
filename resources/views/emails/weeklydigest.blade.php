<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    html{
        font-family: sans-serif;
    }

    .flex{
        display: flex;
    }

    .content-center{
        align-content: center;
    }

    .justify-center{
        justify-content: center;
    }

    .w1-5{
        width: 20%;
    }

    .w4-5{
        width: 80%;
    }

    .rounded-xl{
        border-radius: 50px;
    }

    .shadow-lg{
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }
    
    .m-auto{
        margin: auto;
    }

    .text-2xl{
        font-size: 1.5rem;
        line-height: 2rem;
    }

    .font-semibold{
        font-weight: 600;
    }

    .mt-2{
        margin-top: 0.125rem;
    }

    .mb-2{
        margin-bottom: 0.125rem;
    }

    .mb-5{
        margin-bottom: 1.25rem;
    }

    .h3-5{
        height: 60%;
    }

    .m-2{
        margin: 0.125rem;
    }
    
    .pl-4{
        padding-left: 1rem;
    }

    .pr-4{
        padding-right: 4rem;
    }

    .h-10{
        height: 2.5rem;
    }
</style>

</head>
<body>
<div class="flex">
<div class="w4-5">
@foreach ($articles as $article)
    <div class="w1-5 text-center content-center justify-center rounded-xl shadow-lg h3-5 m-2">
        <h1 class="text-2xl font-semibold"> {{$article->title}} </h1>
            @if (str_starts_with($article->img, 'http'))
            <img class="index_img m-auto" src="{{$article->img}}" alt="">
            @else
            <img class="index_img m-auto" src="{{$message->embed('storage/'.$article->img)}}" alt="">
            @endif
            <p class="mt-2 mb-2 h-10 pl-4 pr-4">{{$article->excerpt}}</p>
            <a class="mt-2 mb-5" href="{{route('articles.show', $article)}}">read more -></a>
    </div>
@endforeach
</div>
</div>
</body>
</html>