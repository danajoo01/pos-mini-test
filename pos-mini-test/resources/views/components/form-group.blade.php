<div {!! $attributes->merge(['class' => 'form-group ' . ($errors->first($name) ? 'is-invalid' : '')]) !!}>
    <x-form-label :label="$label" />

    <div class="@if ($inline) d-flex flex-row flex-wrap inline-space @endif">
        {!! $slot !!}
    </div>

    {!! $help ?? null !!}

    @if ($errors->first($name))
        <x-form-errors :name="$name" class="d-block" />
    @endif

</div>
