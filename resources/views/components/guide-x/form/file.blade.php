<div class="{{ $attributes['wrapClasses'] }} " id="{{ $attributes['id'] }}-wrapper">
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
    <div class="rounded border-secondary p-2">
        <div class="container-fluid">
            <div class="row selected-files-wrapper mb-2">
            </div>
            <div class="row">
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
                    @if($attributes['multiple'])multiple @endif
                    @if($attributes['autofocus']) autofocus @endif
                    accept="{{$attributes['accept']}}"
                    data-maximum-files="{{ $attributes['maximumFiles'] }}"
                    data-file-name-label="{{ $attributes['fileNameLabel'] }}"
                    data-default-file-src="{{ asset('images/helpers/default_image.png') }}"
                    data-bind-key="{{config('guide-x.blade_component.guide_x.form.file_selector.bind_key')}}"
                />
                <p class="text-muted"><small>{{ $attributes['placeholder'] }}</small></p>
            </div>

            <div class="row mb-2">
                <div class="col p-0">
                    @csrf
                    <div 
                        class="card-columns" 
                        id="preview-files-wrapper-{{ $attributes['id'] }}"
                        data-media="{{htmlspecialchars_decode($attributes['media'])}}"
                        data-media-deletion-url="{{$attributes['media_deletion_url']}}"
                    >
                    </div>
                </div>
            </div>
            
        </div>

    </div>
    @error($attributes['name'])
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>