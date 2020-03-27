
@extends('pages.layouts.pages-layout')

@section('content')
 
@if(count($results))
	<ul>
		@foreach($results as $result)
		<li><a href='#'>{{$result->name}}</a></li>
		@endforeach
	</ul>

@else
	No Results
@endif

@endsection