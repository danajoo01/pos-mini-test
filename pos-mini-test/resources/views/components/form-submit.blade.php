<button {!! $attributes->merge([
    'class' => 'btn btn-primary',
    'type' => $type,
]) !!}>
    {!! trim($slot) ?: __('Submit') !!}
</button>
