
@extends('admin.layout')

@section('main')

    @if(count($categories))
        <h2>Categories</h2>
        <ul>
        @foreach($categories as $category)
            <li><a href='/admin/category/{{$category->id}}'>{{$category->name}}</a></li>
        @endforeach
        </ul>
    @else
        <h2>There are no categories created yet</h2>
    @endif


    <h2>Create a new Category</h2>
    <form class='admin-form' method='post' action='/admin/category'>
        @csrf
        <label class='admin-form__label'>Category Name
            <input type='text' name='name' />
        </label>
        <label class='admin-form__label'>
            Category Description
            <textarea name='description'></textarea>
        </label>
        <input type='submit' />
    </form>


@endsection