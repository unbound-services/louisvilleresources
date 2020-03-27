@php
if(isset($searchTerm)){
	$value = $searchTerm;
}else{
	$value = null;
}
@endphp

<div>
<form method='GET' action='/search'>
	<x-components-common-input name="search" label='Search for a business:' :value='$value' />
	<input type="submit" value='Search'>
</form>
</div>
