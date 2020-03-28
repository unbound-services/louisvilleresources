<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('metaTags')
        <title>Louisville Social Distancing Resources</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <link rel='stylesheet' href="{{ mix('/css/app.css') }}" />

    </head>
    <body>
        <header class='louisville-resources__header'>
            <h1 class='louisville-resources__header__h1'>Louisville Social Distancing Resources</h1>
            <div class='louisville-resources__header__bar'>
                <nav class='louisville-resources__nav'>
                    <ul class='louisville-resources__nav__ul'>
                        <li class='louisville-resources__nav__li'>
                            <a class='louisville-resources__nav__a' href='/'>
                                Home
                            </a>
                        </li>
                        <li class='louisville-resources__nav__li'>|</li>
                        <li class='louisville-resources__nav__li'>
                            <a class='louisville-resources__nav__a' href='/contact'>
                                Contact
                            </a>
                        </li>
                        <li class='louisville-resources__nav__li'>|</li>
                        <li class='louisville-resources__nav__li'>
                            <a class='louisville-resources__nav__a' href='/directory'>
                                Business Directory
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <div class='resources__container'>
            @yield('content')
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
