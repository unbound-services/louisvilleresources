@php

$formAction = '/admin/link/'.$link->id;
$submitText = 'Save Changes'
@endphp

<form method="post" action={{$formAction}}>
  @csrf

  <x-admin-input :model="$link" name="name" />
  <x-admin-input :model="$link" name="url" />
  <div>
  <p>The "Phone String" is a special field for phone numbers that have letters in them (such as 1800-safeauto) - ignore it otherwise (note that it may auto-populate)</p>
  <x-admin-input :model="$link" name="phone" />
  <x-admin-input :model="$link" name="phone_string" />
  <x-admin-input :model="$link"
    name="phone_is_primary"
    label="Is Hotline"
    type="checkbox" />
  </div>
  <x-admin-input :model="$link" name="description" type="textarea" />
   <br>
  <button>
    {{$submitText}}
  </button>
</form>
