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
        <header class='louisville-resources__header'>
            <h1 class='louisville-resources__header__h1'>Louisville Social Distancing Resources</h1>
            <div class='louisville-resources__header__bar' />
        </header>

        <main>

            <div class='resources__container'>
                <article class='category__container category__container--about'>
                        <header class='category__header'>
                            <h1 class='category__header__h1'>What is this?</h1>
                        </header>
                        <div class='category__content'>
                    
                            <p class='category__p'>
                                The purpose of this site is to provide reliable information and various resources to the citizens of Louisville affected by the coronavirus outbreak. These resources include information on unemployment, childcare, and business openings and closures, among many other valuable resources. This ongoing project will be updated as we receive any new resources or updates.
                            </p>
                            <p class='category__p'>
                                Our goal is to provide a platform that enables citizens of Louisville to collaborate and compile helpful resources available to their community. If there is any information, links to websites, programs, or grants you think should be included on the site please submit them using our form.
                            </p>
                        </div>
                    </article>


                @foreach($categories as $category)
                    <article class='category__container'>
                        <header class='category__header'>
                            <h1 class='category__header__h1'>{{$category->name}}</h1>
                        </header>
                        <div class='category__content'>
                            @if($category->description)
                                <p class='category__p'>{{$category->description}}</p>
                            @endif
                            <ul class='category__list'>
                                @foreach($category->links as $link)
                                <li class='list__item'>
                                    <a class='list__item__a' href='{{$link->url}}'>{{$link->name}}</a>
                                    @if($link->description)
                                        <p class='list__item__p'>{{$link->description}}</p>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
                {{-- submissions --}}
                <article class='category__container category__container--about'>
                        <header class='category__header'>
                            <h1 class='category__header__h1'>Get in touch</h1>
                        </header>
                        <div class='category__content'>
                            <p class='category__p'>Do you know of any resources that are not listed here? Have a question or need a help finding a specific resource? Let us know in the form below! This project is ongoing and we will be continually updating the site with new resources as we recieve them.</p>
                            @include('submission-form')
                        </div>
                    </article>
            </div>
        </main>
        
        <footer class='louisville-resources__footer'>
            <span class='louisville-resources__footer__span'>
                © Copyright 2020 <a class='louisville-resources__footer__a' href='https:\\www.unbound.services'>Unbound</a>
            </span>
        </footer>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{env('ANALYTICS_KEY')}}"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{env('ANALYTICS_KEY')}}');
        </script>
    </body>
</html>
