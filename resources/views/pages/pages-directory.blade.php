
@extends('pages.layouts.pages-layout')
@section('metaTags')
  <meta property="og:title" content="Directory of businesses providing services in the Louisville area" />
  <meta property="og:url" content="{{env('APP_URL')}}/directory" />
  <meta property="og:image" content="{{env('APP_URL')}}/img/og-previews/home3.png" />
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="1200" />
  <meta property="og:image:alt" content="A picture of a list of resources and links" />
  {{-- <meta property="og:description" content="Find information and resources about the COVID-19 virus in Louisville" /> --}}
@endsection
@section('content')
<section class="directory">
  <h1 class="directory__h1">Business Directory</h1>
  @include('components.components-search')
  <ul class="directory__ul">
    @foreach ($businesses as $business)
      <li class="directory__li">
        <article class="directory-entry">
          <header class="directory-entry__header">
            <p class="directory-entry__name">{{$business->name}}</p>
            <p class="directory-entry__status">status</p>
          </header>
          <div class="directory-entry__body">
            <p class="directory-entry__p">{{$business->phone}}</p>
            <p class="directory-entry__p directory-entry__website">
              <a href="{{$business->website}}" class="directory-entry__link">Website</a>
            </p>
            <a class="directory-entry__read-more" href="/directory/{{$business->id}}" target="_blank">Read More</a>
          </div>
        </article>
      </li>
    @endforeach
  </ul>
</section>
@endsection
