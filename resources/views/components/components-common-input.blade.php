@php
    $inputType='text';
    if(isset($type)) {
        $inputType = $type; 
    }

    if(!isset($label) || !$label) {
        $label=ucwords(str_replace("_"," ",$name));
    }
    if(!isset($value)){
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
    }
    
@endphp

<label class='common-form-input common-form-input--{{$inputType}}'>
    <span class='common-form-input__label'>{{$label}}</span>
    @switch($inputType)

        @case('textarea')
            <textarea class='common-form-input__input common-form-input__input--textarea' name="{{$name}}" >{{$value}}</textarea>
        @break

        @case("checkbox")
            <input type='checkbox' {{$value ? 'checked' : ''}} name={{$name}} value=1 /> 
        @break

        @default
            <input class='common-form-input__input common-form-input__input--text' type='text' name="{{$name}}" value="{{$value}}" />
    @endswitch
</label>