<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="/style.css">
    
</head>
<body>

    


    <nav>
    <h1><a href="#" class="text-xl font-semibold">Webloggy</a></h1>
        <ul>
            <li>
                <a href="{{route('articles.index')}}">Home</a>
            </li>
            <li>
                <a href="#">Search</a>
            </li>
            <li>
                <a href="/login">Login</a>
            </li>
            <li>
                <a href="#">Premium</a>
            </li>
        </ul>
    </nav>

    <h1>{{Auth::user()->name}}</h1>

    @yield('content')

</body>

<script src="/js/app.js"></script>

</html>