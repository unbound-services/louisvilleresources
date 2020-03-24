
@extends('admin.layout')

@section('main')

    <h1>Tags</h1>
    @foreach($tags as $tag)
        {{$tag->name}}
    @endforeach

    <h2>Create a new Tag</h2>
    <form class='admin-form' method='post' action='/admin/tag'>
        @csrf
        <label class='admin-form__label'>Tag Name
            <input type='text' name='name' />
        </label>
        <input type='submit' />
    </form>
@endsection
