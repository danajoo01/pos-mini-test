<div class="form-check">
    <input {!! $attributes->merge(['class' => 'form-check-input ' . ($errors->first($name) ? 'is-invalid' : '')]) !!} type="radio" name="{{ $name }}" value="{{ $value }}"
        @if ($checked) checked="checked" @endif @if ($attributes->get('id')) id="{{ $id() }}" @endif />

    <x-form-label :label="$label" :for="$attributes->get('id')" class="form-check-label" />

    {!! $help ?? null !!}

    @if ($errors->first($name))
        <x-form-errors :name="$name" />
    @endif
</div>
