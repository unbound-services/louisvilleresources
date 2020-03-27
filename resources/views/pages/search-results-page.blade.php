@extends('pages.layouts.pages-layout')

@section('content')
 
<h2>Search Results</h2>
<x-components-search name="search" label='Search for a business:' :searchTerm='$searchTerm'/>
@if(count($results))
	<ul>
		@foreach($results as $result)
		<li><a href='/directory/{{$result->id}}'>{{$result->name}}</a></li>
		@endforeach
	</ul>

@else
	No Results
@endif

@endsection