<div class="{{ $attributes['wrapClasses'] }}">
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
    <textarea
        name="{{ $attributes['name'] }}"
        id="{{ $attributes['id'] }}"
        class="{{ $attributes['elementClasses'] }}"
        @if($attributes['required'])required="required"@endif
        placeholder="{{ $attributes['placeholder'] }}"
        @if($attributes['autofocus']) autofocus @endif
    >@if(old($attributes['name'])){!! old($attributes['name']) !!}@elseif($attributes['value']){!! $attributes['value'] !!}@endif</textarea>
    @error($attributes['name'])
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
