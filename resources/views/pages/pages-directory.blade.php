
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
  {{-- @include('components.components-search-zipcode') --}}
  <ul class="directory__ul">
    @foreach ($businesses as $business)
      <li class="directory__li">
        <article class="directory-entry">
          <header class="directory-entry__header">
            <p class="directory-entry__name">{{$business->name}}</p>
            @if($business->current_status)
              <p class="directory-entry__status">{{$business->current_status}}</p>
            @endif
          </header>
          <div class="directory-entry__body">
            <p class="directory-entry__p">{{$business->phone}}</p>
            @if($business->website)
              <p class="directory-entry__p directory-entry__website">
                <a href="{{$business->website}}" class="directory-entry__link">Website</a>
              </p>
            @endif

            <a class="directory-entry__read-more" href="/directory/{{$business->id}}" target="_blank">Read More</a>
          </div>
        </article>
      </li>
    @endforeach
  </ul>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_PUBLIC_KEY', '')}}&libraries=places"></script>
<script src="{{mix('js/directory-search-form.js')}}"></script>
@endsection
