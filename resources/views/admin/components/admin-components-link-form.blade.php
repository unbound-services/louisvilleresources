@php

$formAction = '/admin/link/'.$link->id;
$submitText = 'Save Changes'
@endphp

<form method="post" action={{$formAction}}>
  @csrf
  <label class='admin-form__label'>Link Name
      <input type='text' name='name' value="{{$link->name}}" />
  </label>
  <label class='admin-form__label'>Link URL
      <input type='text' name='url' value="{{$link->url}}" />
  </label>
  <label class='admin-form__label'>Link Description
      <textarea name='description'>{{$link->description}}</textarea>
  </label>
  <button>
    {{$submitText}}
  </button>
</form>
