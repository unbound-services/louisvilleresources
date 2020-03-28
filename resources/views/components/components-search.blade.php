@php
if(isset($searchTerm)){
	$value = $searchTerm;
}else{
	$value = null;
}
@endphp

<div>
<form class='search__form' method='GET' action='/search'>
	<x-components-common-input name="search" label='Search for a business:' :value='$value' />
	<input class='common-form-input__submit search__submit' type="submit" value='Search'>
</form>
</div>
