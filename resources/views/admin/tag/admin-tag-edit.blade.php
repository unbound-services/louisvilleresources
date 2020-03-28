@extends('admin.layout')

@section('main')

    <h2>Editing Tag: {{$tag->name}}</h2>

    <form method="post" action="/admin/tags/{{$tag->id}}">
    @csrf

    <x-admin-input name="name" :model="$tag" />
    
    <input type='submit' value='Update Tag' />

    </form>


@endsection
