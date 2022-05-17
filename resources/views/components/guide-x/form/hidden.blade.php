<input
    name="{{ $attributes['name'] }}"
    type="hidden"
    id="{{ $attributes['id'] }}"
    class="{{ $attributes['elementClasses'] }}"
    @if(old($attributes['name']) || old(nestedArrayToDotNotation($attributes['name'])) )
        value="{{ old($attributes['name']) ?? old(nestedArrayToDotNotation($attributes['name'])) }}"
    @elseif($attributes['value'])
        value="{{ $attributes['value'] }}" 
    @endif
/>
