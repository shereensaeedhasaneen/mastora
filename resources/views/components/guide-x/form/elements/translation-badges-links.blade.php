<div class="my-2 d-flex justify-content-start align-items-center">

    @if($attributes['selectValues'])
        @php
            $actionOneAttributes = json_decode(urldecode($attributes['actionOneAttributes']));
            $actionTwoAttributes = json_decode(urldecode($attributes['actionTwoAttributes']));
        @endphp
        @if (!empty($actionOneAttributes->{"data-target"}))
            @foreach($attributes['selectOptions'] as $key => $title)
            
                @if(is_array($attributes['selectValues']) && in_array($key, $attributes['selectValues']))
                    @foreach ($attributes['selectValues'] as $selectValue)

                        @if ($key == $selectValue)
                            <a  
                                href="#" 
                                class="badge badge-secondary mx-1"
                                data-toggle="{{ $actionOneAttributes->{"data-toggle"} }}"
                                data-target="{{ $actionOneAttributes->{"data-target"} }}"
                                data-server-side-model-id="{{ $key }}"
                            >
                                {{
                                    __('main.common.update_.value').
                                    ' '.__('main.locale.'.$attributes['currentTranslationLanguage'].'.value')
                                    .' '.__('main.common.translation.value')
                                    .' | '.$title 
                                }}
                            </a>
                        @endif

                    @endforeach
                    
                @elseIf($attributes['selectValues'] == $key)
                    <a 
                        href="#" 
                        class="badge badge-secondary mx-1"
                        data-toggle="{{ $actionOneAttributes->{"data-toggle"} }}"
                        data-target="{{ $actionOneAttributes->{"data-target"} }}"
                        data-server-side-model-id="{{ $key }}"
                    >
                        {{
                            __('main.common.update_.value').
                            ' '.__('main.locale.'.$attributes['currentTranslationLanguage'].'.value')
                            .' '.__('main.common.translation.value')
                            .' | '.$title 
                        }}
                    </a>
                @endif
                    
            @endforeach
        @endif
    @endif
</div>




