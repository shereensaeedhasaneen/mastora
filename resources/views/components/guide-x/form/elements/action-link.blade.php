<div class="d-flex justify-content-between align-items-center" >
    @php
        $actionOneAttributes = json_decode(urldecode($attributes['actionOneAttributes']));
        $actionTwoAttributes = json_decode(urldecode($attributes['actionTwoAttributes']));
    @endphp
    <a
        class="mx-2 {{$actionOneAttributes->class ?? ''}}" 
        @foreach ($actionOneAttributes as $key => $value)
        {!!' '.$key.'="'.$value.'" '!!}
        @endforeach
        data-related-element-id="{{$attributes['relatedElementId']}}"
    >
        {{$attributes['actionOneName']}}
    </a>
    <a 
        class="mx-2 {{$actionTwoAttributes->class ?? ''}}" 
        @foreach ($actionTwoAttributes as $key => $value)
        {!!' '.$key.'="'.$value.'" '!!}
        @endforeach
    >
        {{$attributes['actionTwoName']}}
    </a>
</div>