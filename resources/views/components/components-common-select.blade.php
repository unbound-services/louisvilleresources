@php
    $options = [];
@endphp

<label>
    <span>{{isset($label) ? $label : '' }}</span>

    <select name='{{$name}}' class='base-form__select'>
        @foreach($options as $option)
        <option value="{{$option->id}}">{{$option->name}}</option>
        @endforeach
    </select>          
</label>