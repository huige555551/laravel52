<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learn Laravel 5</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<div id="title" style="text-align: center;">
    <h1>Laravel Simple Blog</h1>
    <div style="padding: 5px; font-size: 16px;">By susucool from <a href="http://www.golaravel.com/post/2016-ban-laravel-xi-lie-ru-men-jiao-cheng-yi/" target="_blank">2016 版 Laravel 系列入门教程</a></div>
    <hr>
    <div id="content">
        <ul>
            @foreach( $articles as $article )
                <li style="margin: 50px 0;text-align: left;">
                    <div class="title">
                        <a href="{{ url('article/'.$article->id) }}">
                            <h4>{{ $article->title  }}</h4>
                        </a>
                    </div>
                    <div class="body">
                        <p>{{ $article->body  }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

</body>
</html>

