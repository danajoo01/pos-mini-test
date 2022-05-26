<div class="form-check">
    <input {!! $attributes->merge(['class' => 'form-check-input ' . ($errors->first($name) ? 'is-invalid' : '')]) !!} type="checkbox" value="{{ $value }}" name="{{ $name }}"
        @if (!!$attributes->get('id')) id="{{ $id() }}" @endif @if ($checked) checked="checked" @endif />

    <x-form-label :label="$label" :for="$attributes->get('id')" class="form-check-label" />

    {!! $help ?? null !!}

    @if ($errors->first($name))
        <x-form-errors :name="$name" />
    @endif
</div>
