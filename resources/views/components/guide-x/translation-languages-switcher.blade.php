<div 
    class="btn-group btn-group-sm" 
    id="translation-languages-switcher" 
    role="group" 
    aria-label="Translation Languages"
>
    @foreach (config('localization.supported_languages') as $key => $value)
        <a 
            href="{{
                route(
                    $attributes['routeName'],
                    array_merge(['translation-language' => $key], $attributes['routeParameters'])
                )
            }}" 
            id="translation-language-button-{{$key}}"
            class="btn btn-primary {{($attributes['isEditMode'] || isDefaultLanguage($key)) ? '' : 'disabled' }}"
        >
            {{ __('main.locale.' . strtolower($value) . '.value') }}
        </a>
    @endforeach
</div>