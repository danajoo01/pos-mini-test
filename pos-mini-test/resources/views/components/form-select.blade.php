<div class="form-group">
    <x-form-label :label="$label" :for="$attributes->get('id')" />

    <select name="{{ $name }}" @if ($placeholder) placeholder="{{ $placeholder }}" @endif id="{{ $attributes->get('id') }}"
        {!! $attributes->merge(['class' => 'form-control ' . ($errors->first($name) ? 'is-invalid' : '')]) !!}>

        @if ($placeholder)
            <option value="" disabled>
                {{ $placeholder }}
            </option>
        @endif

        {!! $slot !!}

    </select>

    {!! $help ?? null !!}

    @if ($errors->first($name))
        <x-form-errors :name="$name" />
    @endif
</div>

@section('third_party_stylesheets')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/app.css') }}">
@endsection

@section('third_party_scripts')
    <script src="{{ asset('vendor/select2/js/app.js') }}"></script>
@endsection

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $("#{{ $attributes->get('id') }}").select2();
        });
    </script>
@endpush
