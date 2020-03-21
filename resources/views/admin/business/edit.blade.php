
@extends('admin.layout')

@section('main')

<h2>Editing Business "{{$business->name}}"</h2>
    <form method="post" action="/admin/business/{{$business->id}}">
    @csrf

    <x-admin-input name="name" :model="$business" />
    <x-admin-input name="description"  type="textarea" :model="$business" />
    <x-admin-input name="street_address" :model="$business"/>
    <x-admin-input name="zipcode" :model="$business"/>
    <x-admin-input name="phone" :model="$business" />
    <x-admin-input name="email" :model="$business" />
    <x-admin-input name="current_status" :model="$business"/>
    <x-admin-input name="hours" :model="$business"/>
    <x-admin-input name="website" :model="$business"/>
    <x-admin-input name="notes" type="textarea" :model="$business"/>
    <x-admin-input name="active" type="checkbox" :model="$business"/>
    
    <input type='submit' value='Update Business Listing' />

    </form>



@endsection
