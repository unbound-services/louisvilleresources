
@extends('pages.layouts.pages-layout')

@section('content')
 

<article class='category__container category__container--about'>
        <header class='category__header'>
            <h1 class='category__header__h1'>Get in touch</h1>
        </header>
        <div class='category__content'>
            <p class='category__p'>Do you know of any resources that are not listed here? Have a question or need a help finding a specific resource? Let us know in the form below! This project is ongoing and we will be continually updating the site with new resources as we recieve them.</p>
            @include('components.submission-form')
        </div>
    </article>

@endsection