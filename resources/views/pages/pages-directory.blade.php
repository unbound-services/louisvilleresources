
@extends('pages.layouts.pages-layout')

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
