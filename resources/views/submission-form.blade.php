<div class='submission-form'>
<form method='POST' enctype="multipart/form-data" action='/submit-resources'>
	@csrf
	<label class='submission-form__label'>
		<span class='submission-form__span'>Name</span>
		<input class='submission-form__input' type='text' name='name'>
	</label>

	<label class='submission-form__label'>
		<span class='submission-form__span'>Email Address</span>
		<input class='submission-form__input' type='email' name='email'>
	</label>

	<label class='submission-form__label'>
		<span class='submission-form__span'>Resources/Questions</span>
		<textarea class='submission-form__textarea' name='resources'></textarea>
	</label>

	<input class='submission-form__submit' type="submit" name="">
</form>
</div>
