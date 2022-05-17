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
        placeholder="{{ $attributes['placeholder'] }}"
        @if($attributes['readOnly'])readonly @endif
        autocomplete="{{ $attributes['autoComplete'] }}"
        data-min-date="{{ $attributes['minDate'] }}"
        data-max-date="{{ $attributes['maxDate'] }}"
        data-bind-key="{{config('guide-x.blade_component.guide_x.form.date_time.bind_key')}}"
        @if($attributes['autofocus']) autofocus @endif
    />
    @error($attributes['name'])
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
