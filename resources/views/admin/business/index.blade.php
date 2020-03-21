
@extends('admin.layout')

@section('main')

    @if(count($businesses))
        <h2>Businesses</h2>
        <ul>
        @foreach($businesses as $business)
            <li><a href='/admin/business/{{$business->id}}'>{{$business->name}}</a></li>
        @endforeach
        </ul>
    @else
        <h2>There are no businesses created yet</h2>
    @endif


    <h2>Create a new Business</h2>
    <form class='admin-form' method='post' action='/admin/businesses'>
        @csrf
        @include('components.admin-input',['name'=>'name', 'label'=>'Business Name'])
        <input type='submit' />
    </form>


@endsection