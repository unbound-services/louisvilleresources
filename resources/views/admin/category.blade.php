
@extends('admin.layout')

@section('main')

    <h1>Editing {{$category->name}} </h1>
    @component('admin.components.admin-components-category-form', ['category'=>$category])
    @endcomponent
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
        
        <x-admin-input name="name" />
        <x-admin-input name="url" />
        <div>
        <p>The "Phone String" is a special field for phone numbers that have letters in them (such as 1800-safeauto) - ignore it otherwise</p>
        <x-admin-input name="phone" />
        <x-admin-input name="phone_string" />
        <x-admin-input
            name="phone_is_primary"
            label="Is Hotline"
            type="checkbox" />
        </div>
        <x-admin-input name="description" type="textarea" />
        <br>
        <input type='hidden' name='category_id' value={{$category->id}} />
        <input type='submit' />
    </form>
@endsection
