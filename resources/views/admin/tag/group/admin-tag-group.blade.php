@extends('admin.layout')

@section('main')

    @if(count($tagGroups))
        <h2>TagGroups</h2>
        <ul>
        @foreach($tagGroups as $tagGroup)
            <li><a href='/admin/tag-groups/{{$tagGroup->id}}'>{{$tagGroup->name}}</a></li>
        @endforeach
        </ul>
    @else
        <h2>There are no tag groups created yet</h2>
    @endif

    <h2>Create a new Tag Group</h2>
    <form class='admin-form' method='post' action='/admin/tag-group'>
        @csrf
        <x-admin-input name="name" />
        <x-admin-input name="slug" />
        <x-admin-input name="description" type='textarea' />
        <input type='submit' />
    </form>

@endsection