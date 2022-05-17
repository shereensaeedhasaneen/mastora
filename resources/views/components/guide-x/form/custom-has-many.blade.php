<div class="{{ $attributes['wrapClasses'] }} ">

    <label class="{{ $attributes['labelClasses'] }}" for="{{ $attributes['id'] }}">
        {{ $attributes['label'] }}
        @if($attributes['required'])
            <span class="text-danger">*</span>
        @endif
    </label>

    <div class="border rounded p-3">
        <div class="container-fluid">

            <div class="row">
                <div class="col">
                    <input 
                        type="hidden" 
                        id="{{ $attributes['id'] }}" 
                        name="{{ $attributes['name'] }}" 
                        @if (!empty((old($attributes['name']))))
                        value='{!!json_encode(old($attributes['name']))!!}'
                        @elseif(!empty(($attributes['value'])))
                        value="{{json_encode($attributes['value'])}}"
                        @endif
                        data-bind-key="{{config('guide-x.blade_component.guide_x.form.custom_has_many.bind_key')}}"
                    >
                    <div class="d-flex justify-content-between align-items-center p-2">
                        <div>
                            <i class="cil-plant"></i> {{ $attributes['title'] }}
                        </div>
                        <div>
                            <button 
                                type="button" 
                                class="btn btn-sm btn-success" 
                                id="{{ $attributes['id'] }}-add-button"
                            >
                                <i class="cil-library-add"></i> {{ $attributes['addButtonLabel'] }}
                            </button>
                            <button 
                                type="button" 
                                class="btn btn-sm btn-danger" 
                                id="{{ $attributes['id'] }}-delete-all-button"
                            >
                                <i class="cil-trash"></i> {{ $attributes['deleteAllButtonLabel'] }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="{{ $attributes['id'] }}-container">

            </div>
            
        </div>
    </div>

    <template id="{{ $attributes['id'] }}-form-elements">
        <div>
            @foreach ($attributes['elements'] as $element)
                <x-guide-x.form.element-factory 
                    :element="$element"
                />  
            @endforeach
        </div>
    </template>

</div>
