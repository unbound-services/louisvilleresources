
@extends('admin.layout')

@section('main')

    <h1>Editing {{$category->name}} </h1>

    @if(count($category->links))
        <h2>Links currently in this category:</h2>
        <ul>
            @foreach($category->links as $link)
            <li><a href='/admin/link/{{$link->id}}'>{{$link->name}}</a></li>
            @endforeach
        </ul>
    @else
        <p> -- there are no links in this category yet --</p>
    @endif


    <h2>Create a new Link in this Category</h2>
    <form class='admin-form' method='post' action='/admin/link'>
        @csrf
        <label class='admin-form__label'>Link Name
            <input type='text' name='name' />
        </label>
        <label class='admin-form__label'>Full Link Url
            <input type='text' name='url' />
        </label>
        <label class='admin-form__label'>
            Link Description
            <textarea name='description'>
            </textarea>
        </label>
        <input type='hidden' name='category_id' value={{$category->id}} />
        <input type='submit' />
    </form>
@endsection