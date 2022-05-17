<div class="form-group">
    <label class="col-form-label" for="{{ $name }}">{{ sentence_case($name) }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div>
        <select class="form-control" id="{{ $name }}" name="{{ $name }}" @if($required)required="required"@endif>
            <option>Please select</option>
            @foreach($items as $item)
                <option value="{{ $item->{$key} }}" @if($selected == $item->{$key}) selected @endif>
                    {{ sentence_case($item->name) }}
                </option>
            @endforeach
        </select>
    </div>
    @error($name)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
