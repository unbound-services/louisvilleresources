
@extends('pages.layouts.pages-layout')

@section('content')

            
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
                            @include('components.components-contact-button')
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

@endsection
