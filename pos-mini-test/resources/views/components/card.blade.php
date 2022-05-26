<div {!! $attributes->merge(['class' => 'card']) !!}>
    @isset($header)
        <div class="card-header">
            <strong>
                {!! $header !!}
            </strong>
        </div>
    @endisset

    <div class="card-body">
        {!! $slot !!}
    </div>

    @isset($chart)
        {!! $chart !!}
    @endisset

    @isset($footer)
        <div class="card-footer">
            <strong>
                {!! $footer !!}
            </strong>
        </div>
    @endisset
</div>
