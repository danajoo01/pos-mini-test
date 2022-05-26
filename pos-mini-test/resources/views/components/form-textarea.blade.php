<div class="form-group">
    <x-form-label :label="$label" :for="$attributes->get('id')" />

    <textarea name="{{ $name }}" @if ($attributes->get('id')) id="{{ $attributes->get('id') }}" @endif
        {!! $attributes->merge(['class' => 'form-control ' . ($errors->first($name) ? 'is-invalid' : '')]) !!}>{!! $value ?? $slot !!}</textarea>

    {!! $help ?? null !!}

    @if ($errors->first($name))
        <x-form-errors :name="$name" />
    @endif
</div>
