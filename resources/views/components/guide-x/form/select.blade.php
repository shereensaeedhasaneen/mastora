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
    <select 
        name="{{ $attributes['name'] }}"
        id="{{ $attributes['id'] }}" 
        size="{{ $attributes['size'] }}"
        class="{{ $attributes['elementClasses'] }}"
        @if($attributes['required'])required="required" @endif
        @if($attributes['multiple']) multiple @endif
        @if($attributes['autofocus']) autofocus @endif
        data-bind-key="{{config('guide-x.blade_component.guide_x.form.select.bind_key')}}"
        data-placeholder="{{ $attributes['placeholder'] }}"
        style="width: 100%"
    >
        <option value="">{{ $attributes['placeholder'] }}</option>

        @php 
            $oldSelection = old(
                nestedArrayToDotNotation(
                    str_replace('[]', '',$attributes['name'])
                )
            ); 
        @endphp
        @foreach($attributes['options'] as $key => $value)
            @if($oldSelection)
                <option 
                    value="{{ $key }}"
                    @if($oldSelection == $key || is_array($oldSelection) && in_array($key, $oldSelection))
                    selected
                    @endif
                >
                    {{ sentence_case($value) }}
                </option>
            @elseif($attributes['value'])
                <option 
                    value="{{ $key }}"
                    @if($attributes['value'] == $key || is_array($attributes['value']) && in_array($key, $attributes['value']))
                    selected
                    @endif
                >
                    {{ sentence_case($value) }}
                </option>
            @else
                <option value="{{ $key }}" > {{ sentence_case($value) }} </option>
            @endif
        @endforeach

    </select>
    
    <x-guide-x.form.elements.translation-badges-links 
        :selectValues="$attributes['value']"
        :selectOptions="$attributes['options']"
        :actionOneAttributes="$attributes['actionOneAttributes']"
        :actionTwoAttributes="$attributes['actionTwoAttributes']"
        :currentTranslationLanguage="$attributes['currentTranslationLanguage']"
    />
    
    @error( $attributes['name'])
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

