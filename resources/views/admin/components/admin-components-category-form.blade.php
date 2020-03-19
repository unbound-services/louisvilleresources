@php

$formAction = '/admin/category/'.$category->id;
$submitText = 'Save Changes'
@endphp

<form method="post" action="{{$formAction}}">
  @csrf
  <label class='admin-form__label'>Category Name
      <input type='text' name='name' value="{{$category->name}}" />
  </label>
  <label class='admin-form__label'>Category Description
      <textarea name='description'>{{$category->description}}</textarea>
  </label>
  <button>
    {{$submitText}}
  </button>
</form>
