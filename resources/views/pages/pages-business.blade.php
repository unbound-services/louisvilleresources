@extends('pages.layouts.pages-layout')

@section('content')

  <section class="business-info">
    <h1 class="business-info__h1">{{$business->name}}</h1>
    <ul class="business-info__ul">
      @if($business->description)
        <li class="business-info__li">
          <p class="business-info__p business-info__label">Description</p><!--
          --><p class="business-info__p business-info__field">{{$business->description}}</p>
        </li>
      @endif
      @if($business->current_status)
        <li class="business-info__li">
          <p class="business-info__p business-info__label">Status</p><!--
          --><p class="business-info__p business-info__field">{{$business->current_status}}</p>
        </li>
      @endif
      @if($business->phone)
        <li class="business-info__li">
          <p class="business-info__p business-info__label">Phone</p><!--
          --><p class="business-info__p business-info__field">{{$business->phone}}</p>
        </li>
      @endif
      @if($business->website)
        <li class="business-info__li">
          <p class="business-info__p business-info__label">Website</p><!--
          --><p class="business-info__p business-info__field"><a href="{{$business->website}}" target="_blank">{{$business->website}}</a></p>
        </li>
      @endif
      @if($business->street_address)
        <li class="business-info__li">
          <p class="business-info__p business-info__label">Address</p><!--
          --><p class="business-info__p business-info__field">{{$business->street_address}}</p>
        </li>
      @endif
      @if($business->email)
        <li class="business-info__li">
          <p class="business-info__p business-info__label">Email</p><!--
          --><p class="business-info__p business-info__field">{{$business->email}}</p>
        </li>
      @endif
      @if($business->hours)
        <li class="business-info__li">
          <p class="business-info__p business-info__label">Hours</p><!--
          --><p class="business-info__p business-info__field">{{$business->hours}}</p>
        </li>
      @endif
      @if($business->last_confirmed)
        <li class="business-info__li">
          <p class="business-info__p business-info__label">Last confirmed</p><!--
          --><p class="business-info__p business-info__field">{{$business->last_confirmed}}</p>
        </li>
      @endif

      @if($business->notes)
        <li class="business-info__li">
          <p class="business-info__p business-info__label">Notes</p><!--
          --><p class="business-info__p business-info__field">{{$business->notes}}</p>
        </li>
      @endif

    </ul>
  </section>

@endsection
