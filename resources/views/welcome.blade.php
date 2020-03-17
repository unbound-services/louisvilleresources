<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Louisville Social Distancing Resources</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <link rel='stylesheet' href="{{ mix('/css/app.css') }}" />
    </head>
    <body>
        <header>
            <h1>Louisville Social Distancing Resources</h1>
        </header>

        <main>
            @foreach($categories as $category)
                <article>
                    <header>
                        <h1>{{$category->name}}</h1>
                    </header>
                    @if($category->description)
                        <p>{{$category->description}}</p>
                    @endif
                    <ul>
                        @foreach($category->links as $link)
                        <li>
                            <a href='{{$link->url}}'>{{$link->name}}</a>
                            @if($link->description)
                                <p>{{$link->description}}</p>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </main>
    </body>
</html>
