<div class="{{ $attributes['wrapClasses'] }}">
    <div class="d-flex justify-content-between align-items-center">
        <label class="{{ $attributes['labelClasses'] }}">
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
    <p class="text-muted"><small>{{ $attributes['placeholder'] }}</small></p>
    <div class="form-inline">

        @foreach (json_decode(urldecode($attributes['metaValues'])) as $metaKey => $metaValue)
            <div class="{{ $metaValue->wrapClasses }}">
                <input
                    name="{{ $attributes['name'] }}"
                    type="{{ $attributes['type'] }}"
                    id="{{ $metaValue->id }}"
                    class="{{ $metaValue->elementClasses }}"
                    value="{{ $metaValue->value }}"
                    @php
                        $oldInput = old(str_replace('[]', '', $attributes['name']));
                        $storedValue = $attributes['value'];
                    @endphp
                    @if (is_array($oldInput))
                        
                        @foreach ( $oldInput as $oldOne)
                        
                            @if ($oldOne === $metaValue->value)
                                checked
                            @endif
                            
                        @endforeach
                        
                    @elseif (old($attributes['name']) === $metaValue->value)
                        checked
                    @elseif (is_array($storedValue))
                        @foreach ( $storedValue as $storedOne)
                            @if ($storedOne === $metaValue->value)
                                checked
                            @endif
                        @endforeach
                    @elseif ($storedValue === $metaValue->value)
                        checked
                    @endif
                    
                    @if ($metaValue->checked) checked @endif

                    placeholder="{{ $metaValue->placeholder }}"
                    @if($attributes['autofocus']) autofocus @endif
                />
                <label class="{{ $metaValue->labelClasses }}" for="{{ $metaValue->id }}">
                    {{ $metaValue->label }}
                </label>
                <div class="text-muted mx-2"><small>{{ $metaValue->placeholder }}</small></div>
            </div>
        @endforeach

    </div>
    
    @error($attributes['name'])
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

