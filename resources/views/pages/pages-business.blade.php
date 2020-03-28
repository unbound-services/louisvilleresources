
@extends('pages.layouts.pages-layout')

@section('content')

  <section class="business-info">
    <h1 class="business-info__h1">Business Name</h1>
    <ul class="business-info__ul">
      <li class="business-info__li">
        <p class="business-info__p business-info__label">Status</p><!--
        --><p class="business-info__p business-info__field">Pickup Only</p>
      </li>
      <li class="business-info__li">
        <p class="business-info__p business-info__label">Phone</p><!--
        --><p class="business-info__p business-info__field">{{$business->phone}}</p>
      </li>
      <li class="business-info__li">
        <p class="business-info__p business-info__label">Website</p><!--
        --><p class="business-info__p business-info__field">{{$business->website}}</p>
      </li>
      <li class="business-info__li">
        <p class="business-info__p business-info__label">Address</p><!--
        --><p class="business-info__p business-info__field">{{$business->street_address}}</p>
      </li>
      <li class="business-info__li">
        <p class="business-info__p business-info__label">Email</p><!--
        --><p class="business-info__p business-info__field">{{$business->email}}</p>
      </li>
      <li class="business-info__li">
        <p class="business-info__p business-info__label">Hours</p><!--
        --><p class="business-info__p business-info__field">{{$business->hours}}</p>
      </li>
      <li class="business-info__li business-info__li--full">
        <p class="business-info__p business-info__label">Description</p><!--
        --><p class="business-info__p business-info__field">{{$business->description}}</p>
      </li>
      <li class="business-info__li business-info__li--full">
        <p class="business-info__p business-info__label">Notes</p><!--
        --><p class="business-info__p business-info__field">{{$business->notes}}</p>
      </li>
      <li class="business-info__li business-info__li--full">
        <p class="business-info__p business-info__label">Last confirmed</p><!--
        --><p class="business-info__p business-info__field">{{$business->last_confirmed}}</p>
      </li>
    </ul>
  </section>

@endsection

{{-- <section class="business-info">
  <h1 class="business-title">{{$business->name}}</h1>
  <p><span>Phone: </span>{{$business->phone}}</p>
  <p><span>Website: </span>{{$business->website}}</p>
  <p><span>Address: </span>{{$business->street_address}}</p>
  <p><span>Email: </span>{{$business->email}}</p>
  <p><span>Hours: </span>{{$business->hours}}</p>
  <p><span>Description: </span>{{$business->description}}</p>
  <p><span>Notes: </span>{{$business->notes}}</p>
  <p><span>Last confirmed: </span>{{$business->last_confirmed}}</p>
</section> --}}
