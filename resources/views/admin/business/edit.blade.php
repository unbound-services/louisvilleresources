
@extends('admin.layout')

@section('main')

<h2>Editing Business "{{$business->name}}"</h2>
    <form method="post" action="/admin/business/{{$business->id}}">
    @csrf

    <x-admin-input name="name" :model="$business" />
    <x-admin-input name="description"  type="textarea" :model="$business" />
    <label class='admin-form-input'>Street Address
    <div class='replace-places' data-address="{{$business->street_address}}"
        data-lat="{{$business->latitude}}"
        data-lng="{{$business->longitude}}"
        data-zipcode="{{$business->zipcode}}"></div>
    </label>
    <x-admin-input name="phone" :model="$business" />
    <x-admin-input name="email" :model="$business" />
    <x-admin-input name="current_status" :model="$business"/>
    <x-admin-input name="hours" :model="$business"/>
    <x-admin-input name="website" :model="$business"/>
    <x-admin-input name="notes" type="textarea" :model="$business"/>
    <x-admin-input name="active" type="checkbox" :model="$business"/>

    <input type='submit' value='Update Business Listing' />

    </form>
{{-- TAGS --}}
@include('admin.business.business-tags', ['business_id'=>$business->id, 'tags'=>$tags])

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_PUBLIC_KEY', '')}}&libraries=places"></script>

<script src="{{mix('js/business-page.js')}}"></script>
@endsection
