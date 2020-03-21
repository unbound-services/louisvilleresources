
@extends('admin.layout')

@section('main')

    <h1>Editing link: {{$link->name}} </h1>
    @component('admin.components.admin-components-link-form', ['link'=>$link])
    @endcomponent

@endsection
