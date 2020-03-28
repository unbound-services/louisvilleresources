
@extends('admin.layout')

@section('main')

    @if(count($tags))
        <h2>Tags</h2>
        <ul>
        @foreach($tags as $tag)
            <li><a href='/admin/tags/{{$tag->id}}'>{{$tag->name}}</a></li>
        @endforeach
        </ul>
    @else
        <h2>There are no tags created yet</h2>
    @endif


    <h2>Create a new Tag</h2>
    <form class='admin-form' method='post' action='/admin/tag'>
        @csrf
        <x-admin-input name="name" />
        <input type='submit' />
    </form>


@endsection