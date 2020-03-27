
@extends('pages.layouts.pages-layout')

@section('content')

  <section class="business-info">
    <h1 class="business-title">Business Name</h1>
    <p><span><strong>Status:</strong> </span>Pickup Only</p>
    <p><span><strong>Phone:</strong> </span>{{$business->phone}}</p>
    <p><span><strong>Website:</strong> </span>{{$business->website}}</p>
    <p><span><strong>Address:</strong> </span>{{$business->street_address}}</p>
    <p><span><strong>Email:</strong> </span>example@gmail.com</p>
    <p><span><strong>Hours:</strong> </span>Mon-Sat: 12:00-9:00pm</p>
    <p><span><strong>Description:</strong> </span>{{$business->description}}</p>
    <p><span><strong>Notes:</strong> </span>{{$business->notes}}</p>
    <p><span><strong>Last confirmed:</strong> </span>{{$business->last_confirmed}}</p>
  </section>

@endsection

{{-- <section class="business-info">
  <h1 class="business-title">{{$business->name}}</h1>
  <p><span><strong>Phone:</strong> </span>{{$business->phone}}</p>
  <p><span><strong>Website:</strong> </span>{{$business->website}}</p>
  <p><span><strong>Address:</strong> </span>{{$business->street_address}}</p>
  <p><span><strong>Email:</strong> </span>{{$business->email}}</p>
  <p><span><strong>Hours:</strong> </span>{{$business->hours}}</p>
  <p><span><strong>Description:</strong> </span>{{$business->description}}</p>
  <p><span><strong>Notes:</strong> </span>{{$business->notes}}</p>
  <p><span><strong>Last confirmed:</strong> </span>{{$business->last_confirmed}}</p>
</section> --}}
