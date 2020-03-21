

@php
    $inputType='text';
    if(isset($type)) {
        $inputType = $type; 
    }

    if(!isset($label) || !$label) {
        $label=ucwords(str_replace("_"," ",$name));
    }

    $value="";
    if(isset($model) 
        && $model
        && isset($model->$name)) {
            $value=$model->$name;
    }
    $oldData = old($name);
    if($oldData) {
        $value=$oldData;
    }
@endphp

<label class='admin-form-input admin-form-input--{{$inputType}}'>
    <span class='admin-form-input__label'>{{$label}}</span>
    @switch($inputType)

        @case('textarea')
            <textarea class='admin-form-input__input admin-form-input__input--textarea' name="{{$name}}" >{{$value}}</textarea>
        @break

        @case("checkbox")
            <input type='checkbox' {{$value ? 'checked' : ''}} name={{$name}} value=1 /> 
        @break

        @default
            <input class='admin-form-input__input admin-form-input__input--text' type='text' name="{{$name}}" value="{{$value}}" />
    @endswitch
</label>