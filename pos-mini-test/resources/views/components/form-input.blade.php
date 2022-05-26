<div class="@if ($type === 'hidden') d-none @else form-group @endif">
    <x-form-label :label="$label" :for="$attributes->get('id')" />

    <div class="input-group">
        @isset($prepend)
            <div class="input-group-prepend">
                <div class="input-group-text">
                    {!! $prepend !!}
                </div>
            </div>
        @endisset

        <input {!! $attributes->merge(['class' => 'form-control ' . ($errors->first($name) ? 'is-invalid' : '')]) !!} type="{{ $type }}" value="{{ $value }}" name="{{ $name }}"
            @if (!!$attributes->get('id')) id="{{ $attributes->get('id') }}" @endif />

        @isset($append)
            <div class="input-group-append">
                <div class="input-group-text">
                    {!! $append !!}
                </div>
            </div>
        @endisset

        {!! $help ?? null !!}

        @if ($errors->first($name))
            <x-form-errors :name="$name" />
        @endif
    </div>

</div>
