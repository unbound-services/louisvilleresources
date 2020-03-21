

@php
    $inputType='text';
    if(isset($type)) {
        $inputType = $type; 
    }
@endphp

<label class='admin-form__label'>{{$label}}
    @switch($inputType)

        @case('textarea')
            <textarea  name="{{$name}}" ></textarea>
        @break

        @default
            <input type='text' name="{{$name}}" />
    @endswitch
</label>