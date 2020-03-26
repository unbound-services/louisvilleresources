
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

                            {{-- table of contents --}}
                            <hr>
                            <p class='category__p'>Select a category below, or scroll down to browse</p>
                            <ul>
                            @foreach($categories as $category)
                                <li><a href='/#category-{{$category->id}}'>{{$category->name}}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </article>

                

                {{-- actual category list --}}
                @foreach($categories as $category)
                    <article class='category__container'>
                        <header class='category__header'>
                            <h1 class='category__header__h1' id='category-{{$category->id}}'>{{$category->name}}</h1>
                        </header>
                        <div class='category__content'>
                            @if($category->description)
                                <p class='category__p'>{{$category->description}}</p>
                            @endif
                            <ul class='category__list'>
                                @foreach($category->links as $link)
                                @php
                                    $url = $link->url;
                                    $phone = $link->phone;
                                    if($link->phone_is_primary && $phone) {

                                    }
                                @endphp
                                <li class='list__item'>
                                    {{-- handle hotlines differently from other links --}}
                                    @if($link->phone_is_primary) 
                                        <a class='list__item__a' href='tel:{{$link->numericalPhone}}'>{{$link->name}} | {{$link->phoneString}}</a>
                                        @if($link->url)
                                            <a class='list__item__a list__item__a--sub' href='{{$link->url}}'>Website</a>
                                        @endif
                                    @else
                                        <a class='list__item__a' href='{{$link->url}}'>{{$link->name}}</a>
                                         @if($link->phone)
                                            <a class='list__item__a list__item__a--sub' href='tel:{{$link->numericalPhone}}'>{{$link->phoneString}}</a>
                                        @endif
                                    @endif
                                    
                                    @if($link->description)
                                        <p class='list__item__p'>{{$link->description}}</p>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
                @include('components.components-contact-button')

@endsection
