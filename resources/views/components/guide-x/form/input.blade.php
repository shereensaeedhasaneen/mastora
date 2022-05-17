<div class="{{ $attributes['wrapClasses'] }} ">
    <div class="d-flex justify-content-between align-items-center">
        <label class="{{ $attributes['labelClasses'] }}" for="{{ $attributes['id'] }}">
            {{ $attributes['label'] }}
            @if($attributes['required'])
                <span class="text-danger">*</span>
            @endif
        </label>
        <x-guide-x.form.elements.action-link
            :actionOneName="$attributes['actionOneName']"
            :actionOneAttributes="$attributes['actionOneAttributes']"
            :actionTwoName="$attributes['actionTwoName']"
            :actionTwoAttributes="$attributes['actionTwoAttributes']"
            :relatedElementId="$attributes['id']"
        />
    </div>
    <input
        name="{{ $attributes['name'] }}"
        type="{{ $attributes['type'] }}"
        id="{{ $attributes['id'] }}"
        class="{{ $attributes['elementClasses'] }}"
        @if(old($attributes['name']) || old(nestedArrayToDotNotation($attributes['name'])) )
            value="{{ old($attributes['name']) ?? old(nestedArrayToDotNotation($attributes['name'])) }}"
        @elseif($attributes['value'])
            value="{{ $attributes['value'] }}" 
        @endif
        @if($attributes['required'])required="required"@endif
        @if($attributes['readOnly'])readonly @endif
        @if($attributes['autofocus']) autofocus @endif 
        @if($attributes['max']) max="{{ $attributes['max'] }}"  @endif 
        @if($attributes['min']) min="{{ $attributes['min'] }}"  @endif 
        @if($attributes['step']) step="{{ $attributes['step'] }}"  @endif 
        placeholder="{{ $attributes['placeholder'] }}"
    />
    @error($attributes['name'])
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
