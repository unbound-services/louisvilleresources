<div>
	<form class='zipcode-search__form' method='GET' action='/radius-search'>
		<x-components-common-input name="latitude" />
		<x-components-common-input name="longitude" />
		<x-components-common-input name="range" label='Range (in miles)' value='5' />
		<input class='common-form-input__submit search__submit' type="submit" value='Search'>
	</form>
</div>